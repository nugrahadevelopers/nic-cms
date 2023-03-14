<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('admin.profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('admin.profile.destroy');
