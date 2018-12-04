<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Article;
use App\Model\Admin\User;
use App\Http\Requests\ConupdateRequest;
use App\Http\Requests\PassRequest;
use Session;
use DB;
use Hash;
class UserController extends Controller
{
    public function index()
    {

          $article = Article::where('user_id',session('uid'))->get();
    	return view('home.user.index',['article'=>$article]);
    }
    public function xiangqing(Request $request)
    {
        
        $id = $request->get('id');
        // dd($id);
        $article = Article::where('user_id',session('uid'))->get();
        $articless = Article::where('id',$id)->first();
         // dd($article);
         // $article = Article::where('user_id',session('uid'))->get();
         return view('home.user.xiangqing',['articless'=>$articless,'article'=>$article]);
        // return view('home.user.xiangqing');
    }
    public function guanzhu()
    {
        $article = Article::where('user_id',session('uid'))->get();
    	return view('home.user.guanzhu',['article'=>$article]);
    }
    public function huati()
    {
        $article = Article::where('user_id',session('uid'))->get();
    	return view('home.user.huati',['article'=>$article]);
    }
    public function zhuanti()
    {
        $article = Article::where('user_id',session('uid'))->get();
        $zhuanti = Article::where('user_id',session('uid'))->where('subject_id','!=',null)->get();
    	return view('home.user.zhuanti',['article'=>$article,'zhuanti'=>$zhuanti]);
    }
    public function dongtai()
    {
        $article = Article::where('user_id',session('uid'))->get();
        $dongtai = Article::where('user_id',session('uid'))->where('cate_id',null)->where('subject_id',null)->get();

    	return view('home.user.dongtai',['article'=>$article,'dongtai'=>$dongtai]);
    }
    public function shijianzhou()
    {
        $article = Article::where('user_id',session('uid'))->get();
    	return view('home.user.shijianzhou',['article'=>$article]);
    }
    public function liuyan()
    {
        $article = Article::where('user_id',session('uid'))->get();
    	return view('home.user.liuyan',['article'=>$article]);
    }
    //搜索页面
    public function search()
    {
    	$article = Article::where('user_id',session('uid'))->get();
        return view('home.user.search',['article'=>$article]);
    }

    //个人信息页面
    public function info()
    {
        $article = Article::where('user_id',session('uid'))->get();
        return view('home.user.info',['article'=>$article]);
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
