<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{$title}}</title>
    <link href="/admins/css/admin_login.css" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" href="/admins/dist/css/AdminLTE.min.css">
       <link rel="stylesheet" href="/admins/bower_components/Ionicons/css/ionicons.min.css">
        <link rel="stylesheet" href="/admins/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" type="text/css" href="/admins/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/admins/css/main.css"/>
    <script type="text/javascript" src="/admins/js/libs/modernizr.min.js"></script>
  <link rel="stylesheet" href="/admins/bower_components/font-awesome/css/font-awesome.min.css">
</head>
<body>
<div class="admin_login_wrap">
    <center><h1>后台登录</h1>
    @if(session('error'))
                <div class="alert alert-danger alert-dismissible">
                    <li style='list-style:none;font-size:14px'><i class="icon fa fa-warning"></i>{{session('error')}}</li>
                </div>
            @endif
        </center>
    <div class="adming_login_border">
        <div class="admin_input">
            <form action="/admin/dologin" method="post">
                <ul class="admin_items">
                    <li>
                        <label for="user">用户名：</label>
                        <input type="text" name="name" id="user" size="35" class="admin_input_style" />
                    </li>
                    <li>
                        <label for="pwd">密码：</label>
                        <input type="password" name="password"  id="pwd" size="35" class="admin_input_style" />
                    </li>
					<li>
                        <label for="pwd">验证码：</label>
                        <input type="text" name="code" id="" size="12" class="admin_input_style" /><div style="float:right;"><img src="/admin/captcha" alt="" onclick='this.src = this.src+="?1"'>
						
						</div>
                    </li>
                     {{csrf_field()}}
                     <li>&nbsp;</li>
                    <li>

                        <input type="submit" tabindex="3" value="提交" class="btn btn-primary" />
                    </li>
                </ul>
            </form>
        </div>
    </div>
    <p class="admin_copyright"><a tabindex="5" href="" target="_blank">返回首页</a> &copy; 2018 Powered by <a href="" target="_blank">兄弟之家</a></p>
</div>
<script src="/admins/bower_components/jquery/dist/jquery.min.js"></script>
<script>
    $('.alert-danger').delay(2000).fadeOut(2000);
</script>
</body>
</html>
