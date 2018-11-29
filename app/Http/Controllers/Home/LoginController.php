<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ZhuceRequest;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use Session;
use DB;
use Hash;
use App\Model\Admin\User;
ini_set("display_errors", "on");

// require_once dirname(__DIR__) . '/api_sdk/vendor/autoload.php';

use Aliyun\Core\Config;
use Aliyun\Core\Profile\DefaultProfile;
use Aliyun\Core\DefaultAcsClient;
use Aliyun\Api\Sms\Request\V20170525\SendSmsRequest;
use Aliyun\Api\Sms\Request\V20170525\QuerySendDetailsRequest;

// 加载区域结点配置
Config::load();
class SmsDemo
    {

    static $acsClient = null;

    /**
     * 取得AcsClient
     *
     * @return DefaultAcsClient
     */
        public static function getAcsClient() {
            //产品名称:云通信短信服务API产品,开发者无需替换
            $product = "Dysmsapi";

            //产品域名,开发者无需替换
            $domain = "dysmsapi.aliyuncs.com";

            // TODO 此处需要替换成开发者自己的AK (https://ak-console.aliyun.com/)
            $accessKeyId = "LTAI8ZjHo5LMlJcM"; // AccessKeyId

            $accessKeySecret = "VI1H2Vgl2aI6vFWvyTAx9EohOOgYNO"; // AccessKeySecret

            // 暂时不支持多Region
            $region = "cn-hangzhou";

            // 服务结点
            $endPointName = "cn-hangzhou";


            if(static::$acsClient == null) {

                //初始化acsClient,暂不支持region化
                $profile = DefaultProfile::getProfile($region, $accessKeyId, $accessKeySecret);

                // 增加服务结点
                DefaultProfile::addEndpoint($endPointName, $region, $product, $domain);

                // 初始化AcsClient用于发起请求
                static::$acsClient = new DefaultAcsClient($profile);
            }
            return static::$acsClient;
        }

    /**
     * 发送短信
     * @return stdClass
     */
        public static function sendSms($tel) {

            // 初始化SendSmsRequest实例用于设置发送短信的参数
            $request = new SendSmsRequest();

            //可选-启用https协议
            //$request->setProtocol("https");

            // 必填，设置短信接收号码
            $request->setPhoneNumbers($tel);

            // 必填，设置签名名称，应严格按"签名名称"填写，请参考: https://dysms.console.aliyun.com/dysms.htm#/develop/sign
            $request->setSignName("遇见meet");

            // 必填，设置模板CODE，应严格按"模板CODE"填写, 请参考: https://dysms.console.aliyun.com/dysms.htm#/develop/template
            $request->setTemplateCode("SMS_151910679");

            $code = rand(111111,666666);
            // 可选，设置模板参数, 假如模板中存在变量需要替换则为必填项
            $request->setTemplateParam(json_encode(array(  // 短信模板中字段的值
                "code"=>$code
                
            ), JSON_UNESCAPED_UNICODE));
           session(['dxcode'=>$code]);
            // 可选，设置流水号
            $request->setOutId("yourOutId");

            // 选填，上行短信扩展码（扩展码字段控制在7位或以下，无特殊需求用户请忽略此字段）
            $request->setSmsUpExtendCode("1234567");

            // 发起访问请求
            $acsResponse = static::getAcsClient()->getAcsResponse($request);

            return $acsResponse;
        }
    }

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
        return view("home.zhuce",['title'=>"用户注册"]);
    }



    public function duanxin(Request $request)
    {
        set_time_limit(0);
        header('Content-Type: text/plain; charset=utf-8');
        $tel = $request->tel;
        $response = SmsDemo::sendSms($tel);
        if(!$response->Code == 'OK'){
            echo 2;
        }else{
            echo 1;
        }
        
        
        // print_r($response);
       
    }

    public function dozhuce(Request $request)
    {
        $rs = $request->code;
        if($rs == session('dxcode')){
            $res =$request->except('_token','repass','code');
            // dump($res);
            

            //网数据表里面添加数据  hash加密
            $res['password'] = Hash::make($request->password);

         

            try{

                $data = User::create($res);
                // dump($data);
                if($data){
                    return redirect('/');
                }

            }catch(\Exception $e){

                return back()->with('error','注册失败');;
            }
        }else{
            return back()->with('error','验证码错误');
        }
    }
}

