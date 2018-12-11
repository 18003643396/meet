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
<link rel='stylesheet' href='/homes/css/fontello.css' type='text/css' media='all' />
<script src="/homes/themes/js/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">
$(function(){
	var a = 1;
	var b = 1;
	var c = 1;
	var d = 1;
	var e = 1;
	var f = 1;
	var g = 1;
	

	$('#tel').blur(function(){

		tel = $(this).val();

		if(!isRegisterTel(tel)){
			$(".input_div7 span").html('<img src="/homes/themes/images/v3/text_error.png"><font color=red>手机号格式不正确!</font>');
			$("#tel").focus();
			$(".btn").val('确定').removeAttr('disabled');
			b = 0; 
			return false;
		}else{
			b = 0;
			$(".input_div7 span").html('<img src="/homes/themes/images/v3/success.png">');
		}
	})

	$('#varcode').blur(function(){
		vercode =$("#varcode").val();
		if(vercode == ''){
			$(".input_div5 span").html('<img src="/homes/themes/images/v3/text_error.png"><font color=red>请输入手机验证码</font>').fadeIn();
					$("#varcode").focus();
					$(".btn").val('确定').removeAttr('disabled');
					f = 0;
					return false;
		}else{
			f = 0;
			$(".input_div5 span").html('<img src="/homes/themes/images/v3/success.png">');
		}
	});
	$('#btn').click(function(){
		
		if(b == 1){
			$(".input_div7 span").html('<img src="/homes/themes/images/v3/text_error.png"><font color=red>手机号不能为空!</font>');
			$("#tel").focus();
			$(".btn").val('确定').removeAttr('disabled');
			return false;
		}
		
		else if(f == 1){
			$(".input_div5 span").html('<img src="/homes/themes/images/v3/text_error.png"><font color=red>请输入手机验证码</font>').fadeIn();
					$("#varcode").focus();
					$(".btn").val('确定').removeAttr('disabled');
					return false;
		}else if(g == 1){
			$(".input_div5 span").html('<img src="/homes/themes/images/v3/text_error.png"><font color=red>请获取手机验证码</font>').fadeIn();
					$("#varcode").focus();
					$(".btn").val('确定').removeAttr('disabled');
					return false;
		}

	});
			
				

	$('#yzm').click(function(){
			
			$.get('/home/duanxin',{tel:tel},function(data){
				// console.log(data);
				if(data == 1){
					g = 0;
					var into = null;
						var i = 120;
						var djs = $('<span></span>');
						into =  setInterval(function(){
							$('#yzm').append(djs).hide();
							$("#yzm").next().html(i+'秒后重新发送验证码');
							i--;
							if(i < 0){
								clearInterval(into);
								$("#yzm").next().hide();
								$('#yzm').show();
								
							} 
						},1000)
					}
			else{
						$('#yzm').text('发送失败,请重新获取');
					}
				
			});
		});
});		


function isRegisterTel(h){  
	var patrn=/^1[3456789]\d{9}$/;  
	if (!patrn.exec(h)) return false
	return true
}



</script>
<style>
.input_div span{ background:#FFF;}
.png_bg{
float:right;
background:url(../../images/v3/iphone.png) -25px -290px no-repeat;
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
			<li class="li1">01、验证手机号</li>
			<li class="li2">02、填写新密码</li>
		</ul>
		@if(session('error'))
			<center>
                <div class="error" style="height:50px;width:400px;background: #FF5058;margin-top:10px; ">
                    <li style='list-style:none;font-size:20px;color: #FFF;line-height:50px'><i class="icon-warning"></i>{{session('error')}}</li>
                </div>
            </center>
            @endif
		 <form name="registerForm" id='registerForm' action="/home/yanzheng" method="post" style="padding:60px 40px 88px 40px;font-family:Microsoft Yahei">
			<div class="div_form clear ">
				<label>手机号：</label>
				<div class="input_div input_div7" >
					<input id="tel" name="tel"  type="text" placeholder="请填写注册时的手机号" maxlength="64">
					<span></span>
				</div>
			</div>
			
			<div class="div_form clear ">
				<label>输入验证码：</label>
				<div class="input_div input_div5">
					<input id="varcode" name="code" type="text" maxlength="6">
					
					<a  id="yzm" class="change" href="javascript:void(0)">获取验证码</a>

					<span></span>
				</div>
			</div>
          
			<div class="div_form clear ">
				<label></label>
				<div class="input_div">
					 {{csrf_field()}}
					<input id="btn" class="btn" type="submit" value="确定" />
				</div>
			</div>
			
		</form>
		
		
	</div>
	
	<!-- footer start -->
<div id="footer" class="two-s-footer clearfix"style="background: #000;height:120px;width:97%;>
          <div class="footer-box">
    <div class="container">
              <div class="social-footer"> 
	              <div class="nav-footer" style="text-align: center;margin-top: 20px;margin-bottom: 15px;">
	               <a href="/"style="display: inline-block;font-size: 14px;color: #e0e0e0;margin-right: 10px;">首页</a>
			     <a style="display: inline-block;font-size: 14px;color: #e0e0e0;margin-right: 10px;">wordpress专题</a>
			      <a style="display: inline-block;font-size: 14px;color: #e0e0e0;margin-right: 10px;">域名主机</a>
			       <a style="display: inline-block;font-size: 14px;color: #e0e0e0;margin-right: 10px;">wordpress主题</a>
			        <a style="display: inline-block;font-size: 14px;color: #e0e0e0;margin-right: 10px;">页面模版</a>
			        <a style="display: inline-block;font-size: 14px;color: #e0e0e0;margin-right: 10px;">模板下载</a> 
    </div>
             
        @php

          $fri = DB::table('friend')->get();

         @endphp
              <div class="links-footer" style="text-align: center;font-size: 10px;
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
<script type="text/javascript">
	$('.error').delay(2000).fadeOut(2000);
</script>
<!-- footer end -->
</body>
</html>
















