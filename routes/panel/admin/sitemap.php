<?php

use App\Http\Controllers\Panel\Admin\Sitemap\GenerateSitemapController;
use Illuminate\Support\Facades\Route;

Route::get('/sitemap', [GenerateSitemapController::class, 'index'])->name('admin.sitemap.index');
Route::post('/sitemap/generate', [GenerateSitemapController::class, 'generate'])->name('admin.sitemap.generate');
