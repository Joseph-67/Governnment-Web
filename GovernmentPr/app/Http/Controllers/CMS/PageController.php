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
        $sliderImages = json_decode($page->slider_images, true) ?? [];
        
        // Process slider images to get proper URLs
        if (!empty($sliderImages)) {
            foreach ($sliderImages as &$slide) {
                if (!empty($slide['image'])) {
                    // Check if it's a media ID or already a URL
                    if (is_numeric($slide['image'])) {
                        $media = Media::find($slide['image']);
                        $slide['image'] = $media ? $media->url : asset('MainAssets/img/slider/default-slide.jpg');
                    } elseif (!filter_var($slide['image'], FILTER_VALIDATE_URL)) {
                        // If it's not a URL, assume it's a filename in the slider directory
                        $slide['image'] = asset('MainAssets/img/slider/' . $slide['image']);
                    }
                }
            }
        }
        
        // Process dynamic content for FAQ and other templates
        $dynamicContent = $this->processDynamicContent($page);
        
        $view = view()->exists("components.templates.$page->template") ? "components.templates.$page->template" : "components.templates.default";
        return view($view, compact('page', 'sliderImages', 'dynamicContent'));
    }

    /**
     * Process dynamic content for templates
     */
    private function processDynamicContent($page)
    {
        $content = [
            'faq_data' => [],
            'tables' => [],
            'surveys' => [],
            'processed_body' => $page->body
        ];

        // Process FAQ data from various sources
        if (!empty($page->dynamic_tables) && is_array($page->dynamic_tables)) {
            $content['faq_data'] = $this->normalizeFaqData($page->dynamic_tables);
            $content['tables'] = $page->dynamic_tables;
        }

        if (!empty($page->polls_surveys) && is_array($page->polls_surveys)) {
            $content['surveys'] = $page->polls_surveys;
            if (empty($content['faq_data'])) {
                $content['faq_data'] = $this->normalizeFaqData($page->polls_surveys);
            }
        }

        return $content;
    }

    /**
     * Normalize FAQ data structure
     */
    private function normalizeFaqData($data)
    {
        $normalized = [];
        
        foreach ($data as $key => $category) {
            if (is_array($category)) {
                $normalizedCategory = [
                    'category' => $category['category'] ?? $category['name'] ?? $category['title'] ?? "Category " . ($key + 1),
                    'icon' => $category['icon'] ?? 'fa-solid fa-folder',
                    'questions' => []
                ];
                
                $questions = $category['questions'] ?? $category['items'] ?? $category['faqs'] ?? [];
                
                if (is_array($questions)) {
                    foreach ($questions as $question) {
                        if (is_array($question) && isset($question['question']) && isset($question['answer'])) {
                            $normalizedCategory['questions'][] = [
                                'question' => $question['question'] ?? $question['title'] ?? '',
                                'answer' => $question['answer'] ?? $question['content'] ?? $question['description'] ?? ''
                            ];
                        }
                    }
                }
                
                $normalized[] = $normalizedCategory;
            }
        }
        
        return $normalized;
    }

    /**
     * Edit page form.
     */
    public function edit($page)
    {
        try {
            $data['allPages'] = Page::where('page_id', '!=', $page)->get();
            $data['page'] = Page::where('page_id', $page)->firstOrFail();
            $data['parents'] = Page::where('page_id', '!=', $page)->get();
            
            // Ensure page has required fields
            if (!$data['page']->title) {
                $data['page']->title = '';
            }
            if (!$data['page']->slug) {
                $data['page']->slug = '';
            }
            if (!$data['page']->status) {
                $data['page']->status = 'draft';
            }
            
            return view('components.CMS.pages.edit', $data);
        } catch (\Exception $e) {
            return redirect()->route('admin.pages.index')->with('error', 'Page not found.');
        }
    }

    /**
     * Update a page.
     */
    public function update(Request $request, $pageId)
    {
        try {
            Cache::forget('global_active_pages');
            
            $page = Page::where('page_id', $pageId)->firstOrFail();
            
            // Only validate the required fields
            $validator = $this->validateRequest($request, $page->page_id);

            if ($validator->fails()) {
                return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
            }

            // Use all request data, not just validated data
            $data = $request->all();
            $data['slug'] = $data['slug'] ?? $page->slug;

            $page->update($this->mapPageData($data));

            return response()->json(['status' => 'success', 'message' => 'Page updated successfully!', 'page' => $page]);
            
        } catch (\Exception $e) {
            \Log::error('Page update error: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Something went wrong. Please try again!'], 500);
        }
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
        // Only validate the three required fields: title, slug, and status
        // All other fields are accepted as-is without validation
        return Validator::make($request->all(), [
            'title' => 'required|string|max:255|unique:pages,title,' . $ignoreId . ',page_id',
            'slug'  => 'required|string|max:255|unique:pages,slug,' . $ignoreId . ',page_id',
            'status' => ['required', Rule::in(['draft', 'pending', 'published', 'archived'])],
        ]);
    }

    /**
     * Map data to DB fields.
     */
    private function mapPageData(array $data)
    {
        // Start with basic required fields
        $mappedData = [
            'title'  => $data['title'] ?? null,
            'slug'   => $data['slug'] ?? null,
            'status' => $data['status'] ?? 'draft',
        ];

        // Add optional fields only if they exist in the request
        $optionalFields = [
            'menu_order', 'excerpt', 'body', 'publish_at', 'expire_at',
            'visibility', 'visibility_password', 'parent_id', 'author_id',
            'tag_ids', 'category_ids', 'revision_notes',
            'meta_title', 'meta_description', 'keywords', 'canonical_url',
            'robots_index', 'robots_follow', 'custom_meta',
            'og_title', 'og_description', 'og_image',
            'twitter_title', 'twitter_description', 'twitter_image',
            'featured_image', 'hero_bg', 'hero_title', 'hero_subtitle',
            'hero_button_text', 'hero_button_url', 'template', 'layout_style',
            'sidebar_widgets', 'footer_widgets', 'enable_slider',
            'reusable_components', 'contact_form_enabled', 'contact_form_email',
            'contact_form_subject', 'contact_form_success_message', 'contact_form_fields',
            'newsletter_enabled', 'newsletter_provider', 'role_ids',
            'polls_surveys', 'dynamic_tables', 'geo_rules', 'conditional_logic',
            'embed_code', 'custom_css', 'custom_js', 'custom_head', 'custom_body',
            'tracking_code', 'ab_variants', 'conversion_goals', 'layout', 'template_alt'
        ];

        foreach ($optionalFields as $field) {
            if (isset($data[$field])) {
                $mappedData[$field] = $data[$field];
            }
        }

        // Handle special fields that need JSON encoding
        if (isset($data['gallery_images'])) {
            $mappedData['gallery_images'] = is_array($data['gallery_images']) ? json_encode($data['gallery_images']) : $data['gallery_images'];
        }
        
        if (isset($data['slides'])) {
            $mappedData['slider_images'] = json_encode($data['slides']);
        }
        
        if (isset($data['device_visibility'])) {
            $mappedData['device_visibility'] = is_array($data['device_visibility']) ? json_encode($data['device_visibility']) : $data['device_visibility'];
        }

        return $mappedData;
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

    /**
     * Get sample FAQ data structure for reference
     */
    public function getSampleFaqData()
    {
        return [
            [
                'category' => 'General Information',
                'icon' => 'fa-solid fa-info-circle',
                'questions' => [
                    [
                        'question' => 'What services do you offer?',
                        'answer' => 'We offer a comprehensive range of services designed to meet your needs.'
                    ],
                    [
                        'question' => 'How can I contact customer support?',
                        'answer' => 'You can reach our customer support team through multiple channels: email, phone, or live chat.'
                    ]
                ]
            ],
            [
                'category' => 'Services & Pricing',
                'icon' => 'fa-solid fa-dollar-sign',
                'questions' => [
                    [
                        'question' => 'What is your pricing structure?',
                        'answer' => 'Our pricing is competitive and transparent. We offer flexible packages to suit different budgets.'
                    ],
                    [
                        'question' => 'Do you offer refunds?',
                        'answer' => 'Yes, we have a comprehensive refund policy. You may be eligible for a refund within 30 days.'
                    ]
                ]
            ]
        ];
    }

    /**
     * API endpoint to get sample FAQ data (for admin interface)
     */
    public function getFaqSample()
    {
        return response()->json([
            'sample_data' => $this->getSampleFaqData(),
            'instructions' => [
                'Store this data in the "dynamic_tables" field of your page',
                'Each category should have a "category", "icon", and "questions" array',
                'Each question should have a "question" and "answer" field',
                'Icons should use FontAwesome classes (e.g., "fa-solid fa-info-circle")'
            ]
        ]);
    }

    /**
     * Update page with sample FAQ data (for testing)
     */
    public function populateSampleFaq(Page $page)
    {
        $sampleData = $this->getSampleFaqData();
        
        $page->update([
            'dynamic_tables' => $sampleData,
            'template' => 'faq'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Sample FAQ data has been added to the page',
            'data' => $sampleData
        ]);
    }

}
