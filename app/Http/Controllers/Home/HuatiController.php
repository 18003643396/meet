<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Model\Admin\Article;
use App\Model\Admin\Cate;
use DB;
class HuatiController extends Controller
{
    
    //
    public function index()
    {
    	$artone = Article::where('cate_id',null)->where('subject_id',null)->orderBy('zan','desc')->first();
        $articles = Article::where('cate_id',null)->where('subject_id',null)->orderBy('zan','desc')->offset(1)->limit(4)->get();
        $cate = Cate::paginate(8);
    	return view('home.list.huati',['artone'=>$artone,'articles'=>$articles,'cate'=>$cate]);
    }

    public function list($id)
    {
    	$artone = Article::where('cate_id',null)->where('subject_id',null)->orderBy('zan','desc')->first();
        $articles = Article::where('cate_id',null)->where('subject_id',null)->orderBy('zan','desc')->offset(1)->limit(4)->get();
        $cate = Cate::where('id',$id)->first();
    	$artcate = DB::table('user')->join('article','user_id','=','user.id')->where('cate_id',$id)->get();
    	$count = Article::where('cate_id',$id)->count();
    	return view('home.huati.huatilist',['artone'=>$artone,'articles'=>$articles,'artcate'=>$artcate,'cate'=>$cate,'count'=>$count]);
    }

    public function huatireply(ArticleRequest $request)
    {
    	$res = $request->except('_token');
    	$res['user_id'] = session('uid');
    	$res['user_name'] = session('uname');
      	$res['time'] = date('Y-m-d H:i:s',time());

            $data = Article::create($res);
      try{ 
            if($data){
                return back()->with('success','发布成功');
            }

        

        }catch(\Exception $e){

            return back()->with('error','发布失败');
       
        }
    }
}
