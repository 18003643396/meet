<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
    //显示后台页面
    public function index()
    {
    	return view ('admin.index',['title'=>'遇见后台']);
    }
}
