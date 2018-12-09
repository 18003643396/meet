<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
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
    public function store(ArticleRequest $request)
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
    public function huatistore(ArticleRequest $request)
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
        $artone = Article::where('cate_id',null)->where('subject_id',null)->orderBy('zan','desc')->first();
        $articles = Article::where('cate_id',null)->where('subject_id',null)->orderBy('zan','desc')->offset(1)->limit(4)->get();
    	$article = Article::where('id',$id)->first();
    	$count = $article['count'] + 1;
    	$data = Article::where('id',$id)->update(['count'=>$count]);
    	$res =  DB::table('zan')->where('article_id',$id) ->where('user_id',session('uid'))->first();
    	$rs =  DB::table('collect')->where('article_id',$id) ->where('user_id',session('uid'))->first();
        // $czan = DB::table('commentzan')->get();
        $comments = DB::table('user')->where('article_id',$id)->join('comment','comment.user_id','=','user.id')->latest('time')->get();
        $replys = DB::table('user')->join('reply','reply.user_id','=','user.id')->get();
    	if($data){
    		$article = Article::where('id',$id)->first();
    		return view("home.article.xiangqing",['article'=>$article,'res'=>$res,'rs'=>$rs,'comment'=>$comments,'reply'=>$replys,'artone'=>$artone,'articles'=>$articles]);
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

    //文章评论
    public function comment(Request $request)
    {

        $article_id = $request->article_id;
        // return $article_id;
        $content = $request->oSize;
        $time = date('Y-m-d H:i:s',time());
        $data = DB::table('comment')->insert(
                ['article_id'=>$article_id,'user_id'=>session('uid'),'time'=>$time,'content'=>$content]);
        if($data){
            return 1;
        }else{
            return 2;
        }
    }

    //评论回复
    public function reply(Request $request)
    {

        $comment_id = $request->commentid;
        // return $comment_id;
        $content = $request->oHfVal;
        $time = date('Y-m-d H:i:s',time());
        $data = DB::table('reply')->insert(
                ['comment_id'=>$comment_id,'user_id'=>session('uid'),'time'=>$time,'content'=>$content]);
        if($data){
            return 1;
        }else{
            return 2;
        }
    }
    //评论点赞
    public function commentzan(Request $request)
    {
        $id = $request->commentid;
        $zan = $request->znum;
        $res = DB::table('commentzan')->insert(
                ['comment_id'=>$id,'user_id'=>session('uid')]);
        if($res){
            $data =  DB::table('comment')->where('id',$id)->update(['czan'=>$zan]);
            if($data){
                return 1;
           }else{
                return 2;
           }
        }
        return 2;
    }

    //评论取消点赞
    public function commentqzan(Request $request)
    {
        $comment_id = $request->commentid;
        $zan = $request->znum;
        $aa =  DB::table('commentzan')->where('comment_id',$comment_id)->where('user_id',session('uid'))->first();
        $id = $aa->id;

        $res = DB::table('commentzan')->where('id',$id)->delete();
     
        if($res){
            $data =  DB::table('comment')->where('id',comment_id)->update(['czan'=>$zan]);
                if($data){
                    return 1;
                }else{
                    return 2;
               }
        }else{
            return 2;
        }
       
    }

    //删除回复
    public function rdelete(Request $request)
    {
        $reply_id = $request->reply_id;
       
        $data = DB::table('reply')->where('id',$reply_id)->delete();
        if($data){
            return 1;
        }else{
            return 2;
        }
    }
    //删除评论
    public function cdelete(Request $request)
    {
        $comment_id = $request->comment_id;
        $data = DB::table('comment')->where('id',$comment_id)->delete();

        $res = DB::table('reply')->where('comment_id',$comment_id)->delete();
        if($data){
            return 1;
        }else{
            return 2;
        }
    }
}
