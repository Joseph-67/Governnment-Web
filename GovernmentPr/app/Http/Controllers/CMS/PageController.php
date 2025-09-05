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


class PageController extends Controller
{
    /**
     * Display a listing of pages.
     */
    public function index()
    {
        $data['pages'] = Page::latest()->paginate(15);
        return view('components.CMS.pages/index', compact('pages'));
    }

    /**
     * Show form for creating a page.
     */
    public function create()
    {
        $data['parents'] = Page::all();
        $data['categories'] = CmsCategory::all();
        $data['tags'] = CmsTag::all();

        return view('components.CMS.pages.create', $data);
    }

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
     * Store a new page.
     */
    public function store(Request $request)
    {
        $validated = $this->validateRequest($request);

        if ($validated->fails()){
            return response()->json(['status'=> 'error', 'errors'=>$validated->errors()], 422);
        }

        // Auto-generate slug if empty
        $validated['slug'] = $validated['slug'] ?? Str::slug($validated['title']) . '-' . uniqid();

        // Handle file uploads
        $validated = $this->handleUploads($request, $validated);

        $page = Page::create($validated);

        return redirect()->route('pages.index')->with('success', 'Page created successfully!');
    }

    /**
     * Show single page.
     */
    public function show(Page $page)
    {
        return view('admin.pages.show', compact('page'));
    }

    /**
     * Edit page form.
     */
    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    /**
     * Update a page.
     */
    public function update(Request $request, Page $page)
    {
        $validated = $this->validateRequest($request, $page->id);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']) . '-' . Str::random(6);
        }

        $validated = $this->handleUploads($request, $validated);

        $page->update($validated);

        return redirect()->route('pages.index')->with('success', 'Page updated successfully!');
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
     * Validation rules for pages.
     */
    protected function validateRequest(Request $request, $pageId = null)
    {
        return Validator::make($request->all(), [
            'title'       => 'required|string|max:255',
            'slug'        => 'nullable|string|max:255|unique:pages,slug,' . $pageId,
            'menu_order'   => 'nullable|integer|min:0',
            'excerpt'     => 'nullable|string|max:500',
            'body'        => 'nullable|string|min:10',

            'status'      => 'required|in:draft,published,archived',

            // Media
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'gallery_images' => 'nullable|json',
            'hero_bg'        => 'nullable|file|mimes:jpg,jpeg,png,webp,mp4,webm,ogg|max:10240',

            //hero & layout
            'hero_title'        => 'nullable|string|max:255',
            'hero_subtitle'     => 'nullable|string|max:255',
            'hero_button_text'  => 'nullable|string|max:100',
            'hero_button_url'   => 'nullable|url|max:255',

            //template
            'template'      => 'nullable',
            'layout_style'  => 'nullable',
            'sidebar_widgets' => 'nullable|json',
            'footer_widgets'  => 'nullable|json',

            // SEO
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'keywords'         => 'nullable|string|max:500',
            'canonical_url'    => 'nullable|url|max:255',
            'robots_index'     => 'nullable|in:index,noindex',
            'robots_follow'    => 'nullable|in:follow,nofollow',

            //Open Graph
            'og_title'         => 'nullable|string|max:255',
            'og_description'   => 'nullable|string|max:500',
            'og_image'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'twitter_title'    => 'nullable|string|max:255',
            'twitter_description' => 'nullable|string|max:500',
            'twitter_image'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'custom_meta'      => 'nullable|json',

            // Layout & components
            'layout'        => 'nullable|string|max:100',
            'widgets'       => 'nullable|json',
            'components'    => 'nullable|json',

            // Extra features
            'forms'         => 'nullable|json',
            'newsletter'    => 'nullable|json',
            'polls'         => 'nullable|json',
            'dynamic_tables'=> 'nullable|json',
            'conditional_logic' => 'nullable|json',

            // Custom code
            'custom_css'    => 'nullable|string',
            'custom_js'     => 'nullable|string',
            'custom_head'   => 'nullable|string',
            'custom_body'   => 'nullable|string',

            // Access & visibility
            'visibility'    => 'nullable|string|max:50',
            'visibility_password'      => 'nullable|string|max:255',
            'access_roles'  => 'nullable|json',
            'parent_id'    => 'nullable|integer',

            // Scheduling
            'publish_at'    => 'nullable|date',
            'expire_at'     => 'nullable|date|after_or_equal:publish_at',

            // Metadata
            'author_id'     => 'nullable|integer|exists:users,id',
            'categories'    => 'nullable|json',
            'category_ids'  => 'nullable|array',
            'category_ids.*'=> 'integer',
            'tags'          => 'nullable|json',
            'tag_ids'       => 'nullable|array',
            'tag_ids.*'     => 'integer',
            'revision_notes' => 'nullable|string|max:500',

            // Analytics & A/B testing
            'analytics'     => 'nullable|json',
            'ab_test'       => 'nullable|json',
            'goals'         => 'nullable|json',

            // --- Extended fields for advanced builder ---
            // Components tab
            'enable_slider'         => 'nullable|boolean',
            'slider_images'         => 'nullable|json',
            'reusable_components'   => 'nullable|json',
            'contact_form_enabled'  => 'nullable|boolean',
            'contact_form_email'    => 'nullable|email',
            'contact_form_subject'  => 'nullable|string|max:255',
            'contact_form_fields'   => 'nullable|json',
            'newsletter_enabled'    => 'nullable|boolean',
            'newsletter_provider'   => 'nullable|string|max:100',
            'polls_surveys'         => 'nullable|json',
            'dynamic_tables'        => 'nullable|json',
            'conditional_logic'     => 'nullable|json',
            'embed_code'            => 'nullable|string',
            // Access tab
            'role_ids'              => 'nullable|array',
            'role_ids.*'            => 'integer',
            'device_visibility'     => 'nullable|array',
            'device_visibility.*'   => 'in:desktop,tablet,mobile',
            'geo_rules'             => 'nullable|json',
            // Analytics tab
            'tracking_code'         => 'nullable|string',
            'ab_variants'           => 'nullable|json',
            'conversion_goals'      => 'nullable|json',
            // Settings tab
            'template_alt'          => 'nullable|string|max:100',
        
        ]);


    }

    /**
     * Handle file uploads for images.
     */
    protected function handleUploads(Request $request, array $validated)
    {
        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('pages/featured', 'public');
        }

        if ($request->hasFile('hero_image')) {
            $validated['hero_image'] = $request->file('hero_image')->store('pages/hero', 'public');
        }

        return $validated;
    }

    /**
     * Upload media files (AJAX).
     */
    public function uploadMedia(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'media' => 'required|file|mimes:jpg,jpeg,png,webp,gif,svg,mp4,mp3,pdf,doc,docx,xls,xlsx|max:204800',
        ]);

        if ($validator->fails()) {
            return response()->json([
            'success' => false,
            'errors' => $validator->errors(),
            ], 422);
        }

        try {
            $file = $request->file('media');

            // Determine category
            $mime = $file->getMimeType();
            if (str_starts_with($mime, 'image/')) {
                $category = 'image';
                $folder = 'pages/media/images';
            } elseif (str_starts_with($mime, 'video/')) {
                $category = 'video';
                $folder = 'pages/media/videos';
            } elseif (str_starts_with($mime, 'audio/')) {
                $category = 'audio';
                $folder = 'pages/media/audio';
            } elseif (
                in_array($file->extension(), ['pdf','doc','docx','xls','xlsx'])
            ) {
                $category = 'document';
                $folder = 'pages/media/documents';
            } else {
                $category = 'other';
                $folder = 'pages/media/others';
            }

            // Unique filename
            $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
            $path = $file->storeAs($folder, $filename, 'public');
            $url = asset('storage/' . $path);

            // Save media record
            $media = Media::create([
                'original_name' => $file->getClientOriginalName(),
                'path'          => $path,
                'url'           => $url,
                'mime_type'     => $mime,
                'size'          => $file->getSize(),
                'category'      => $category,
                'uploaded_by'   => Auth::id(),
            ]);

            return response()->json([
                'success' => true,
                'media'   => [
                    'id'            => $media->media_id,
                    'original_name' => $media->original_name,
                    'url'           => $media->url,
                    'mime_type'     => $media->mime_type,
                    'size'          => $media->size,
                    'category'      => $media->category,
                    'created_at'    => $media->created_at,
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Upload failed: ' . $e->getMessage(),
            ], 500);
        }
    }
}
