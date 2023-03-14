<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin/mail-config', 'middleware' => ['auth']], function () {
    require __DIR__ . '/smtp-setting.php';
    require __DIR__ . '/mail-test.php';
});
