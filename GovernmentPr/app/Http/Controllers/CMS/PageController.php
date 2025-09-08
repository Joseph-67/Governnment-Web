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
        $validator = $this->validateRequest($request);
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
        }

        $data = $validator->validated();

        // Generate slug if not provided
        $data['slug'] = $data['slug'] ?? Str::slug($data['title']) . '-' . uniqid();

        // Handle uploads
        $data = $this->handleUploads($request, $data);

        // Build associative array for DB insert
        $pageData = $this->buildPageData($data);

        // Save page
        $page = Page::create($pageData);

        return response()->json(['status' => 'success', 'message' => 'Page created successfully!', 'page' => $page], 201);
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
        $validator = $this->validateRequest($request);
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
        }

        $data = $validator->validated();

        // Keep old slug if not provided
        $data['slug'] = $data['slug'] ?? $page->slug;

        // Handle uploads (replace old files if new ones are uploaded)
        $data = $this->handleUploads($request, $data, $page);

        // Build associative array for DB update
        $pageData = $this->buildPageData($data);

        // Update page
        $page->update($pageData);

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
    private function validateRequest(Request $request)
    {
        return Validator::make($request->all(), [
            'title'       => 'required|string|max:255',
            'slug'        => 'nullable|string|max:255|unique:pages,slug',
            'excerpt'     => 'nullable|string',
            'body'        => 'nullable|string',

            // Media
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'hero_image'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_slider.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'gallery.*'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            // SEO
            'seo_title'       => 'nullable|string|max:255',
            'seo_description' => 'nullable|string',
            'seo_keywords'    => 'nullable|string',
            'og_title'        => 'nullable|string|max:255',
            'og_description'  => 'nullable|string',
            'og_image'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'twitter_title'   => 'nullable|string|max:255',
            'twitter_description' => 'nullable|string',
            'twitter_image'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'canonical_url'   => 'nullable|url',
            'robots'          => 'nullable|string|max:50',

            // Customization
            'custom_css'      => 'nullable|string',
            'custom_js'       => 'nullable|string',
            'custom_head'     => 'nullable|string',
            'custom_body'     => 'nullable|string',

            // Access & scheduling
            'is_private'      => 'nullable|boolean',
            'password'        => 'nullable|string',
            'visibility_roles'=> 'nullable|string',
            'published_at'    => 'nullable|date',
            'expires_at'      => 'nullable|date',
            'status'          => 'nullable|string|in:draft,published,archived',

            // Metadata
            'author_id'       => 'nullable|exists:admins,id',
            'categories'      => 'nullable|string',
            'tags'            => 'nullable|string',
            'revision_notes'  => 'nullable|string',

            // Analytics
            'analytics'       => 'nullable|json',
            'ab_tests'        => 'nullable|json',
            'goals'           => 'nullable|json',
        ]);
    }
    /**
     * Handle file uploads for images.
     */


    private function handleUploads(Request $request, array &$data, ?Page $existing = null)
    {
        // Config for single file fields
        $map = [
            'featured_image' => 'pages/featured',
            'hero_bg'        => 'pages/hero',
            'og_image'       => 'pages/seo',
            'twitter_image'  => 'pages/seo',
        ];

        foreach ($map as $input => $dir) {
            if ($request->hasFile($input)) {
                // Delete old file if replacing
                if ($existing && $existing->$input) {
                    Storage::disk('public')->delete($existing->$input);
                }

                // Use unique filename to avoid conflicts
                $file = $request->file($input);
                $filename = time() . '_' . $file->getClientOriginalName();
                $data[$input] = $file->storeAs($dir, $filename, 'public');
            } else {
                // Preserve old value if not replaced
                if ($existing && $existing->$input && !isset($data[$input])) {
                    $data[$input] = $existing->$input;
                }
            }
        }

        // Slides: images + metadata
        $slides = $request->input('slides', []);
        $files  = $request->file('slides', []);
        $builtSlides = [];

        foreach ($slides as $idx => $slide) {
            $row = [
                'title'      => $slide['title'] ?? null,
                'caption'    => $slide['caption'] ?? null,
                'media_link' => $slide['media_link'] ?? null,
                'link'       => $slide['link'] ?? null,
                'order'      => isset($slide['order']) ? (int)$slide['order'] : $idx,
                'image'      => null,
            ];

            // Handle new upload or keep old image
            if (isset($files[$idx]['image']) && $files[$idx]['image']) {
                if ($existing && is_array($existing->slider_images)) {
                    $prev = $existing->slider_images[$idx]['image'] ?? null;
                    if ($prev) {
                        Storage::disk('public')->delete($prev);
                    }
                }
                $row['image'] = $files[$idx]['image']->store('pages/slides', 'public');
            } else {
                if ($existing && is_array($existing->slider_images)) {
                    $row['image'] = $existing->slider_images[$idx]['image'] ?? null;
                }
            }

            // Skip if completely empty
            if ($row['image'] || $row['title'] || $row['caption'] || $row['link']) {
                $builtSlides[] = $row;
            }
        }

        if (!empty($builtSlides)) {
            usort($builtSlides, fn($a, $b) => ($a['order'] ?? 0) <=> ($b['order'] ?? 0));
            $data['slider_images'] = $builtSlides;
            $data['enable_slider'] = true;
        }

        // Gallery: fallback to existing if none sent
        if (!isset($data['gallery_images']) || !is_array($data['gallery_images'])) {
            if ($existing) {
                $data['gallery_images'] = $existing->gallery_images;
            }
        }
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

        private function buildPageData(array $data)
    {
        return [
            'title'               => $data['title'] ?? null,
            'slug'                => $data['slug'] ?? null,
            'excerpt'             => $data['excerpt'] ?? null,
            'body'                => $data['body'] ?? null,

            // Media
            'featured_image'       => $data['featured_image'] ?? null,
            'hero_image'           => $data['hero_image'] ?? null,
            'image_slider'         => $data['image_slider'] ?? null,
            'gallery'              => $data['gallery'] ?? null,

            // SEO
            'seo_title'            => $data['seo_title'] ?? null,
            'seo_description'      => $data['seo_description'] ?? null,
            'seo_keywords'         => $data['seo_keywords'] ?? null,
            'og_title'             => $data['og_title'] ?? null,
            'og_description'       => $data['og_description'] ?? null,
            'og_image'             => $data['og_image'] ?? null,
            'twitter_title'        => $data['twitter_title'] ?? null,
            'twitter_description'  => $data['twitter_description'] ?? null,
            'twitter_image'        => $data['twitter_image'] ?? null,
            'canonical_url'        => $data['canonical_url'] ?? null,
            'robots'               => $data['robots'] ?? null,

            // Customization
            'custom_css'           => $data['custom_css'] ?? null,
            'custom_js'            => $data['custom_js'] ?? null,
            'custom_head'          => $data['custom_head'] ?? null,
            'custom_body'          => $data['custom_body'] ?? null,

            // Access & scheduling
            'is_private'           => $data['is_private'] ?? 0,
            'password'             => $data['password'] ?? null,
            'visibility_roles'     => $data['visibility_roles'] ?? null,
            'published_at'         => $data['published_at'] ?? null,
            'expires_at'           => $data['expires_at'] ?? null,
            'status'               => $data['status'] ?? 'draft',

            // Metadata
            'author_id'            => $data['author_id'] ?? auth()->id(),
            'categories'           => $data['categories'] ?? null,
            'tags'                 => $data['tags'] ?? null,
            'revision_notes'       => $data['revision_notes'] ?? null,

            // Analytics
            'analytics'            => $data['analytics'] ?? null,
            'ab_tests'             => $data['ab_tests'] ?? null,
            'goals'                => $data['goals'] ?? null,
        ];
    }
}
