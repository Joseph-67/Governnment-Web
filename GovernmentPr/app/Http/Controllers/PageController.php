<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    /**
     * Display a listing of pages.
     */
    public function index()
    {
        $pages = Page::latest()->paginate(15);
        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show form for creating a page.
     */
    public function create()
    {
        return view('admin.pages.create');
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
            'body'        => 'nullable|string',

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
}
