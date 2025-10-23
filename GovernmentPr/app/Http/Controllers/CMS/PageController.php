<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Admins;
use App\Models\CmsCategory;
use App\Models\CmsTag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Media;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Cache;

class PageController extends Controller
{
    /**
     * Display a listing of pages.
     */
    public function index()
    {
        $pages = \App\Models\Page::latest()->get();

        return view('components.CMS.pages.index', 
        [
            'pages'       => $pages,
            'title'       => 'Pages Management',
            'description' => 'Manage, edit, and delete existing pages.',
            'keywords'    => 'pages, cms, content management',
        ]);
    }


    /**
     * Show form for creating a page.
     */
    public function create()
    {
        $data['parents'] = Page::all();
        $data['categories'] = CmsCategory::all();
        $data['tags'] = CmsTag::all();
        $imageMimeTypes = ['image/jpeg', 'image/png', 'image/webp', 'image/gif', 'image/svg+xml'];
        $data['media'] = Media::whereIn('mime_type', $imageMimeTypes)->get();


        // dd($data['media']);
        return view('components.CMS.pages.create', $data);
    }

    /**
     * Store a new page.
     */
    public function store(Request $request)
    {
        // dd($request);
        Cache::forget('global_active_pages');
        $validator = $this->validateRequest($request);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
        }

        $data = $validator->validated();
        $data['slug'] = $data['slug'] ?? Str::slug($data['title']) . '-' . uniqid();
        $page = Page::create($this->mapPageData($data));

        return response()->json(['status' => 'success', 'message' => 'Page created successfully!', 'page' => $page], 201);
    }

    /**
     * Show single page.
     */
    public function show($slug)
    {
        $page = Page::where('slug', $slug)->where('status', 'published')->firstOrFail();
        // dd($page);
        $view = view()->exists("components.templates.$page->template") ? "components.templates.$page->template" : "components.templates.default";
        return view($view, compact('page'));
    }

    /**
     * Edit page form.
     */
    public function edit($page)
    {
        $parents = Page::where('page_id', '!=', $page)->get();
        return view('components.CMS.pages.edit', compact('page', 'parents'));
    }

    /**
     * Update a page.
     */
    public function update(Request $request, Page $page)
    {
        $validator = $this->validateRequest($request, $page->page_id);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
        }

        $data = $validator->validated();
        $data['slug'] = $data['slug'] ?? $page->slug;

        $page->update($this->mapPageData($data));

        return response()->json(['status' => 'success', 'message' => 'Page updated successfully!', 'page' => $page]);
    }

    /**
     * Delete a page.
     */
    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('pages.index')->with('success', 'Page deleted successfully!');
    }

    /**
     * Search authors for dropdown.
     */

    public function searchAuthor(Request $request)
    {
        $search = $request->get('search');

        $users = Admins::where(function($query) use ($search) {
                $query->where('first_name', 'like', "%{$search}%")
                    ->where('last_name', 'like', "%{$search}%")
                    ->where('other_name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            })
            ->select('id', 'first_name', 'last_name' ,'other_name', 'email', 'profile_photo_path as profilePic')
            ->limit(10)
            ->get();

        return response()->json(['users' => $users]);
    }

    public function searchCategory(Request $request)
    {
        $search = $request->get('search', '');

        $categories = CmsCategory::where('name', 'like', "%{$search}%")
            ->select('category_id as id', 'name')
            ->limit(10)
            ->get();

        return response()->json([
            'categories' => $categories
        ]);
    }

    public function searchTag(Request $request)
    {
        // dd($request->all());
        $search = $request->get('search', '');
        $tags = CmsTag::where('name', 'like', "%{$search}%")
            ->select('tag_id as id', 'name')
            ->limit(10)
            ->get();

        return response()->json(['tags' => $tags]);
    }

    public function searchRole(Request $request)
    {
        $search = $request->get('search', '');
        $roles = \Spatie\Permission\Models\Role::where('guard_name', 'web')
            ->where('name', 'like', "%{$search}%")
            ->select('id', 'name')
            ->limit(10)
            ->get();

        return response()->json(['roles' => $roles]);
    }


    /**
     * Validation rules.
     */
    private function validateRequest(Request $request, $ignoreId = null)
    {
        return Validator::make($request->all(), [
            'title'        => 'required|string|max:255|unique:pages,title,' . $ignoreId . ',page_id',
            'slug'         => 'nullable|string|max:255|unique:pages,slug,' . $ignoreId . ',page_id',
            'menu_order'   => 'nullable|integer',
            'excerpt'      => 'nullable|string',
            'body'         => 'nullable|string',

            // visibility & status
            'visibility'          => ['required', Rule::in(['public', 'private', 'password'])],
            'visibility_password' => 'nullable|required_if:visibility,password|string|max:255',
            'status'              => ['required', Rule::in(['draft', 'pending', 'published'])],

            // Scheduling
            'publish_at'  => 'nullable|date|after_or_equal:today',
            'expire_at'   => 'nullable|date|after_or_equal:publish_at',

            // relationships
            'parent_id'    => 'nullable|exists:pages,page_id',
            'author_id'    => 'nullable|exists:admins,id',

            // tags & categories
            'tags'         => 'nullable|array',
            'tags.*'       => 'nullable|exists:cms_tags,tag_id',
            'categories'   => 'nullable|array',
            'categories.*' => 'nullable|exists:cms_categories,category_id',

            // Meta
            'revision_notes' => 'nullable|string',

            // SEO
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'keywords'         => 'nullable|string',
            'canonical_url'    => 'nullable|url',
            'robots_index'     => 'nullable|in:index,noindex',
            'robots_follow'    => 'nullable|in:follow,nofollow',
            'custom_meta'      => 'nullable|json',
            'og_title'        => 'nullable|string|max:255',
            'og_description'  => 'nullable|string',
            'og_image'        => 'nullable|string',
            'twitter_title'   => 'nullable|string|max:255',
            'twitter_description' => 'nullable|string',
            'twitter_image'   => 'nullable|string',


            // Media URLs only
            'featured_image'   => 'nullable|string',
            'gallery_images'   => 'nullable|array',
            'gallery_images.*' => 'nullable|string',
            'hero_bg'          => 'nullable|string',

            // Hero section
            'hero_title'       => 'nullable|string|max:255',
            'hero_subtitle'    => 'nullable|string|max:500',
            'hero_button_text' => 'nullable|string|max:100',
            'hero_button_url'  => 'nullable|url',

            // Components & layout
            'template'            => 'nullable|string|max:255',
            'layout_style'        => 'nullable|string|max:255',
            'sidebar_widgets'   => 'nullable|array',
            'sidebar_widgets.*' => 'nullable|string|max:255',
            'footer_widgets'   => 'nullable|array',
            'footer_widgets.*' => 'nullable|string|max:255',
            'enable_slider'        => 'nullable|boolean',
            'slider_images'        => 'nullable|array',
            'slider_images.*.image'=> 'nullable|string',
            'slider_images.*.caption'=> 'nullable|string|max:255',
            'slider_images.*.link'   => 'nullable|url',
            'reusable_components'  => 'nullable|array',
            'contact_form_enabled' => 'nullable|boolean',
            'contact_form_email'  => 'nullable|email',
            'contact_form_subject' => 'nullable|string|max:255',
            'contact_form_success_message' => 'nullable|string|max:255',
            'contact_form_fields'   =>  'nullable|array',

            'newsletter_enabled'   => 'nullable|boolean',
            'newsletter_provider'   =>  'nullable|string',

            // survey and polls
            'polls_surveys'   => 'nullable|array',
            'polls_surveys.*' => 'nullable|integer',
            'dynamic_tables'   => 'nullable|array',
            'dynamic_tables.*.table_id' => 'nullable|integer',

            // Access control
            'visible_roles'     => 'nullable|array',
            'device_visibility' => 'nullable|array',
            'geo_rules'         => 'nullable|array',

            // Customization
            'embed_code'    => 'nullable|string',
            'custom_css'    => 'nullable|string',
            'custom_js'     => 'nullable|string',
            'custom_head'   => 'nullable|string',
            'custom_body'   => 'nullable|string',

            // Analytics
            'tracking_code'     => 'nullable|string',
            'ab_variants'       => 'nullable|array',
            'conversion_goals'  => 'nullable|array'
        ]);
    }

    /**
     * Map data to DB fields.
     */
    private function mapPageData(array $data)
    {
         return [
            'title'               => $data['title'] ?? null,
            'slug'                => $data['slug'] ?? null,
            'menu_order'          => $data['menu_order']?? null,
            'excerpt'             => $data['excerpt'] ?? null,
            'body'                => $data['body'] ?? null,

            // Scheduling
            'publish_at'          => $data['publish_at'] ?? null,
            'expire_at'           => $data['expire_at'] ?? null,

            // visibility & status
            'visibility'          => $data['visibility'],
            'visibility_password' => $data['visibility_password'] ?? null,
            'status'              => $data['status'] ?? 'draft',

            // relationships
            'parent_id'           => $data['parent_id'] ?? null,
            'author_id'           => $data['author_id'] ?? Auth::id(),
            
            // tags & categories
            'tags'                => $data['tags'] ?? json_encode([]),
            'categories'          => $data['categories'] ?? json_encode([]),

            // SEO
            'meta_title'          => $data['meta_title'] ?? null,
            'meta_description'    => $data['meta_description'] ?? null,
            'keywords'            => $data['keywords'] ?? null,
            'canonical_url'       => $data['canonical_url'] ?? null,
            'robots_index'        => $data['robots_index'] ?? 'index',
            'robots_follow'       => $data['robots_follow'] ?? 'follow',
            'custom_meta'         => $data['custom_meta'] ?? null,

            // open graph
            'og_title'            => $data['og_title']?? null,
            'og_description'      => $data['og_description']?? null,
            'og_image'            => $data['og_image'] ?? null,
            
            // twitter
            'twitter_title'       => $data['twitter_title'] ?? null,
            'twitter_description' => $data['twitter_description'] ?? null,
            'twitter_image'       => $data['twitter_image'] ?? null,

            // Media
            'featured_image'      => $data['featured_image'] ?? null,
            'gallery_images'      => $data['gallery_images'] ?? json_encode([]),
            'hero_bg'             => $data['hero_bg'] ?? null,

            // Hero
            'hero_title'          => $data['hero_title'] ?? null,
            'hero_subtitle'       => $data['hero_subtitle'] ?? null,
            'hero_button_text'    => $data['hero_button_text'] ?? null,
            'hero_button_url'     => $data['hero_button_url'] ?? null,

            // Layout & Template
            'template'            => $data['template'] ?? 'default',
            'layout_style'        => $data['layout_style'] ?? 'full-width',
            'sidebar_widgets'     => $data['sidebar_widgets'] ?? json_encode([]),
            'footer_widgets'      => $data['footer_widgets'] ?? json_encode([]),

            // Components
            'enable_slider'       => $data['enable_slider'] ?? false,
            'slider_images'       => $data['slider_images'] ?? json_encode([]),
            'reusable_components' => $data['reusable_components'] ?? json_encode([]),
            'contact_form_enabled'=> $data['contact_form_enabled'] ?? false,
            'contact_form_email'  => $data['contact_form_email'] ?? false,
            'contact_form_subject' => $data['contact_form_subject'] ?? false,
            'contact_form_fields'   => $data['contact_form_fields'] ?? false,
            'newsletter_enabled'  => $data['newsletter_enabled'] ?? false,
            'newsletter_provider' => $data['newsletter_provider'] ?? false,

            // Access
            'visible_roles'       => $data['visible_roles'] ?? json_encode([]),
            'device_visibility'   => $data['device_visibility'] ?? json_encode([]),
            'polls_surveys'       => $data['polls_surveys'] ?? json_encode([]),
            'dynamic_tables'      => $data['dynamic_tables'] ?? json_encode([]),
            'geo_rules'           => $data['geo_rules'] ?? json_encode([]),
            'conditional_logic'   => $data['conditional_logic'] ?? json_encode([]),
            'embed_code'          => $data['embed_code'] ?? json_encode([]),

            // Customization
            'custom_css'          => $data['custom_css'] ?? null,
            'custom_js'           => $data['custom_js'] ?? null,
            'custom_head'         => $data['custom_head'] ?? null,
            'custom_body'         => $data['custom_body'] ?? null,

            // Analytics
            'tracking_code'       => $data['tracking_code'] ?? null,
            'ab_variants'         => $data['ab_variants'] ?? json_encode([]),
            'conversion_goals'    => $data['conversion_goals'] ?? json_encode([]),
            'layout'              => $data['layout'] ?? json_encode([]),
            'template_alt'        => $data['template_alt'] ?? json_encode([]),
            // Meta
            'revision_notes'      => $data['revision_notes'] ?? null,
        ];
    }

    public function preview(Page $page)
    {
        $template = $page->template ?? 'default';
        $view = view()->exists("templates.$template") ? "templates.$template" : "templates.default";
        return view($view, compact('page'));
    }

    public function getTemplate()  {
        return [
            'default' => 'Default Template',
            'landing' => 'Landing Page Template',
            'contact' => 'Contact Page',
            'about'   => 'About Page',
            'faq'     => 'FAQ Page'
        ];
    }

}
