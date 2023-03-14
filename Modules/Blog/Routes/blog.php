<?php

use Illuminate\Support\Facades\Route;
use Modules\Blog\Http\Controllers\Blog\BlogController;

Route::get('/', [BlogController::class, 'index'])->name('front.blog.index');
Route::get('/article/{post}', [BlogController::class, 'show'])->name('front.blog.article');
