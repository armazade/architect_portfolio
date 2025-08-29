<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleUpdateRequest;
use App\Models\Article;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\RedirectResponse;

class ArticleAdminController extends Controller
{
    public function index(): Response
    {
        $articles = Article::all();
        return Inertia::render('Admin/Article/Index', [
            'articles' => $articles->map(function ($article) {
                return [
                    'id' => $article->id,
                    'title' => $article->title,
                    'description' => $article->description,
                    'created_at' => $article->created_at->format('M d, Y'),
                    'imageUrl' => $article->getFirstMediaUrl('images'),
                ];
            }),
            'flash' => [
                'success' => session('success'),
            ]
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Article/Create');
    }

    public function store(ArticleUpdateRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $article = Article::create($validated);

        if ($request->hasFile('image')) {
            $article
                ->addMediaFromRequest('image')
                ->toMediaCollection('images', 'public');
        }

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'Article created successfully!');
    }

    public function show(Article $article): Response
    {
        return Inertia::render('Admin/Article/Show', [
            'article' => $article,
            'imageUrl' => $article->getFirstMediaUrl('images'),
        ]);
    }

    public function edit(Article $article): Response
    {
        return Inertia::render('Admin/Article/Edit', [
            'article' => $article,
            'imageUrl' => $article->getFirstMediaUrl('images'),
        ]);
    }

    public function update(ArticleUpdateRequest $request, Article $article): RedirectResponse
    {
        $validated = $request->validated();

        $article->update($validated);

        if ($request->hasFile('image')) {
            $article->clearMediaCollection('images');
            $article->addMediaFromRequest('image')->toMediaCollection('images', 'public');
        }

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'Article updated successfully!');
    }

    public function destroy(Article $article): RedirectResponse
    {
        $article->clearMediaCollection('images');

        $article->delete();

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'Article deleted successfully!');
    }
}
