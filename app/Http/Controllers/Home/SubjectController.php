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
}
