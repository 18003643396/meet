<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Article;
class ArticleController extends Controller
{
    public function create()
    {
        return view('home.tougao');
    }
    public function store(Request $request)
    {

    	$res = $request->except('_token');
    	$res['user_id'] = session('uid');
    	$res['user_name'] = session('uname');
      	$res['time'] = date('Y-m-d H:i:s',time());
            $data = Article::create($res);
      try{ 
            if($data){
                return redirect('/')->with('success','发布成功');
            }

        

        }catch(\Exception $e){

            return back()->with('error','添加失败');
       
        }
    }
}
