<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Subject;
use App\Model\Admin\Article;
use DB;
class SubjectController extends Controller
{
    public function index()
    {
    	$artone = Article::where('cate_id',null)->where('subject_id',null)->orderBy('zan','desc')->first();
        $articles = Article::where('cate_id',null)->where('subject_id',null)->orderBy('zan','desc')->offset(1)->limit(4)->get();
        $subject = Subject::where('status',1)->get();
    	return view('home.list.subject',['artone'=>$artone,'articles'=>$articles,'subject'=>$subject]);
    }

    public function xiangqing($id)
    {

    	$subject = Subject::where('subject.id',$id)->join('article','subject.id','=','article.subject_id')->first();
    	$article_id = $subject['id'];

    	$artone = Article::where('cate_id',null)->where('subject_id',null)->orderBy('zan','desc')->first();
        $articles = Article::where('cate_id',null)->where('subject_id',null)->orderBy('zan','desc')->offset(1)->limit(4)->get();
    	$count = $subject['count'] + 1;
      	$data = Article::where('id',$article_id)->update(['count'=>$count]);
        $res =  DB::table('zan')->where('article_id',$article_id) ->where('user_id',session('uid'))->first();
        $rs =  DB::table('collect')->where('article_id',$article_id) ->where('user_id',session('uid'))->first();
      	if($data){
      		return view('home.subject.xiangqing',['subject'=>$subject,'artone'=>$artone,'articles'=>$articles,'res'=>$res,'rs'=>$rs]); 
      	}
    	
    }
}
