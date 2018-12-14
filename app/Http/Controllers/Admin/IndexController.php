<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Admin\Conservator;
use App\Model\Admin\User;
use App\Model\Admin\Article;
use App\Model\Admin\Cate;
use App\Model\Subject;
use App\Model\Admin\Role;
class IndexController extends Controller
{
    //
    //显示后台页面
    public function index()
    {
    	$usercount = User::count();
    	$artcount = Article::count();
    	$subcount = Subject::count();
    	$catecount = Cate::count();
    	return view ('admin.index',['title'=>'遇见后台','usercount'=>$usercount,'artcount'=>$artcount,'subcount'=>$subcount,'catecount'=>$catecount]);
    }
}
