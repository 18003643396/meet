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
    return view('home.index');
});
//后台登录
Route::any('/admin/login','Admin\LoginController@login');
Route::any('/admin/dologin','Admin\LoginController@dologin');
Route::any('/admin/captcha','Admin\LoginController@captcha');
//后台
Route::group(['middleware'=>'login'],function(){
	//后台首页
	Route::get('/admin','Admin\IndexController@index');
	//退出
	Route::any('/admin/logout','Admin\LoginController@logout');
	//修改头像
	Route::any('/admin/img','Admin\LoginController@img');
	Route::any('/admin/upload','Admin\LoginController@upload');
	//修改密码
	Route::any('/admin/pass','Admin\LoginController@pass');
	Route::any('/admin/passchange','Admin\LoginController@passchange');
	//后台管理员
	Route::resource('admin/conservator',"Admin\ConservatorController");
	Route::get('/admin/conservatorajax','Admin\ConservatorController@ajaxupdate');
	Route::get('/admin/condeleteajax','Admin\ConservatorController@alldelete');
	Route::get('/admin/kgajax','Admin\ConservatorController@kgajax');
	//后台用户
	Route::resource('admin/user',"Admin\UserController");
	Route::get('/admin/userajax','Admin\UserController@ajaxupdate');
	Route::get('/admin/userdeleteajax','Admin\UserController@alldelete');

	//友情链接
	Route::resource('admin/friend',"Admin\FriendController");
	Route::get('admin/frienddeleteajax',"Admin\FriendController@alldelete");
	//轮播图
	Route::resource('admin/rotate',"Admin\RotateController");
	Route::get('admin/rotatedeleteajax',"Admin\RotateController@alldelete");

	// 类别
	Route::resource('admin/cate',"Admin\CateController");
	Route::get('admin/catedeleteajax',"Admin\CateController@alldelete");
});

//前台登录

Route::any('/home/dologin','Home\LoginController@dologin');
Route::any('/home/captcha','Home\LoginController@captcha');
//注册
Route::any('/home/zhuce','Home\LoginController@zhuce');
Route::any('/home/dozhuce','Home\LoginController@dozhuce');

Route::group([],function(){
	//退出
	Route::any('/home/logout','Home\LoginController@logout');
	//个人中心主页
	Route::get('/home/user','Home\UserController@index');
});