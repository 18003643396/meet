<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Article;
use DB;
use App\Model\Subject;
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
        $art = DB::table('user')->join('article','user_id','=','user.id')->whereNull('subject_id')->get()->toArray();

        // 返回json字符串
        return json_encode($art);
    }

    public function search(Request $request)
    {
        $artone = Article::where('cate_id',null)->where('subject_id',null)->orderBy('zan','desc')->first();
        $articles = Article::where('cate_id',null)->where('subject_id',null)->orderBy('zan','desc')->offset(1)->limit(4)->get();
        $keywords = $request -> get('keywords');
        $ainfo = DB::table('user')->join('article','user_id','=','user.id')->where('title','like','%'.$keywords.'%')->get();
        return view('home.list.search',['artone'=>$artone,'articles'=>$articles,'ainfo'=>$ainfo]);
    }
    
}
