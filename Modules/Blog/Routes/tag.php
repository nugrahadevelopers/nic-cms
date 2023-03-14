<?php

use Illuminate\Support\Facades\Route;
use Modules\Blog\Http\Controllers\Tag\TagController;
use Modules\Blog\Http\Controllers\Tag\TagDatatableController;
use Modules\Blog\Http\Controllers\Tag\TagSelect2Controller;

Route::get('/tags', [TagController::class, 'index'])->name('admin.blog.tags.index');
Route::get('/tags/create', [TagController::class, 'create'])->name('admin.blog.tags.create');
Route::post('/tags/create', [TagController::class, 'store']);
Route::get('/tags/edit/{tag}', [TagController::class, 'edit'])->name('admin.blog.tags.edit');
Route::put('/tags/edit/{tag}', [TagController::class, 'update']);
Route::delete('/tags/delete/{tag}', [TagController::class, 'destroy'])->name('admin.blog.tags.delete');

// Datatable
Route::get('/tags/table', [TagDatatableController::class, 'table'])->name('admin.blog.tags.table');

// Select 2
Route::post('/tags/select', [TagSelect2Controller::class, 'select'])->name('admin.blog.tags.select');
// Route::get('/categories/{category}/get-selected-parent', [CategorySelect2Controller::class, 'getSelectedParent'])->name('admin.blog.categories.get-selected-parent');
