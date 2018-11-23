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
Route::group([],function(){
	//后台首页
	Route::get('/admin','Admin\IndexController@index');
	//后台管理员
	Route::resource('admin/conservator',"Admin\ConservatorController");
	Route::get('/admin/conservatorajax','Admin\ConservatorController@ajaxupdate');
	Route::get('/admin/condeleteajax','Admin\ConservatorController@alldelete');
	//后台用户
	Route::resource('admin/user',"Admin\UserController");
	Route::get('/admin/userajax','Admin\UserController@ajaxupdate');
	Route::get('/admin/userdeleteajax','Admin\UserController@alldelete');
});