<?php

use App\Http\Controllers\Panel\Admin\Role\RoleController;
use App\Http\Controllers\Panel\Admin\Role\RoleDatatableController;
use App\Http\Controllers\Panel\Admin\Role\RoleSelect2Controller;
use Illuminate\Support\Facades\Route;

Route::get('/roles', [RoleController::class, 'index'])->name('admin.roles.index');
Route::get('/roles/create', [RoleController::class, 'create'])->name('admin.roles.create');
Route::post('/roles/create', [RoleController::class, 'store']);
Route::get('/roles/edit/{role}', [RoleController::class, 'edit'])->name('admin.roles.edit');
Route::put('/roles/edit/{role}', [RoleController::class, 'update']);
Route::delete('/roles/delete/{role}', [RoleController::class, 'destroy'])->name('admin.roles.delete');

// Datatable
Route::get('/roles/table', [RoleDatatableController::class, 'table'])->name('admin.roles.table');

// Select2
Route::post('/roles/select', [RoleSelect2Controller::class, 'select'])->name('admin.roles.select');
