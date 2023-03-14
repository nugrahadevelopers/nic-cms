<?php

use Illuminate\Support\Facades\Route;
use Modules\Blog\Http\Controllers\Comment\CommentController;

// Route::get('/posts', [PostController::class, 'index'])->name('admin.blog.posts.index');
Route::get('/comment/post/{post}/create', [CommentController::class, 'create'])->name('admin.blog.comment.posts.create');
Route::post('/comment/post/{post}/create', [CommentController::class, 'store']);
