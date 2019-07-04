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

// 講師以上のみ許可
Route::group(['middleware' => ['auth', 'can:teacher-higher']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
});

// 管理者以上のみ許可
Route::group(['middleware' => ['auth', 'can:admin-higher']], function () {
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