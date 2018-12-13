<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Article;
use DB;
use App\Model\Subject;
class FollowController extends Controller
{
	public function index()
    {
        $artone = Article::where('cate_id',null)->where('subject_id',null)->orderBy('zan','desc')->first();
        $articles = Article::where('cate_id',null)->where('subject_id',null)->orderBy('zan','desc')->offset(1)->limit(4)->get();
        
    	return view('home.list.guanzhu',['artone'=>$artone,'articles'=>$articles]);
    }
    public function guanloadMore(Request $request)
    {
       
        // 获取更多
        
        $ids = DB::table('follow')->where('user_id',session('uid'))->pluck('followuser_id');
        
        $art = DB::table('user')->join('article','user_id','=','user.id')->whereIn('user_id',$ids)->get()->toArray();

        // 返回json字符串
        return json_encode($art);
    }
}
