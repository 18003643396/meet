<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class IndexController extends Controller
{
    //
    //显示后台页面
    public function index()
    {
    	$res = DB::table('configure')->first();
    	return view ('admin.index',['title'=>'遇见后台','res'=>$res]);
    }
}
