<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('frontend.index');
// });

Route::namespace('Frontend')->name('frontend.')->group(function () {
    Route::get('/', 'MainController@index')->name('index');
    
    Route::prefix('/penginapan')->name('penginapan.')->group(function() {
        Route::get('/', 'PenginapanController@index')->name('index');
        Route::get('/{slug}', 'PenginapanController@show')->name('show');
    });

    Route::prefix('/kebudayaan')->name('kebudayaan.')->group(function() {
        Route::get('/', 'KebudayaanController@index')->name('index');
        Route::get('/{slug}', 'KebudayaanController@show')->name('show');
    });

    Route::prefix('/kesehatan')->name('kesehatan.')->group(function() {
        Route::get('/', 'KesehatanController@index')->name('index');
        Route::get('/{slug}', 'KesehatanController@show')->name('show');
    });
    
    Route::post('/ulasan', 'MainController@ulasan')->name('ulasan');
});

// Route::get('/', 'Main\DashboardController@index')->name('main')->middleware('auth');

Route::prefix('/pendaftaran')->namespace('Main')->name('pendaftaran.')->group(function(){
    Route::get('/', 'RegisterController@index')->name('index');
    Route::post('/proses', 'RegisterController@register')->name('proses');
});


Route::prefix('/admin')->namespace('Main')->middleware('auth')->group(function(){

    Route::prefix('/dashboard')->name('dashboard.')->group(function(){
        Route::get('/', 'DashboardController@index')->name('index');
    });

    Route::prefix('/pura')->name('pura.')->group(function(){
        Route::get('/', 'PuraController@index')->name('index');
        Route::get('/create', 'PuraController@create')->name('create');
        Route::get('/render', 'PuraController@render')->name('render');
        Route::get('/edit/{id}', 'PuraController@edit')->name('edit');

        Route::post('/store', 'PuraController@store')->name('store');
        Route::post('/update', 'PuraController@update')->name('update');
        Route::get('/delete/{id}', 'PuraController@delete')->name('delete');
    });

    Route::prefix('/kebudayaan')->name('kebudayaan.')->group(function(){
        Route::get('/', 'KebudayaanController@index')->name('index');
        Route::get('/create', 'KebudayaanController@create')->name('create');
        Route::get('/render', 'KebudayaanController@render')->name('render');
        Route::get('/edit/{id}', 'KebudayaanController@edit')->name('edit');
    });

    Route::prefix('/penginapan')->name('penginapan.')->group(function(){
        Route::get('/', 'PenginapanController@index')->name('index');
        Route::get('/create', 'PenginapanController@create')->name('create');
        Route::get('/render', 'PenginapanController@render')->name('render');
        Route::get('/edit/{id}', 'PenginapanController@edit')->name('edit');
    });

    Route::prefix('/kesehatan')->name('kesehatan.')->group(function(){
        Route::get('/', 'KesehatanController@index')->name('index');
        Route::get('/create', 'KesehatanController@create')->name('create');
        Route::get('/render', 'KesehatanController@render')->name('render');
        Route::get('/edit/{id}', 'KesehatanController@edit')->name('edit');
    });

    Route::prefix('/main')->name('main.')->group(function(){
        Route::post('/store', 'MainController@store')->name('store');
        Route::post('/update', 'MainController@update')->name('update');
        Route::get('/delete/{id}', 'MainController@delete')->name('delete');

        // upload image
        Route::get('/detail/{id}', 'MainController@detail')->name('detail');
        Route::post('/upload', 'MainController@upload')->name('upload');
        Route::get('/delete-image/{id_lokasi}/{id_foto}', 'MainController@deleteImage')->name('delete-image');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

