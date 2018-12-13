
@extends('home.index')  
@section('content')
<link rel="stylesheet" href="/homes/kindeditor/themes/default/default.css" />
<link rel="stylesheet" href="/homes/kindeditor/themes/simple/simple.css" />
 <link href="/homes/xiangqing/css/base.css" rel="stylesheet">
<link href="/homes/xiangqing/css/index.css" rel="stylesheet">
<link href="/homes/xiangqing/css/m.css" rel="stylesheet">
<link href="/homes/tougao/pt_lib_macro.css" type="text/css" rel="stylesheet">
<!-- <script charset="utf-8" src="/homes/js/jquery.uploadView.js"></script> -->

 <article style="margin-top:10px;">
  <h1 class="t_nav"><span>您现在的位置是：首页 > 投稿 </span><a class="n1"id="xwz">写文章</a><a class="n2"id="zt">发专题</a><a class="n2"id="ht">发起话题</a></h1>
  <div class="infosbox">
 @if(session('success'))
                  <div class="alert-dismissible" style="padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px;color: #3c763d;background-color: #dff0d8;border-color: #d6e9c6;">
                      <li style='list-style:none;font-size:14px'></i>{{session('success')}}</li>
                  </div>
              @endif
   <div id="article" class="publishBarArea"style="margin-top: 50px;">
    <form action="/home/article/store" method="post"enctype="multipart/form-data">
      <div class="textareawrap">
         <center>
          <textarea type="text" class="title"name="title" id="title" placeholder=" 请填写标题" maxlength="32"style="height: 50px;display: block;width: 700px;margin:auto;outline: none;border:1px solid #ccc;color: #333;font-size: 30px;border-radius: 20px;"></textarea></br>
        
            <textarea id="editor_id" name="content" style="width:700px;height:300px;margin-left:300px;border-radius: 10px;">
            </textarea>
              {{csrf_field()}}
              <input type="submit" name="" style="color: #fff;background: #000;width: 90px;height: 30px;line-height: 25px;margin: 10px 0;border-radius: 30px;font-size: 16px;text-align: center;">
          </center>
      </div>
    </form>
  </div>

  <div id="zhuanti" class="publishBarArea"style="margin-top: 50px;"hidden>
    <form action="/home/zhuanti/store" method="post"enctype="multipart/form-data" id="art_form">
      <div class="textareawrap">
         <center>
          <style>
   .ac_file{
    width: 400px;
    position: absolute;
    cursor: pointer;
    opacity: 0;
  }
</style>
        <div>
         <a class="banner f-trans " id="banner"style="display: block;width: 700px;height: 120px;line-height: 90px;color: #ccc;font-size: 18px;text-align: center; border:1px solid #ccc;border-radius: 20px;margin-bottom:20px; margin-left:25px;">
             <input type="file" name="images" class="ac_file"id="file_upload"style="width:400px;"/>
             <p><img id="img1"src="" style="max-width:450px;max-height:120px;" /></p>
            <span id="dragContainer" class="dragContainer hovertip">点击添加封面图
           </span>
          </a>
        </div>

          <textarea type="text" class="title"name="title" id="title" placeholder=" 请填写专题标题" maxlength="32"style="height: 50px;display: block;width: 700px;margin:auto;outline: none;border:1px solid #ccc;color: #333;font-size: 30px;border-radius: 20px;"></textarea></br>
          
            <textarea id="editor_id2" name="content" style="width:700px;height:300px;margin-left:300px;border-radius: 10px;">
            </textarea>
              {{csrf_field()}}
            


              <input type="submit" class='' style="color: #fff;background: #000;width: 90px;height: 30px;line-height: 25px;margin: 10px 0;border-radius: 30px;font-size: 16px;text-align: center;">
          </center>

      </div>
    </form>
  </div>
<!-- 发话题 -->
  <div id="huati" class="publishBarArea"style="margin-top: 50px;"hidden>
    <form action="/home/huati/store" method="post"enctype="multipart/form-data">
      <div class="textareawrap">
         <center>
          <textarea type="text" class="title"name="cate" id="title" placeholder=" 请填写话题的主题" maxlength="32"style="height: 50px;display: block;width: 700px;margin:auto;outline: none;border:1px solid #ccc;color: #333;font-size: 30px;border-radius: 20px;"></textarea></br>
            <textarea id="editor_id3" name="descript" style="width:700px;height:300px;margin-left:300px;border-radius: 10px;">
            </textarea>
              {{csrf_field()}}
              <input type="submit" name="" style="color: #fff;background: #000;width: 90px;height: 30px;line-height: 25px;margin: 10px 0;border-radius: 30px;font-size: 16px;text-align: center;">
          </center>
      </div>
    </form>
  </div>


   </div>
    <div class="sidebar">
    <div class="zhuanti"style="padding:30px 0px">
      <h2 class="hometitle">专题推荐</h2>
       @php 
           $subject = DB::table('subject')->join('article','subject.id','=','article.subject_id')->where('subject_id','!=',null)->orderBy('count','desc')->limit(3)->get();
                
        @endphp
           
      <ul>
         @foreach($subject as $k => $v)
        <li> <i><img src="{{$v->images}}"></i>
          <p>{{$v->title}}<span><a href="/home/subject/xiangqing/{{$v->subject_id}}">查看专题</a></span> </p>
        </li>
          @endforeach
      </ul>
    </div>
  
    <div class="guanzhu" id="follow-us"style="padding:30px 0px">
      <h2 class="hometitle">关注我们 么么哒！</h2>
      <ul>
        <li class="sina"><a href="/" target="_blank"><span>新浪微博</span>伱好甜丫</a></li>
        
        <li class="qq"><a href="/" target="_blank"><span>QQ号</span>1597855517</a></li>
        <li class="email"><a href="/" target="_blank"><span>邮箱帐号</span>1597855517@qq.com</a></li>
        <li class="email"><a href="/" target="_blank"><span>邮箱帐号</span>haotian970520@163.com</a></li>

        <li class="wxgzh"><a href="/" target="_blank"><span>微信号</span>haotian970520</a></li>
      </ul>
    </div>
  </div>
</article> 

<script charset="utf-8" src="/homes/kindeditor/kindeditor-all.js"></script>
<script charset="utf-8" src="/homes/kindeditor/kindeditor.js"></script>
<script charset="utf-8" src="/homes/kindeditor/lang/zh-CN.js"></script>
<script>
   
     var editor;
    KindEditor.ready(function(K) {
            editor = K.create('#editor_id', {
                    themeType : 'simple'
            });
    });
    KindEditor.ready(function(K) {
            editor = K.create('#editor_id2', {
                    themeType : 'simple'
            });
    });
    KindEditor.ready(function(K) {
            editor = K.create('#editor_id3', {
                    themeType : 'simple'
            });
    });


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
            url: "/home/upload",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
              // console.log(data);
                $('#img1').attr('src',data);
                $('#art_thumb').val(data);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert("上传失败，请检查网络后重试");
            }
        });
    }

    $('.ac_file').change(function(){
            $("#dragContainer").hide();
          })
</script>
  <script type="text/javascript">
      $('#zt').click(function(){
        $(this).attr('class','n1');
        $('#xwz').attr('class','n2');
        $('#ht').attr('class','n2');
        $('#article').attr('hidden',true);
        $('#zhuanti').attr('hidden',false);
        $('#huati').attr('hidden',true);
      });
      $('#xwz').click(function(){
        $(this).attr('class','n1');
        $('#zt').attr('class','n2');
        $('#ht').attr('class','n2');
         $('#article').attr('hidden',false);
        $('#zhuanti').attr('hidden',true);
        $('#huati').attr('hidden',true);
      });
      $('#ht').click(function(){
        $(this).attr('class','n1');
        $('#xwz').attr('class','n2');
        $('#zt').attr('class','n2');
         $('#article').attr('hidden',true);
        $('#zhuanti').attr('hidden',true);
        $('#huati').attr('hidden',false);
      })
      $('.alert-dismissible').delay(2000).fadeOut(2000);
  </script>


@stop