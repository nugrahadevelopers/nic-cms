<?php

use Illuminate\Support\Facades\Route;
use Modules\Blog\Http\Controllers\Post\PostController;
use Modules\Blog\Http\Controllers\Post\PostDatatableController;
use Modules\Blog\Http\Controllers\Post\PostOpenAIController;
use Modules\Blog\Http\Controllers\Post\PostSelect2Controller;

Route::get('/posts', [PostController::class, 'index'])->name('admin.blog.posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('admin.blog.posts.create');
Route::post('/posts/create', [PostController::class, 'store']);
Route::post('/posts/upload-content-img', [PostController::class, 'uploadContentImage'])->name('admin.blog.posts.upload-content-img');
Route::get('/posts/edit/{post}', [PostController::class, 'edit'])->name('admin.blog.posts.edit');
Route::put('/posts/edit/{post}', [PostController::class, 'update']);
Route::delete('/posts/delete/{post}', [PostController::class, 'destroy'])->name('admin.blog.posts.delete');

Route::get('/posts/generate-content-with-open-ai', [PostOpenAIController::class, 'generate']);

// Datatable
Route::get('/posts/table', [PostDatatableController::class, 'table'])->name('admin.blog.posts.table');

// Select 2
Route::get('/posts/{post}/get-selected-categories', [PostSelect2Controller::class, 'getPostCategory'])->name('admin.blog.posts.get-selected-categories');
Route::get('/posts/{post}/get-selected-tags', [PostSelect2Controller::class, 'getPostTag'])->name('admin.blog.posts.get-selected-tags');
// Route::get('/categories/{category}/get-selected-parent', [CategorySelect2Controller::class, 'getSelectedParent'])->name('admin.blog.categories.get-selected-parent');
