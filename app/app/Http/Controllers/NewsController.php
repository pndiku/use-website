<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\SiteContent;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::with('securities')->latest()->get();
        return response()->json($news);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required_if:article_type,article|nullable|string',
            'summary' => 'nullable|string|max:1000',
            'author' => 'nullable|string|max:255',
            'image_url' => 'nullable|url',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date',
            'article_type' => 'required|in:article,report',
            'file_url' => 'required_if:article_type,report|nullable|url',
            'securities' => 'nullable|array',
            'securities.*' => 'exists:securities,id'
        ]);

        $news = News::create($request->except(['securities']));

        // Attach securities if provided
        if ($request->has('securities') && is_array($request->securities)) {
            $news->securities()->attach($request->securities);
        }

        // Load securities relationship for response
        $news->load('securities');

        return response()->json($news, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::with('securities')->findOrFail($id);
        return response()->json($news);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required_if:article_type,article|nullable|string',
            'summary' => 'nullable|string|max:1000',
            'author' => 'nullable|string|max:255',
            'image_url' => 'nullable|url',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date',
            'article_type' => 'required|in:article,report',
            'file_url' => 'required_if:article_type,report|nullable|url',
            'securities' => 'nullable|array',
            'securities.*' => 'exists:securities,id'
        ]);

        $news->update($request->except(['securities']));

        // Sync securities (this will remove old ones and add new ones)
        if ($request->has('securities')) {
            $securities = is_array($request->securities) ? $request->securities : [];
            $news->securities()->sync($securities);
        }

        // Load securities relationship for response
        $news->load('securities');

        return response()->json($news);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();
        return response()->json(['message' => 'News article deleted successfully']);
    }

    /**
     * Display a specific news article for public viewing
     */
    public function feed()
    {
        $articles = News::published()->latest()->take(20)->get();
        $siteContent = SiteContent::all()->pluck('value', 'key')->toArray();
        return response()
            ->view('news.feed', compact('articles', 'siteContent'))
            ->header('Content-Type', 'application/rss+xml; charset=utf-8');
    }

    public function showPublic($slug)
    {
        $article = News::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        // Get related articles (latest 3 published articles excluding current one)
        $relatedArticles = News::published()
            ->where('id', '!=', $article->id)
            ->latest()
            ->take(3)
            ->get();

        // Fetch site content for consistent branding
        $siteContent = SiteContent::all()->pluck('value', 'key')->toArray();

        // Fetch menu items with 3-level hierarchy
        $menuItems = MenuItem::with('activeChildren.activeChildren')
            ->mainMenu()
            ->active()
            ->get();

        return view('news.show', compact('article', 'relatedArticles', 'siteContent', 'menuItems'));
    }
}
