<?php

use Illuminate\Support\Facades\Route;
use Modules\Blog\Http\Controllers\Comment\CommentController;
use Modules\Blog\Http\Controllers\Like\LikeController;

Route::post('/like/post/{post}/like', [LikeController::class, 'like'])->name('front.blog.like.post.like');
Route::delete('/like/post/{post}/unlike', [LikeController::class, 'unlike'])->name('front.blog.like.post.unlike');
Route::get('/like/post/{post}/likes', [LikeController::class, 'count'])->name('front.blog.like.post.likes');
