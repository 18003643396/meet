<!DOCTYPE HTML>
<html lang="en-US">
<head>
<title>{{$title}}</title>
<meta charset="UTF-8">
<meta name="keywords" content="">
<meta name="description" content="">
<link type="text/css" href="/homes/themes/css/v3/reset.css" rel="stylesheet">
<link type="text/css" href="/homes/themes/css/v3/public.css" rel="stylesheet">
<link type="text/css" href="/homes/themes/css/v3/register.css" rel="stylesheet">
<link rel='stylesheet' href='/homes/css/owl.carousel.min.css' type='text/css' media='all' />

<link rel="shortcut icon" href="favicon.ico" />
<script src="/homes/themes/js/jquery.min.js" type="text/javascript"></script>
<script src="/homes/themes/js/jquery.form.js" type="text/javascript"></script>
<script src="/homes/themes/js/json.parse.js" type="text/javascript"></script>

<script type="text/javascript">
$(function(){
	$(".btn").click(function(){
				var agreenMent=$("#agreement").attr("data");
				
				//alert(agreenMent);0
				var userName= $("#username").val();
				var userPass= $("#password1").val();
				var userPass2=$("#password2").val();
				var userEmail=$("#mail").val();
				var vercode =$("#varcode").val();
				
				userPass=$.trim(userPass);
				userPass2=$.trim(userPass2);
				
		// 		$(".input_div1 span,.input_div2 span,.input_div3 span,.input_div4 span,.input_div6 span,.input_div5 span").html("");
		// 		$(".btn").val('注册中...').attr('disabled','disabled');
				
		// 		if(!isRegisterUserName(userName)){
		// 			$(".input_div1 span").html('<img src="/homes/themes/images/v3/text_error.png"><font color=red>账户名格式不正确!</font>');
		// 			$("#username").focus();
		// 			$(".btn").val('注册').removeAttr('disabled');
		// 			return false;
		// 		}else if(!isEmail(userEmail)){
		// 			$(".input_div2 span").html('<img src="/homes/themes/images/v3/text_error.png"><font color=red>邮箱格式不正确!</font>');
		// 			$("#mail").focus();
		// 			$(".btn").val('注册').removeAttr('disabled');
		// 			return false;
		// 		}else if(userPass.length <8){
		// 			$(".input_div3 span").html('<img src="/homes/themes/images/v3/text_error.png"><font color=red>密码格式不正确!</font>');
		// 			$("#password1").focus();
		// 			$(".btn").val('注册').removeAttr('disabled');
		// 			return false;
		// 		}else if(userPass != userPass2){
		// 			$(".input_div4 span").html('<img src="/homes/themes/images/v3/text_error.png"><font color=red>两次输入的密码不一致!</font>');
		// 			$("#password2").focus();
		// 			$(".btn").val('注册').removeAttr('disabled');
		// 			return false;
		// 		} else if(vercode ==''){
		// 			$(".input_div5 span").html('<img src="/homes/themes/images/v3/text_error.png"><font color=red>输入手机验证码</font>').fadeIn();
		// 			$("#varcode").focus();
		// 			$(".btn").val('注册').removeAttr('disabled');
		// 			return false;
		// 		} else if(agreenMent != '1'){
		// 			//$(".agreenment-tips").html('请先同意用户条款!').fadeIn();
		// 			$(".input_div6 span").html('<img src="/homes/themes/images/v3/text_error.png"><font color=red>请先同意用户条款!</font>');
		// 			$(".btn").val('注册').removeAttr('disabled');
		// 			return false;
		// 		}
				
		// })
	
	$(".change").click(function(){
		$("#imgcode").attr('src','vercode');
	})
	
	$('.check2').click(function(){
		var rel = $('#agreement').attr("data");
		//alert(rel);
		if(rel =='1'){
			$('#agreement').attr("data","0");
		}else{
			$('#agreement').attr("data","1");
		}
		$('.check2').toggleClass("check1");
	});
	
});

function isRegisterUserName(s){  
	var patrn=/^[a-zA-Z0-9]{1}([a-zA-Z0-9]|[._]){5,19}$/;  
	if (!patrn.exec(s)) return false
	return true
}

function isEmail(email){
	   var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\-|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
	   if(!myreg.test(email)) return false;
		return true; 
 }

</script>
<style>
.input_div span{ background:#FFF;}
.png_bg{
float:right;
background:url(/homes/images/v3/iphone.png) -25px -290px no-repeat;
}
.png_bg:hover{color:#009fe3;}
</style>
<!--[if IE 6]>
<script src="themes/js/DD_belatedPNG.js"  type="text/javascript"></script>
<script>DD_belatedPNG.fix('.png_bg');</script>
<![endif]-->
</head>
<body>
	<div id="header" style="height:80px;background:#000;">
		
	</div>
		<a class="png_bg" href="/">返回主页</a>
	<div class="register_content">
	
		<ul class="step_ul step1 clear">
			<li class="li1">01、填写资料</li>
			<li class="li2">02、完成注册</li>
		</ul>
		
		 <form name="registerForm" id='registerForm' action="register/ldo" method="post" style="padding:60px 40px 88px 40px;font-family:Microsoft Yahei">
			<div class="div_form clear ">
				<label>账户名：</label>
				<div class="input_div input_div1">
					<input id="username" name="name" type="text" placeholder="格式6-24位数字字母组合" maxlength="24">
					<span></span>
				</div>
			</div>
			<div class="div_form clear ">
				<label>使用的手机号：</label>
				<div class="input_div input_div7" >
					<input id="mail" name="tel"  type="text" placeholder="请填写正确的手机号，以便接收验证码" maxlength="64">
					<span></span>
				</div>
			</div>
			<div class="div_form clear ">
				<label>常用的邮箱：</label>
				<div class="input_div input_div2" >
					<input id="mail" name="email"  type="text" placeholder="请填写正确的邮箱" maxlength="64">
					<span></span>
				</div>
			</div>
			<div class="div_form clear ">
				<label>请创建一个密码：</label>
				<div class="input_div input_div3">
					<input id="password1" name="password" type="password" placeholder="最少 8 个字符，区分大小写" maxlength="32">
					<span></span>
				</div>
			</div>
			<div class="div_form clear ">
				<label>重新输入密码：</label>
				<div class="input_div input_div4">
					<input id="password2" name="repass" type="password" placeholder="再次输入密码" maxlength="32">
					<span></span>
				</div>
			</div>
			<div class="div_form clear ">
				<label>请输入验证码：</label>
				<div class="input_div input_div5">
					<input id="varcode" name="vercode" type="text" maxlength="6">
					
					
					<span></span>
				</div>
			</div>
            
			<div class="div_form clear ">
				<label></label>
				<div class="input_div">
					<input id="btn" class="btn" type="button" value="注册" />
				</div>
			</div>
			
		</form>
		
		<div class="reg_login">
			<p>已有帐号？</p>
			<a class="btn2" href="/">登录</a>
		</div>
		<div class="bg"></div>
	</div>
	
	<!-- footer start -->
<div id="footer" class="two-s-footer clearfix"style="background: #000; padding: 35px 0 25px 0;width:100%;height: 80px;">
          <div class="footer-box">
    <div class="container"style="    width: 970px;padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;">
              <div class="social-footer"> <a id="tooltip-f-weixin" class="wxii" href="javascript:void(0);"><i class="icon-wechat"></i></a> </div>
              <div class="nav-footer" style="color: #e0e0e0; margin-right: 10px;"> 
    			<a>首页</a>
    			 <a style="color: #e0e0e0; margin-right: 10px;">wordpress专题</a> 
    			<astyle="color: #e0e0e0;
    margin-right: 10px;">域名主机</a>
     <a href="#"style="color: #e0e0e0;
    margin-right: 10px;">wordpress主题</a>
    			 <a>页面模版</a>
    			  <a>模板下载</a>
    			   </div>
             
        @php

          $fri = DB::table('friend')->get();

         @endphp
              <div class="links-footer"style="font-size: 10px;
    color: #353e4a;
    padding: 15px 0 0;
    border-top: 1px solid rgba(255, 255, 255, .05);
    margin-top: 15px;"> <span>友情链接：</span> 
                @foreach($fri as $k => $v)
                <a href="{{$v->url}}" title="{{$v->title}}" target="_blank"style=" color: #353e4a;">{{$v->name}}</a>
                 @endforeach
                  </div>
            </div>
       </div>
  </div>

<!-- footer end -->
</body>
</html>
















