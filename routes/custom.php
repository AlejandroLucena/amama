<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers\Frontend'], function () {
    Route::get('blog', 'Blog\BlogController@index')->name('blog.index');
    Route::get('blog/{slug}', 'Blog\BlogController@showContent')->name('blog.article')->where('slug', '^[a-zA-Z0-9-_\/]+$');

    // Route::get('/phpinfo', 'HomeController@phpinfo')->name('phpinfo');
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('quienes-somos', 'HomeController@aboutus')->name('aboutus');
    Route::get('politica-de-privacidad', 'HomeController@privacy')->name('privacy');
    Route::get('politica-de-cookies', 'HomeController@cookies')->name('cookies');
    Route::get('aviso-legal', 'HomeController@legal')->name('legal');
    Route::get('contacto', 'ContactUsFormController@contact')->name('contact');
    Route::post('contact', 'ContactUsFormController@ContactUsForm')->name('contact.store');
    Route::get('registro-profesor', 'HomeController@teacherRegisterForm')->name('teacher-register-form');
    Route::get('registro-alumno', 'HomeController@clientRegisterForm')->name('client-register-form');
});
