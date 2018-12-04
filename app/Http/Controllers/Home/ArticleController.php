<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Article;
use App\Model\Admin\Cate;
use App\Model\Subject;
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

            return back()->with('error','发布失败');
       
        }
    }
    //图片预览
     public function upload(Request $request)
    {

     
        //判断文件是否有效
        if($request->hasFile('images')){

            $entension = $request->file('images')->getClientOriginalExtension();//上传文件的后缀名

            $newName = date('YmdHis').mt_rand(1000,9999).'.'.$entension;
             $a = $request->file('images')->move('./uploads/articleimages',$newName);
			// return $a;
            $filepath = '/uploads/articleimages/'.$newName;
            //返回文件的路径
            //
            return  $filepath;
        }
    }
    //保存专题页面
    public function zhuanti(Request $request)
    {
    	$res = $request->except('_token','images');
    	
    	$res['user_id'] = session('uid');
    	$res['user_name'] = session('uname');
      	$res['time'] = date('Y-m-d H:i:s',time());

      	$rs = $request->except('_token','images');
      	$rs['user_id'] = session('uid');
      	if($request->hasFile('images')){
            //自定义名字
            $name = rand(111,999).time();
            //获取后缀
            $suffix = $request->file('images')->getClientOriginalExtension();

            $request->file('images')->move('./uploads/articleimages',$name.'.'.$suffix);

            $rs['images'] = '/uploads/articleimages/'.$name.'.'.$suffix;

        }
            // dd($rs);
            $res['subject_id'] = Subject::create($rs)->value('id');
            $data = Article::create($res);
      try{ 
            if($data){
                return redirect('/')->with('success','已提交，等待管理员审核');
            }

        

        }catch(\Exception $e){

            return back()->with('error','提交失败');
       
        }
    }
    //发布话题
    public function huatistore(Request $request)
    {
    	

    	$res = $request->except('_token');
            $data = Cate::create($res);
      try{ 
            if($data){
                return redirect('/')->with('success','话题发布成功');
            }

        

        }catch(\Exception $e){

            return back()->with('error','话题发布失败');
       
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
