<?php

use Illuminate\Support\Facades\Route;

/**
 * POST CATEGORIES ROUTES
 */
Route::group(['prefix' => 'categorias', 'as' => 'postcategories.'], function () {
    Route::get('/', 'Postcategory\AdminPostcategoryController@index')->name('index');
    Route::get('/crear', 'Postcategory\AdminPostcategoryController@create')->name('create');
    Route::post('/', 'Postcategory\AdminPostcategoryController@store')->name('store');
    Route::get('/{postcategory}/editar', 'Postcategory\AdminPostcategoryController@edit')->name('edit');
    Route::put('/{postcategory}', 'Postcategory\AdminPostcategoryController@update')->name('update');
    Route::delete('/{postcategory}', 'Postcategory\AdminPostcategoryController@destroy')->name('destroy');
});
