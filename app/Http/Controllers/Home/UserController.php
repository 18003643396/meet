<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Article;
use App\Model\Admin\User;
use App\Model\Admin\Follow;
use App\Http\Requests\ConupdateRequest;
use App\Http\Requests\PassRequest;
use Session;
use DB;
use Hash;
class UserController extends Controller
{
    public function index(Request $request)
    {
            $id = $request->get('id');
          $article = Article::where('user_id',$id)->get();
    	return view('home.user.index',['article'=>$article,'id'=>$id]);
    }
    //文章详情
    public function xiangqing(Request $request)
    {
        
        $id = $request->get('id');
        $uid = $request->get('uid');
        // dd($id);
        $article = Article::where('user_id',$uid)->get();
        $articless = Article::where('id',$id)->first();
       $comments = DB::table('user')->where('article_id',$id)->join('comment','comment.user_id','=','user.id')->latest('time')->get();
       $replys = DB::table('user')->join('reply','reply.user_id','=','user.id')->get();
         // dd($article);
         // $article = Article::where('user_id',session('uid'))->get();
         return view('home.user.xiangqing',['articless'=>$articless,'article'=>$article,'id'=>$uid,'comment'=>$comments,'reply'=>$replys]);
        // return view('home.user.xiangqing');
    }
    //关注页面
    public function guanzhu(Request $request)
    {
        $id = $request->get('id');
        $ginfo = DB::table('follow')->where('user_id',$id)->join('user','user.id','=','follow.followuser_id')->get();
        // dd($ginfo);
        $article = Article::where('user_id',$id)->get();
    	return view('home.user.guanzhu',['article'=>$article,'id'=>$id,'ginfo'=>$ginfo]);
    }
    //加关注
    public function jiaguanzhu(Request $request)
    {
        $fid = $request->get('id');
        $uid = session('uid');
        $res = DB::table('follow')->where('user_id',$uid)->where('followuser_id',$fid)->first();
        if($res){
            $id = $res->id;
            $rs = DB::table('follow')->where('id',$id)->delete();
            if($rs){
                return 3;
            }else{
                return 4;
            }
        }else{
            $data = DB::table('follow')->insert(['user_id'=>$uid,'followuser_id'=>$fid]);
            if($data){
                return 1;
            }else{
                return 2;
            }
        }
        
    }
    public function huati(Request $request)
    {
        $id = $request->get('id');
        $article = Article::where('user_id',$id)->get();
    	return view('home.user.huati',['article'=>$article,'id'=>$id]);
    }
    public function zhuanti(Request $request)
    {
        $id = $request->get('id');
        $article = Article::where('user_id',$id)->get();
        $zhuanti = Article::where('user_id',$id)->where('subject_id','!=',null)->get();
    	return view('home.user.zhuanti',['article'=>$article,'zhuanti'=>$zhuanti,'id'=>$id]);
    }
    public function dongtai(Request $request)
    {
        $id = $request->get('id');
        $article = Article::where('user_id',$id)->get();
        $dongtai = Article::where('user_id',$id)->where('cate_id',null)->where('subject_id',null)->get();

    	return view('home.user.dongtai',['article'=>$article,'dongtai'=>$dongtai,'id'=>$id]);
    }
    public function shijianzhou(Request $request)
    {
        $id = $request->get('id');
        $article = Article::where('user_id',$id)->get();
    	return view('home.user.shijianzhou',['article'=>$article,'id'=>$id]);
    }
    public function liuyan(Request $request)
    {
        $id = $request->get('id');
        $article = Article::where('user_id',$id)->get();
    	return view('home.user.liuyan',['article'=>$article,'id'=>$id]);
    }
    //搜索页面
    public function search(Request $request)
    {
        $id = $request->get('id');
    	$article = Article::where('user_id',$id)->get();
        return view('home.user.search',['article'=>$article,'id'=>$id]);
    }

    //个人信息页面
    public function info()
    {

        $article = Article::where('user_id',session('uid'))->get();
        return view('home.user.info',['article'=>$article,'id'=>session('uid')]);
    }
    //修改个人信息
    public function infoupdate(ConupdateRequest $request)
    {
        $res =$request->except('_token','_method');
            try{

                $data = User::where('id',$res['id'])->update($res);
                if($data){
                    return back()->with('success','修改成功');
                }else{
                     return back()->with('success','修改成功');
                }

            }catch(\Exception $e){

                return back()->with('error','修改失败');
            }
        
    }
     //图片预览
     public function upload(Request $request)
    {
        //判断文件是否有效
        if($request->hasFile('img')){

            $entension = $request->file('img')->getClientOriginalExtension();//上传文件的后缀名

            $newName = date('YmdHis').mt_rand(1000,9999).'.'.$entension;
             $a = $request->file('img')->move('./uploads/user',$newName);
            $filepath = '/uploads/user/'.$newName;
            //返回文件的路径
            //
            return  $filepath;
        }
    }   
    //修改头像
    public function touxiangupdate(Request $request)
    {
        //获取上传的文件对象
        $file = $request->file('img');
        if(!$file == ''){
            if($file->isValid()){
                //上传文件的后缀名
                $entension = $file->getClientOriginalExtension();
                //修改名字
                $newName = date('YmdHis').mt_rand(1000,9999).'.'.$entension;
                //移动文件
                $path = $file->move('./uploads/user',$newName);

                $filepath = '/uploads/user/'.$newName;

                $res['img'] = $filepath;
                User::where('id',session('uid'))->update($res);
                //返回文件的路径
                // return  $filepath;
                return back()->with('success','修改成功');
            }
        }else{
            return back();
        }
    }

    /**
     *  修改密码
     *
     *  @return \Illuminate\Http\Response
     */
    public function mimaupdate(PassRequest $request)
    {
        $rs = User::where('id',session('uid'))->first();
        
        if (!Hash::check($request->oldpass, $rs->password)) {
           
            return back()->with('error','旧密码输入错误');
        }
        else{
            if($request->newpass == $request->oldpass){
                 return back()->with('error','旧密码密码不能和新密码一致');
            }
            $password = Hash::make($request->newpass);
            User::where('id',session('uid'))->update(['password'=>$password]);
             return back()->with('success','修改成功');
        }
    }
    public function backgroundupdate(Request $request)
    {
        //获取上传的文件对象
        $file = $request->file('background');
        if(!$file == ''){
            if($file->isValid()){
                //上传文件的后缀名
                $entension = $file->getClientOriginalExtension();
                //修改名字
                $newName = date('YmdHis').mt_rand(1000,9999).'.'.$entension;
                //移动文件
                $path = $file->move('./uploads/background',$newName);

                $filepath = '/uploads/background/'.$newName;

                $res['background'] = $filepath;
                User::where('id',session('uid'))->update($res);
                //返回文件的路径
                // return  $filepath;
                return back()->with('success','修改成功');
            }
        }else{
            return back()->with('error','修改失败');
        }
    }
}
