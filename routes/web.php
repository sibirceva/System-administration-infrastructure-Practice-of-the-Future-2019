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

Route::get('crash/close/{id}', 'CrashController@close'); //закрытие поломки

Route::get('crash/delete/{id}', 'CrashController@delete'); //удаление поломки

Route::get('crash/view/{id}', 'CrashController@view'); //просмотреть конкретную поломку

Route::get('crash/view', 'CrashController@view_all'); //просмотреть все поломки

Route::post('thing/crash_add/{id_thing}', 'CrashController@add'); //добавление поломки в бд, отправка почтового уведомления

Route::get('thing/add', 'ThingController@add'); //форма новой вещи

Route::post('thing/new', 'ThingController@add1'); //добавление новой вещи в бд

Route::get('thing/print_poster/{id}', 'ThingController@print_poster'); //генерация плаката в пдф

Route::get('thing/view', 'ThingController@view_all'); //просмотреть все вещи

Route::get('thing/edit/{id}', 'ThingController@edit'); //

Route::get('thing/delete/{id}', 'ThingController@delete');

Route::get('type/add', 'TypeController@add');

Route::post('type/new', 'TypeController@add1');

Route::get('type/view', 'TypeController@view_all');

Route::get('type/edit/{id}', 'TypeController@edit');

Route::get('type/delete/{id}', 'TypeController@delete');

Route::get('user/edit/{id}', 'UserController@edit');

Route::post('user/editmail/{id}', 'UserController@editmail');

Route::get('user/delete/{id}', 'UserController@delete');

Route::get('user/view/{id}', 'UserController@view');

Route::get('user/view', 'UserController@view_all');

Route::get('form/{id}', 'ThingController@form');