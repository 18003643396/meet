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
        $artone = Article::where('cate_id',null)->where('subject_id',null)->orderBy('zan','desc')->first();
        $articles = Article::where('cate_id',null)->where('subject_id',null)->orderBy('zan','desc')->offset(1)->limit(4)->get();
        
    	return view('home.index',['artone'=>$artone,'articles'=>$articles]);
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
