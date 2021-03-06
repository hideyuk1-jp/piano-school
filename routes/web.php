<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Auth\LoginController@showLoginForm');

Auth::routes();

// 生徒以上を許可
Route::group(['middleware' => ['auth', 'can:student-higher']], function () {
    Route::get('/', 'EventController@index')->name('home');

    Route::get('events', 'EventController@index')->name('events.index');
    Route::get('events/{event}', 'EventController@show')->name('events.show');
});

// 講師以上を許可
Route::group(['middleware' => ['auth', 'can:teacher-higher']], function () {
    Route::get('events/{event}/musics', 'EventController@musics')->name('events.musics');

    Route::get('performances/create', 'PerformanceController@create')->name('performances.create');
    Route::post('performances/store', 'PerformanceController@store')->name('performances.store');
});

// 管理者以上か作成者を許可
Route::group(['middleware' => ['auth', 'can:admin-higher-or-owner,performance']], function () {
    Route::get('performances/{performance}/edit', 'PerformanceController@edit')->name('performances.edit');
    Route::put('performances/{performance}', 'PerformanceController@update')->name('performances.update');
    Route::delete('performances/{performance}', 'PerformanceController@destroy')->name('performances.destroy');
});

// 管理者以上のみ許可
Route::group(['middleware' => ['auth', 'can:admin-higher']], function () {
    Route::get('admin', 'Admin\EventController@index')->name('admin.home');

    Route::resource('admin/users', 'Admin\UserController')->names([
        'index' => 'admin.users.index',
        'create' => 'admin.users.create',
        'store' => 'admin.users.store',
        'show' => 'admin.users.show',
        'edit' => 'admin.users.edit',
        'update' => 'admin.users.update',
        'destroy' => 'admin.users.destroy'
    ]);

    Route::resource('admin/events', 'Admin\EventController')->names([
        'index' => 'admin.events.index',
        'create' => 'admin.events.create',
        'store' => 'admin.events.store',
        'show' => 'admin.events.show',
        'edit' => 'admin.events.edit',
        'update' => 'admin.events.update',
        'destroy' => 'admin.events.destroy'
    ]);

    Route::resource('admin/musics', 'Admin\MusicController')->names([
        'index' => 'admin.musics.index',
        'create' => 'admin.musics.create',
        'store' => 'admin.musics.store',
        'show' => 'admin.musics.show',
        'edit' => 'admin.musics.edit',
        'update' => 'admin.musics.update',
        'destroy' => 'admin.musics.destroy'
    ]);

    Route::resource('admin/performances', 'Admin\PerformanceController')->names([
        'index' => 'admin.performances.index',
        'create' => 'admin.performances.create',
        'store' => 'admin.performances.store',
        'show' => 'admin.performances.show',
        'edit' => 'admin.performances.edit',
        'update' => 'admin.performances.update',
        'destroy' => 'admin.performances.destroy'
    ]);
});