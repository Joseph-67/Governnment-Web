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
        $search = $request->get('search', '');
        $tags = CmsTag::where('name', 'like', "%{$search}%")
            ->select('tag_id as id', 'name')
            ->limit(10)
            ->get();

        return response()->json(['items' => $tags]);
    }



    /**
     * Store a new page.
     */
    public function store(Request $request)
    {
        $validated = $this->validateRequest($request);

        // Slug auto-generation
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']) . '-' . Str::random(6);
        }

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
        return $request->validate([
            'title'       => 'required|string|max:255',
            'slug'        => 'nullable|string|max:255|unique:pages,slug,' . $pageId,
            'excerpt'     => 'nullable|string|max:500',
            'body'        => 'nullable|string|min:10',

            // Media
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'hero_image'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'gallery'        => 'nullable|array',
            'image_slider'   => 'nullable|array',

            // SEO
            'seo_title'       => 'nullable|string|max:255',
            'seo_description' => 'nullable|string|max:500',
            'seo_keywords'    => 'nullable|string',
            'og_title'        => 'nullable|string|max:255',
            'og_description'  => 'nullable|string|max:500',
            'twitter_title'   => 'nullable|string|max:255',
            'twitter_description' => 'nullable|string|max:500',
            'robots'          => 'nullable|string|max:50',

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
            'password'      => 'nullable|string|max:255',
            'access_roles'  => 'nullable|json',

            // Scheduling
            'publish_at'    => 'nullable|date',
            'expire_at'     => 'nullable|date|after_or_equal:publish_at',

            // Metadata
            'author_id'     => 'nullable|integer|exists:users,id',
            'categories'    => 'nullable|json',
            'tags'          => 'nullable|json',
            'revision_note' => 'nullable|string|max:500',

            // Analytics & A/B testing
            'analytics'     => 'nullable|json',
            'ab_test'       => 'nullable|json',
            'goals'         => 'nullable|json',
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
