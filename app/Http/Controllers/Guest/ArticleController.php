<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Inertia\Inertia;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all()->map(function ($article) {
            return [
                'id' => $article->id,
                'title' => $article->title,
                'excerpt' => $article->excerpt,
                'description' => $article->description,
                'imageUrl' => $article->getFirstMediaUrl('images'),
            ];
        });

        return Inertia::render('Guest/Home', [
            'articles' => $articles,
        ]);
    }

    public function show(Article $article)
    {
        return Inertia::render('Guest/Show', [
            'article' => [
                'id' => $article->id,
                'title' => $article->title,
                'excerpt' => $article->excerpt,
                'summary' => $article->summary,
                'description' => $article->description,
                'date' => $article->date,
            ],
            'imageUrl' => $article->getFirstMediaUrl('images'),
        ]);
    }
}
