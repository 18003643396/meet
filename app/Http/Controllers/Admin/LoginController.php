<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use App\Http\Requests\PassRequest;
use Session;
use DB;
use Hash;

class LoginController extends Controller
{
     public function login()
    {
    	return view('admin.login.login',['title'=>'后台的登录页面']);
    }

     public function dologin(Request $request)
    {
    	//表单验证
    	//判断验证码
		$code = session('code');

		if($code != $request->code){
		    return back()->with('error','验证码错误');
		}
    	//判断用户名
    	$rs = DB::table('conservator')->where('name',$request->name)->first();


    	if(!$rs){

    		return back()->with('error','用户名或者密码错误');
    	}
    	if($rs->status == 0){
    		return back()->with('error','该账号被禁止登陆');
    	}

    	//判断密码
    	//hash
    	if (!Hash::check($request->password, $rs->password)) {
		    
		    return back()->with('error','用户名或者密码错误');
		}

		/*//加密解密
		if($request->password != decrypt($rs->password)){

		    return back()->with('error','用户名或者密码错误');
			
		}*/

		

		//存点信息  session
		session(['cid'=>$rs->id]);
		session(['cname'=>$rs->name]);
        return redirect('/admin'); 
    	
    }

    /**
     *  验证码
     *
     *  @return \Illuminate\Http\Response
     */
    public function captcha()
    {
        $phrase = new PhraseBuilder;
        // 设置验证码位数
        $code = $phrase->build(4);
        // 生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder($code, $phrase);
        // 设置背景颜色
        $builder->setBackgroundColor(222, 225, 203);
        $builder->setMaxAngle(25);
        $builder->setMaxBehindLines(0);
        $builder->setMaxFrontLines(0);
        // 可以设置图片宽高及字体
        $builder->build($width = 120, $height = 32, $font = null);
        // 获取验证码的内容
        $phrase = $builder->getPhrase();
        // 把内容存入session
        session(['code'=>$phrase]);
        // 生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header("Content-Type:image/jpeg");
        $builder->output();
    }

    /**
     *  修改头像页面.
     *
     *  @return \Illuminate\Http\Response
     */
    public function img()
    {
    	return view('admin.login.img',['title'=>'修改头像']);
    }

    /**
     *  修改头像方法
     *
     *  @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
    	//获取上传的文件对象
        $file = $request->file('img');
        
        if($file->isValid()){
        	//上传文件的后缀名
            $entension = $file->getClientOriginalExtension();
            //修改名字
            $newName = date('YmdHis').mt_rand(1000,9999).'.'.$entension;
            //移动文件
            $path = $file->move('./uploads',$newName);

            $filepath = '/uploads/'.$newName;

            $res['img'] = $filepath;
            DB::table('conservator')->where('id',session('cid'))->update($res);
            //返回文件的路径
            // return  $filepath;
            return redirect('/admin')->with('success','修改成功');
        }
    }

    /**
     *  修改密码页面
     *
     *  @return \Illuminate\Http\Response
     */
    public function pass()
    {
    	return view('admin.login.pass',['title'=>'修改密码']);
    }

    /**
     *  修改密码
     *
     *  @return \Illuminate\Http\Response
     */
    public function passchange(PassRequest $request)
    {
    	$id = $_GET['id'];
    	$rs = DB::table('conservator')->where('id',$id)->first();
    	
    	if (!Hash::check($request->oldpass, $rs->password)) {
		   
		    return back()->with('error','旧密码输入错误');
		}
		else{
			

			if($request->newpass == $request->oldpass){
				 return back()->with('error','旧密码密码不能和新密码一致');
			}
			$password = Hash::make($request->newpass);
			DB::table('conservator')->where('id',$id)->update(['password'=>$password]);
			 return redirect('/admin')->with('success','修改成功');
		}
    }

    //退出
    public function logout()
    {
    	//清空session
    	session(['cid'=>'']);
    	session(['cname'=> '']);

    	return redirect('/admin/login');
    }
}
