<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Article;
use App\Model\Subject;
use DB;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(empty($request -> get('keywords'))){
          $res = Article::where('subject_id',null)->paginate(10);

        }else{
              
            $title = $request -> get('keywords');
            $res = Article::where('subject_id',null)->where('title','like','%'.$title.'%')->paginate(10);
            

        }
        return view('admin.article.index',[
                'title'=>'文章列表',
                'res'=>$res  
           ]);
    }

     public function subindex(Request $request)
    {
        if(empty($request -> get('keywords'))){
          $res = Article::where('subject_id','!=',null)->join('subject','article.subject_id','=','subject.id')->paginate(10);

        }else{     
            $title = $request -> get('keywords');
            $res = Article::where('subject_id','!=',null)->where('title','like','%'.$title.'%')->join('subject','subject_id','=','subject.id')->paginate(10);
            

        }
        return view('admin.article.subindex',[
                'title'=>'专题列表',
                'res'=>$res  
           ]);
    }

    public function look($id)
    {
    	$res = Article::where('id',$id)->first();
    	return view ('admin.article.xiangqing',['res'=>$res,'title'=>'文章详情']);
    }

    public function destroy($id)
    {
       try{

            $res = Article::destroy($id);
            
            if($res){
            	$rs = DB::table('comment')->where('article_id',$id)->delete();
            	if($rs){
            		return redirect('/admin/article')->with('success','删除成功');
            	}
                else{
                	return back()->with('success','删除成功');
                }
            }

        }catch(\Exception $e){

            return back()->with('error','删除失败');
        }
    }

    public function shenhe($id)
    {

    	$res = Article::where('subject_id',$id)->join('subject','article.subject_id','=','subject.id')->first();
    	return view ('admin.article.subxiangqing',['res'=>$res,'title'=>'文章审核']);
    }

    public function tongguo($id)
    {
    	// dd($id);
    	$res = Subject::where('id',$id)->update(['status'=>1]);
    	if($res){
    		return redirect('/admin/subject')->with('succsess','审核完成');
    	}else{
    		return back()->with('error','审核失败');
    	}
    }

    public function butongguo($id)
    {
    	$res = Subject::where('id',$id)->update(['status'=>2]);
    	if($res){
    		return redirect('/admin/subject')->with('succsess','审核完成');
    	}else{
    		return back()->with('error','审核失败');
    	}
    }

    public function delete($id)
    {
    	try{

    		// dd($id);
            $res = Subject::destroy($id);
            $rs = Article::where('subject_id',$id)->delete();
            if($res && $rs){
            	
            		return redirect('/admin/subject')->with('success','删除成功');
            	}else{
            		 return back()->with('error','删除失败');
            	}
                
            }

        catch(\Exception $e){

            return back()->with('error','删除失败');
        }
    }

}
