<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use Session;
use DB;
use Hash;
class LoginController extends Controller
{
    public function dologin(Request $request)
    {
    	
    	//表单验证
    	//判断验证码
		$code = session('code');

		if($code != $request->code){
		    echo 1;
		}else {
	    	//判断用户名
	    	$rs = DB::table('user')->where('name',$request->name)->first();


	    	if(!$rs){

	    		echo 2;
	    	}else{
		
    		//判断密码
    		//hash
		    	if (!Hash::check($request->password, $rs->password)) {
				    
				    echo 2;
				}else{
					//存点信息  session
				session(['uid'=>$rs->id]);
				session(['uname'=>$rs->name]);
       			 echo 3; 
				}
			}
		}

		
    }
    //验证码
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
        $builder->build($width = 100, $height = 42, $font = null);
        // 获取验证码的内容
        $phrase = $builder->getPhrase();
        // 把内容存入session
        session(['code'=>$phrase]);
        // 生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header("Content-Type:image/jpeg");
        $builder->output();
    }

    //退出
    public function logout()
    {
    	//清空session
    	session(['uid'=>'']);
    	session(['uname'=> '']);

    	return redirect('/');
    }

    //注册
    public function zhuce()
    {
        
    }
}

