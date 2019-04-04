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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('/admin')->group(function(){
    Route::get('/home', 'BPagesController@dashboard')->name('Home');
    Route::get('/roles', 'BPagesController@roles')->name('All Roles');
    Route::get('/role/{id}', 'BPagesController@createrole')->name('Update Role');
    Route::get('/add-role', 'BPagesController@createrole')->name('Create Role');
});