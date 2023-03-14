<?php

use Illuminate\Support\Facades\Route;
use Modules\Blog\Http\Controllers\Category\CategoryController;
use Modules\Blog\Http\Controllers\Category\CategoryDatatableController;
use Modules\Blog\Http\Controllers\Category\CategorySelect2Controller;

Route::get('/categories', [CategoryController::class, 'index'])->name('admin.blog.categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.blog.categories.create');
Route::post('/categories/create', [CategoryController::class, 'store']);
Route::get('/categories/edit/{category}', [CategoryController::class, 'edit'])->name('admin.blog.categories.edit');
Route::put('/categories/edit/{category}', [CategoryController::class, 'update']);
Route::delete('/categories/delete/{category}', [CategoryController::class, 'destroy'])->name('admin.blog.categories.delete');

// Datatable
Route::get('/categories/table', [CategoryDatatableController::class, 'table'])->name('admin.blog.categories.table');

// Select 2
Route::post('/categories/select', [CategorySelect2Controller::class, 'select'])->name('admin.blog.categories.select');
Route::get('/categories/{category}/get-selected-parent', [CategorySelect2Controller::class, 'getSelectedParent'])->name('admin.blog.categories.get-selected-parent');
