<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Article;
use DB;
class HomeController extends Controller
{
    public function index()
    {
        
    	return view('home.index');
    }
    public function loadMore(Request $request)
    {
        // $offset = $request->offset;
        // 获取更多
        $art = DB::table('user')->join('article','user_id','=','user.id')->get()->toArray();

        // 返回json字符串
        return json_encode($art);
    }
}
