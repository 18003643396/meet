<!DOCTYPE HTML>
<html lang="en-US">
<head>
<title>忘记密码</title>
<meta charset="UTF-8">
<meta name="keywords" content="">
<meta name="description" content="">
<link type="text/css" href="/homes/themes/css/v3/reset.css" rel="stylesheet">
<link type="text/css" href="/homes/themes/css/v3/public.css" rel="stylesheet">
<link type="text/css" href="/homes/themes/css/v3/register.css" rel="stylesheet">
<link rel='stylesheet' href='/homes/css/fontello.css' type='text/css' media='all' />
<script src="/homes/themes/js/jquery.min.js" type="text/javascript"></script>


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
		<a class="png_bg" href="">返回主页</a>
	<div class="register_content"style="height: 500px;">
	
	
	
		 
		<div class="reg_login"style="top:120px;right: 450px;">
			<p>修改成功</p>
			<a class="btn2" href="/">去登录</a>
		</div>
		<div class="bg"></div>
		
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
















