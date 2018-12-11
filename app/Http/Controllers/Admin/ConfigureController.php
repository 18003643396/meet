<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ConfigureRequest;

use DB;
class ConfigureController extends Controller
{
    //
    //显示后台页面
    public function index()
    {
    	$res = DB::table('configure')->first();
    	return view ('admin.configure.index',['title'=>'系统设置','res'=>$res]);
    }

    public function edit(ConfigureRequest $request)
    {
    	$res = $request->except('_token');
    	$data = DB::table('configure')->update($res);
    	if($data){
    		return redirect('admin/configure')->with('success','修改成功');
    	}else{
    		return redirect('admin/configure')->with('success','修改成功');
    	}

    }
}
