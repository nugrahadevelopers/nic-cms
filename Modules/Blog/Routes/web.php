<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin/blog', 'middleware' => ['auth']], function () {
    require __DIR__ . '/category.php';
    require __DIR__ . '/tag.php';
    require __DIR__ . '/post.php';
    require __DIR__ . '/comment.php';
});

Route::group(['prefix' => 'blog'], function () {
    require __DIR__ . '/blog.php';

    Route::group(['middleware' => ['auth']], function () {
        require __DIR__ . '/comment.php';
    });
});
