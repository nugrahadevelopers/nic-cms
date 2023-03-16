<?php

use App\Http\Controllers\Front\Article\ArticleReadController;
use App\Http\Controllers\Front\Landing\LandingPageController;
use Illuminate\Support\Facades\Route;

// Route untuk halaman landing page
Route::get('/', [LandingPageController::class, 'index'])->name('home.index');

// Demo Halaman Baca Artikel
Route::get('/articles/read-documentation', [ArticleReadController::class, 'index'])->name('home.articles.read');

// Route untuk panel admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    require __DIR__ . '/panel/admin/dashboard.php';
    require __DIR__ . '/panel/admin/user.php';
    require __DIR__ . '/panel/admin/profile.php';
    require __DIR__ . '/panel/admin/role.php';
    require __DIR__ . '/panel/admin/sitemap.php';
});

// Route untuk auth
require __DIR__ . '/auth.php';
