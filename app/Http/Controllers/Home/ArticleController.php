<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Article;
use DB;
class ArticleController extends Controller
{
	//发文章页面
    public function create()
    {
        return view('home.article.tougao');
    }
    //保存文章页面
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
    //保存专题页面
    public function zhuanti(Request $request)
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




    //查看文章页面
    public function xiangqing(Request $request)
    {
    	$id = $request->get('id');

    	$article = Article::where('id',$id)->first();
    	$count = $article['count'] + 1;
    	$data = Article::where('id',$id)->update(['count'=>$count]);
    	$res =  DB::table('zan')->where('article_id',$id) ->where('user_id',session('uid'))->first();
    	$rs =  DB::table('collect')->where('article_id',$id) ->where('user_id',session('uid'))->first();
    	if($data){
    		$article = Article::where('id',$id)->first();
    		return view("home.article.xiangqing",['article'=>$article,'res'=>$res,'rs'=>$rs]);
    	}
    	
    }
    //文章点赞
    public function zan(Request $request)
    {
    	$article_id = $request->article_id;
    	$data =  DB::table('zan')->where('article_id',$article_id)->where('user_id',session('uid'))->first();
    	$zan = Article::where('id',$article_id)->value('zan');
    	if($data){
    		
    		 $id = $data->id;
    		 $res = DB::table('zan')->where('id',$id)->delete();
    		
    		if($res){
    			$zan -= 1;
    			Article::where('id',$article_id)->update(['zan'=>$zan]);
    			 echo 1;
    		}else{
    			echo 4;
    		}
    		
    	}else{
    		$rs = DB::table('zan')->insert(
    			['article_id'=>$article_id,'user_id'=>session('uid')]);
    		
    		$zan += 1; 
    		Article::where('id',$article_id)->update(['zan'=>$zan]);
    		if($rs){
    			echo 2;
    		}else{
    			echo 3;
    		}
    	}
    }
    //文章收藏
    public function collect(Request $request)
    {
    	$article_id = $request->article_id;
    	$data =  DB::table('collect')->where('article_id',$article_id)->where('user_id',session('uid'))->first();
    	if($data){
    		
    		 $id = $data->id;
    		 $res = DB::table('collect')->where('id',$id)->delete();
    		
    		if($res){
    			 echo 1;
    		}else{
    			echo 4;
    		}
    		
    	}else{
    		$rs = DB::table('collect')->insert(
    			['article_id'=>$article_id,'user_id'=>session('uid')]);
    		if($rs){
    			echo 2;
    		}else{
    			echo 3;
    		}
    	}
    }
}
