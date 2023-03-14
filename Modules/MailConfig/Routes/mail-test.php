<?php

use Illuminate\Support\Facades\Route;
use Modules\MailConfig\Http\Controllers\MailTest\MailTestController;

Route::get('/mail-test', [MailTestController::class, 'index'])->name('admin.mail-config.mail-test.index');
Route::post('/mail-test/send', [MailTestController::class, 'send'])->name('admin.mail-config.mail-test.send');
Route::get('/mail-test/template-view', [MailTestController::class, 'templateView'])->name('admin.mail-config.mail-test.template-view');
