<?php

use App\Http\Controllers\Admin\ArticleAdminController;
use App\Http\Controllers\Guest\ArticleController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/laravelpage', function () {
    return Inertia::render('LaravelPage', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/', function () {
    $articles = Article::all()->map(function ($article) {
        return [
            'id' => $article->id,
            'title' => $article->title,
            'description' => $article->description,
            'date' => $article->date?->format('Y'),
            'imageUrl' => $article->getFirstMediaUrl('images'),
        ];
    });

    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'articles' => $articles,
    ]);
})->name('home');


Route::get('/', [ArticleController::class, 'index'])->name('guest.index');
Route::get('/article/{article}', [ArticleController::class, 'show'])->name('guest.article.show');

Route::prefix('admin')
    ->name('admin.')
    // ->middleware(['auth']) // enable when you wire auth
    ->group(function () {
        Route::get('/articles', [ArticleAdminController::class, 'index'])->name('articles.index');
        Route::get('/articles/create', [ArticleAdminController::class, 'create'])->name('articles.create');
        Route::post('/articles', [ArticleAdminController::class, 'store'])->name('articles.store');
        Route::get('/articles/{article}', [ArticleAdminController::class, 'show'])->name('articles.show');
        Route::get('/articles/{article}/edit', [ArticleAdminController::class, 'edit'])->name('articles.edit');
        Route::put('/articles/{article}', [ArticleAdminController::class, 'update'])->name('articles.update');
        Route::delete('/articles/{article}', [ArticleAdminController::class, 'destroy'])->name('articles.destroy');
    });

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
