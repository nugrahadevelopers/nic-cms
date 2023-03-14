<?php

use Illuminate\Support\Facades\Route;
use Modules\MailConfig\Http\Controllers\SmtpSetting\SmtpSettingController;

Route::get('/smtp-settings', [SmtpSettingController::class, 'index'])->name('admin.mail-config.smtp-settings.index');
Route::put('/smtp-settings/update', [SmtpSettingController::class, 'update'])->name('admin.mail-config.smtp-settings.update');
