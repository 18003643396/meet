@extends('home.user.index')

@section('content')
<style type="text/css">
	.n1, .n2 {
    width: 100px;
    display: block;
    text-align: center;
    float: left;
    color: #fff;
}
.n1 {
    background: #000;
}
.n2 {
    background: #333;
    
}
</style>
		<div id="main" class="content">
			<div class="container">
				<h1 class="t_nav"style="border-bottom: #bfbfbf 1px solid;font-size: 14px;font-weight: normal;line-height: 40px;width: 60%;overflow: hidden;margin-bottom: 20px;margin: auto;">
    @if(session('success'))
                  <div class="alert-dismissible" style="padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px;color: #3c763d;background-color: #dff0d8;border-color: #d6e9c6;">
                      <li style='list-style:none;font-size:14px'></i>{{session('success')}}</li>
                  </div>
              @endif
              @if(session('error'))
                <div class="alert-dismissible"style="padding: 15px;margin-bottom: 20px;border: 1px solid transparent;color: #a94442;background-color: #f2dede;border-color: #ebccd1;border-radius: 4px;">
                    <li style='list-style:none;font-size:14px'>{{session('error')}}</li>
                </div>
            @endif
    @if (count($errors) > 0)
            <div class="alert-dismissible"style="padding: 15px;margin-bottom: 20px;border: 1px solid transparent;color: #a94442;background-color: #f2dede;border-color: #ebccd1;border-radius: 4px;">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li style='font-size:14px'></i>&nbsp;&nbsp;&nbsp;&nbsp;{{$error}}</li>
                    @endforeach
                </ul>
              </div>
            
            @endif
            
    <div style="margin-left:26%;"><a class="n1"style="cursor: pointer;"id="grxx">个人信息</a><a class="n2"id="tx"style="cursor: pointer;">修改头像</a><a class="n2"id="mm"style="cursor: pointer;">修改密码</a><a class="n2"id="bj"style="cursor: pointer;">更换背景图</a></div></h1>
		<center>
			@php
				$res = DB::table('user')->where('id',session('uid'))->first();
			@endphp
		<div id='xinxi'>
			<form action="/home/user/infoupdate?id={{$res->id}}"method="post"id="myform"enctype="multipart/form-data">
			<table border="1"style="width:50%;margin:atuo;"cellspacing="0"bordercolor="#ccc">
					<tr>
						<th>用户名</th>
						<td><input class="common-text required" id="title" name="name" size="16" value="{{$res->name}}" type="text"></td>
					</tr>
					
					<tr>
						<th>手机号</th>
						<td><input class="common-text" name="tel" size="16"  type="text" value='{{$res->tel}}'></td>
					</tr>
					<tr>
						<th>邮箱</th>
						<td><input class="common-text required" id="title" name="email" size="16" value="{{$res->email}}" type="text"></td>
					</tr>
					<tr>
						<th>性别</th>
						<td><label><input class="common-text required"  name="sex" value="0" type="radio"@if($res->sex== 0)
                                        checked
                                        @endif
                                        >&nbsp;女</label>
                                    <label><input class="common-text required"  name="sex" value="1" type="radio"@if($res->sex== 1) checked @endif>&nbsp;男</label>
                                    <label><input class="common-text required"  name="sex" value="2" type="radio"@if($res->sex== 2) checked @endif>&nbsp;保密</label></td>
					</tr>
						<th>个人简介</th>
						<td><textarea name="jianjie">{{$res->jianjie}}</textarea></td>
					</tr>
					<tr>
						{{csrf_field()}}
                 {{method_field('PUT')}}
						<th colspan="2"><input type="submit" value="修改"style="margin-left:300px;width:50px;height:25px;"></th>
					</tr>
			</table>
			</form>
		</div>
		<div id="touxiang" hidden>
			<form action="/home/user/touxiangupdate?id={{$res->id}}"method="post"id="art_form"enctype="multipart/form-data">
			<table border="1"style="width:50%;margin:atuo;"cellspacing="0"bordercolor="#ccc">
					
					<tr>
						<td align="center"><img id="img1" style="max-width:100px;max-height:100px;"src="{{$res->img}}" /></td>

					</tr>
					<tr>
						<td align="center"><input id="file_upload" name="img" type="file" multiple="true"></td>
					</tr>
					<tr>
						{{csrf_field()}}
    
						<th><input type="submit" value="修改"style="margin-left:300px;width:50px;height:25px;"></th>
					</tr>
			</table>
			</form>
		</div>
		<div id="mima" hidden>
			<form action="/home/user/mimaupdate?id={{$res->id}}"method="post"id="myform"enctype="multipart/form-data">
			<table border="1"style="width:50%;margin:atuo;"cellspacing="0"bordercolor="#ccc">
					<tr>
						<th>原密码：</th>
						<td><input class="common-text required" id="title" name="oldpass" size="16" value="" type="password"></td>
					</tr>
					
					<tr>
						<th>新密码</th>
						<td><input class="common-text required" id="title" name="newpass" size="16" value="" type="password"></td>
					</tr>
					
					<tr>
						{{csrf_field()}}
						<th colspan="2"><input type="submit" value="修改"style="margin-left:300px;width:50px;height:25px;"></th>
					</tr>
			</table>
			</form>
		</div>

		<div id="background" hidden> 
			<form action="/home/user/backgroundupdate?id={{$res->id}}"method="post"id="art_form"enctype="multipart/form-data">
			<table border="1"style="width:50%;margin:atuo;"cellspacing="0"bordercolor="#ccc">
					
					<tr>
						<td align="center"><input id="file_upload" name="background" type="file" multiple="true"></td>
					</tr>
					<tr>
						{{csrf_field()}}
    
						<th><input type="submit" value="修改"style="margin-left:300px;width:50px;height:25px;"></th>
					</tr>
			</table>
			</form>
		</center>
	</div>
	</div>
	<script type='text/javascript' src='/homes/statics/js/jquery.min.js'></script>
 <script type="text/javascript">
      $('#grxx').click(function(){
        $(this).attr('class','n1');
        $('#tx').attr('class','n2');
        $('#mm').attr('class','n2');
        $('#bj').attr('class','n2');
        $('#mima').attr('hidden',true);
        $('#xinxi').attr('hidden',false);
        $('#touxiang').attr('hidden',true);
        $('#background').attr('hidden',true);
      });
      $('#tx').click(function(){
        $(this).attr('class','n1');
        $('#grxx').attr('class','n2');
        $('#mm').attr('class','n2');
        $('#bj').attr('class','n2');
        $('#mima').attr('hidden',true);
        $('#xinxi').attr('hidden',true);
        $('#touxiang').attr('hidden',false);
        $('#background').attr('hidden',true);
      });
      $('#mm').click(function(){
        $(this).attr('class','n1');
        $('#tx').attr('class','n2');
        $('#grxx').attr('class','n2');
        $('#bj').attr('class','n2');
        $('#mima').attr('hidden',false);
        $('#xinxi').attr('hidden',true);
        $('#touxiang').attr('hidden',true);
        $('#background').attr('hidden',true);
      });
      $('#bj').click(function(){
        $(this).attr('class','n1');
        $('#tx').attr('class','n2');
        $('#mm').attr('class','n2');
        $('#grxx').attr('class','n2');
        $('#mima').attr('hidden',true);
        $('#xinxi').attr('hidden',true);
        $('#touxiang').attr('hidden',true);
        $('#background').attr('hidden',false);
      });
  </script>	
<script>
    $('.alert-dismissible').delay(2000).fadeOut(2000);
</script>
<script type="text/javascript">
    $(function () {
        $("#file_upload").change(function () {
            uploadImage();
        })
    })
    function uploadImage() {
//  判断是否有选择上传文件
        var imgPath = $("#file_upload").val();
        if (imgPath == "") {
            alert("请选择上传图片！");
            return;
        }
        //判断上传文件的后缀名
        var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
        if (strExtension != 'jpg' && strExtension != 'gif'
            && strExtension != 'png' && strExtension != 'bmp') {
            alert("请选择图片文件");
            return;
        }
        var formData = new FormData($('#art_form')[0]);
        $.ajax({
            type: "POST",
            url: "/home/user/touxiang",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
            	console.log(data);
                $('#img1').attr('src',data);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert("上传失败，请检查网络后重试");
            }
        });
    }
</script>
@stop			
