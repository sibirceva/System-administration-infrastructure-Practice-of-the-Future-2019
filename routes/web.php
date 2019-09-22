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

//Route::get('hello','HelloController');

Route::get('crash/close/{id}', 'CrashController@close')->middleware('auth'); //закрытие поломки

Route::get('crash/delete/{id}', 'CrashController@delete')->middleware('auth'); //удаление поломки

Route::get('crash/view/{id}', 'CrashController@view')->middleware('auth'); //просмотреть конкретную поломку

Route::get('crash/view', 'CrashController@view_all')->middleware('auth'); //просмотреть все поломки

Route::post('thing/crash_add/{id_thing}', 'CrashController@add'); //добавление поломки в бд, отправка почтового уведомления

Route::get('thing/add', 'ThingController@add')->middleware('auth'); //форма новой вещи

Route::post('thing/new', 'ThingController@add1')->middleware('auth'); //добавление новой вещи в бд

Route::get('thing/print_poster/{id}', 'ThingController@print_poster')->middleware('auth'); //генерация плаката в пдф

Route::get('thing/view', 'ThingController@view_all')->middleware('auth'); //просмотреть все вещи

Route::get('thing/edit/{id}', 'ThingController@edit')->middleware('auth'); //

Route::get('thing/delete/{id}', 'ThingController@delete')->middleware('auth');

Route::get('type/add', 'TypeController@add')->middleware('auth');

Route::post('type/new', 'TypeController@add1')->middleware('auth');

Route::get('type/view', 'TypeController@view_all')->middleware('auth');

Route::get('type/edit/{id}', 'TypeController@edit')->middleware('auth');

Route::get('type/delete/{id}', 'TypeController@delete')->middleware('auth');

//Route::get('user/edit/{id}', 'UserController@edit')->middleware('auth');

Route::post('user/editmail/{id}', 'UserController@editmail')->middleware('auth');

Route::get('user/delete/{id}', 'UserController@delete')->middleware('auth');

Route::get('user/view/{id}', 'UserController@view')->middleware('auth');

Route::get('user/view', 'UserController@view_all')->middleware('auth');

Route::get('form/{id}', 'ThingController@form');
Auth::routes();

Route::get('/home', 'HomeController@index');
