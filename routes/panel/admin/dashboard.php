<?php

use App\Http\Controllers\Panel\Admin\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');
