<?php

use App\Http\Controllers\Panel\Admin\User\UserController;
use App\Http\Controllers\Panel\Admin\User\UserDatatableController;
use App\Http\Controllers\Panel\Admin\User\UserSelect2Controller;
use Illuminate\Support\Facades\Route;

Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('admin.users.create');
Route::post('/users/create', [UserController::class, 'store']);
Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('admin.users.edit');
Route::put('/users/edit/{user}', [UserController::class, 'update']);
Route::delete('/users/delete/{user}', [UserController::class, 'destroy'])->name('admin.users.delete');

// Datatable
Route::get('/users/table', [UserDatatableController::class, 'table'])->name('admin.users.table');

// Select2
Route::get('/users/{user}/get-selected-role', [UserSelect2Controller::class, 'getSelectedRole'])->name('admin.users.get-selected-role');
