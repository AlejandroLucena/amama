<?php

use Illuminate\Support\Facades\Route;

/**
 * POSTS ROUTES
 */
Route::group(['prefix' => 'posts', 'as' => 'posts.'], function () {
    Route::get('/', 'Post\AdminPostController@index')->name('index');
    Route::get('/crear', 'Post\AdminPostController@create')->name('create');
    Route::get('/{postId}/editar', 'Post\AdminPostController@edit')->name('edit');
    Route::post('/', 'Post\AdminPostController@store')->name('store');
    Route::put('/{postId}', 'Post\AdminPostController@update')->name('update');
    Route::delete('/{postId}', 'Post\AdminPostController@destroy')->name('destroy');
});
