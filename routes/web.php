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
	Route::any('/admin/remind',function(){
		return view('admin.remind',['title'=>"后台"]);
	});

	Route::group(['middleware'=>'conper'],function(){
		//后台管理员
		Route::resource('admin/conservator',"Admin\ConservatorController");
		Route::get('/admin/conservatorajax','Admin\ConservatorController@ajaxupdate');
		Route::get('/admin/condeleteajax','Admin\ConservatorController@alldelete');
		Route::get('/admin/kgajax','Admin\ConservatorController@kgajax');
		//管理员添加角色
		Route::get('/admin/conservator_role','Admin\ConservatorController@conservator_role');
		Route::any('/admin/do_conservator_role','Admin\ConservatorController@do_conservator_role');
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
		//角色管理
		Route::resource('/admin/role','Admin\RoleController');
		Route::get('admin/roledeleteajax',"Admin\RoleController@alldelete");
		Route::any('/admin/role_per','Admin\RoleController@role_per');
		Route::any('/admin/do_role_per','Admin\RoleController@do_role_per');

		//权限管理
		Route::resource('/admin/permission','Admin\PerController');
		Route::get('admin/perdeleteajax',"Admin\PerController@alldelete");

	});
	

});

//前台登录

Route::any('/home/dologin','Home\LoginController@dologin');
Route::any('/home/captcha','Home\LoginController@captcha');
//注册
Route::any('/home/zhuce','Home\LoginController@zhuce');
Route::post('/home/dozhuce','Home\LoginController@dozhuce');
Route::any('/home/duanxin','Home\LoginController@duanxin');

Route::group(['middleware'=>'qlogin'],function(){
	//退出
	Route::any('/home/logout','Home\LoginController@logout');
	//个人中心主页
	Route::get('/home/user','Home\UserController@index');
	Route::get('/home/guanzhu','Home\UserController@guanzhu');
	Route::get('/home/huati','Home\UserController@huati');
	Route::get('/home/zhuanti','Home\UserController@zhuanti');
	Route::get('/home/dongtai','Home\UserController@dongtai');
	Route::get('/home/shijianzhou','Home\UserController@shijianzhou');
	Route::get('/home/liuyan','Home\UserController@liuyan');
	Route::get('/home/search','Home\UserController@search');
	Route::get('/home/user/xiangqing','Home\UserController@xiangqing');
	//发文章
	Route::get('/home/tougao','Home\ArticleController@create');
	Route::any('/home/article/store','Home\ArticleController@store');
	
});