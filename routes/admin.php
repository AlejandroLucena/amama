<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Dashboard\Admin'], function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'admin']], function () {
        Route::get('/', 'AdminController@show')->name('index');
        Route::get('/perfil', 'AdminController@show')->name('show');
        Route::put('/{user}', 'AdminController@update')->name('update');

        Route::get('/settings', 'AdminController@settingsShow')->name('settings.show');

        require __DIR__.'/admin/posts.php';
        require __DIR__.'/admin/postcategories.php';
    });
});
