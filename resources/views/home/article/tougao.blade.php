@extends('home.index')  
@section('content')
<link rel="stylesheet" href="/homes/kindeditor/themes/default/default.css" />
<link rel="stylesheet" href="/homes/kindeditor/themes/simple/simple.css" />
 <link href="/homes/xiangqing/css/base.css" rel="stylesheet">
<link href="/homes/xiangqing/css/index.css" rel="stylesheet">
<link href="/homes/xiangqing/css/m.css" rel="stylesheet">
 <article style="margin-top:10px;">
  <h1 class="t_nav"><span>您现在的位置是：首页 > 投稿 </span><a class="n1"id="xwz">写文章</a><a class="n2"id="zt">发专题</a><a class="n2"id="tw">图文</a></h1>
  <div class="infosbox">

   <div id="article" class="publishBarArea"style="margin-top: 50px;">
    <form action="/home/article/store" method="post"enctype="multipart/form-data">
      <div class="textareawrap">
         <center>
          <textarea type="text" class="title"name="title" id="title" placeholder=" 请填写标题" maxlength="32"style="height: 50px;display: block;width: 700px;margin:auto;outline: none;border:1px solid #ccc;color: #333;font-size: 30px;border-radius: 20px;"></textarea></br>
        
            <textarea id="editor_id" name="content" style="width:700px;height:300px;margin-left:300px;border-radius: 10px;">&lt;strong&gt;请输入内容&lt;/strong&gt;
            </textarea>
              {{csrf_field()}}
              <input type="submit" name="" style="color: #fff;background: #000;width: 90px;height: 30px;line-height: 25px;margin: 10px 0;border-radius: 30px;font-size: 16px;text-align: center;">
          </center>
      </div>
    </form>
  </div>

  <div id="zhuanti" class="publishBarArea"style="margin-top: 50px;"hidden>
    <form action="/home/zhuanti/store" method="post"enctype="multipart/form-data">
      <div class="textareawrap">
         <center>
          <textarea type="text" class="title"name="title" id="title" placeholder=" 请填写专题标题" maxlength="32"style="height: 50px;display: block;width: 700px;margin:auto;outline: none;border:1px solid #ccc;color: #333;font-size: 30px;border-radius: 20px;"></textarea></br>
              <input type="file" name="images">
             
            <textarea id="editor_id2" name="content" style="width:700px;height:300px;margin-left:300px;border-radius: 10px;">&lt;strong&gt;请输入内容&lt;/strong&gt;
            </textarea>
              {{csrf_field()}}
              <input type="submit" name="" style="color: #fff;background: #000;width: 90px;height: 30px;line-height: 25px;margin: 10px 0;border-radius: 30px;font-size: 16px;text-align: center;">
          </center>
      </div>
    </form>
  </div>
  <div id="tuwen" class="publishBarArea"style="margin-top: 50px;"hidden>
    <form action="/home/tuwen/store" method="post"enctype="multipart/form-data">
      <div class="textareawrap">
         <center>
          <textarea type="text" class="title"name="title" id="title" placeholder=" 请填写标题1" maxlength="32"style="height: 50px;display: block;width: 700px;margin:auto;outline: none;border:1px solid #ccc;color: #333;font-size: 30px;border-radius: 20px;"></textarea></br>
            <textarea id="editor_id3" name="content" style="width:700px;height:300px;margin-left:300px;border-radius: 10px;">&lt;strong&gt;请输入内容&lt;/strong&gt;
            </textarea>
              {{csrf_field()}}
              <input type="submit" name="" style="color: #fff;background: #000;width: 90px;height: 30px;line-height: 25px;margin: 10px 0;border-radius: 30px;font-size: 16px;text-align: center;">
          </center>
      </div>
    </form>
  </div>
  <script type="text/javascript">
      $('#zt').click(function(){
        $(this).attr('class','n1');
        $('#xwz').attr('class','n2');
        $('#tw').attr('class','n2');
        $('#article').attr('hidden',true);
        $('#zhuanti').attr('hidden',false);
        $('#tuwen').attr('hidden',true);
      });
      $('#xwz').click(function(){
        $(this).attr('class','n1');
        $('#zt').attr('class','n2');
        $('#tw').attr('class','n2');
         $('#article').attr('hidden',false);
        $('#zhuanti').attr('hidden',true);
        $('#tuwen').attr('hidden',true);
      });
      $('#tw').click(function(){
        $(this).attr('class','n1');
        $('#xwz').attr('class','n2');
        $('#zt').attr('class','n2');
         $('#article').attr('hidden',true);
        $('#zhuanti').attr('hidden',true);
        $('#tuwen').attr('hidden',false);
      })

  </script>


   </div>
  <div class="sidebar">
    <div class="zhuanti"style="padding:30px 0px">
      <h2 class="hometitle">特别推荐</h2>
      <ul>
        <li> <i><img src="/homes/xiangqing/images/banner03.jpg"></i>
          <p>帝国cms调用方法 <span><a href="/">阅读</a></span> </p>
        </li>
        <li> <i><img src="/homes/xiangqing/images/b04.jpg"></i>
          <p>5.20 我想对你说 <span><a href="/">阅读</a></span></p>
        </li>
        <li> <i><img src="/homes/xiangqing/images/b05.jpg"></i>
          <p>个人博客，属于我的小世界！ <span><a href="/">阅读</a></span></p>
        </li>
      </ul>
    </div>
    <div class="tuijian"style="padding:30px 0px">
      <h2 class="hometitle">推荐文章</h2>
      <ul class="tjpic">
        <i><img src="/homes/xiangqing/images/toppic01.jpg"></i>
        <p><a href="/">别让这些闹心的套路，毁了你的网页设计</a></p>
      </ul>
      <ul class="sidenews">
        <li> <i><img src="/homes/xiangqing/images/toppic01.jpg"></i>
          <p><a href="/">别让这些闹心的套路，毁了你的网页设计</a></p>
          <span>2018-05-13</span> </li>
        <li> <i><img src="/homes/xiangqing/images/toppic02.jpg"></i>
          <p><a href="/">给我模板PSD源文件，我给你设计HTML！</a></p>
          <span>2018-05-13</span> </li>
        <li> <i><img src="/homes/xiangqing/images/v1.jpg"></i>
          <p><a href="/">别让这些闹心的套路，毁了你的网页设计</a></p>
          <span>2018-05-13</span> </li>
        <li> <i><img src="/homes/xiangqing/images/v2.jpg"></i>
          <p><a href="/">给我模板PSD源文件，我给你设计HTML！</a></p>
          <span>2018-05-13</span> </li>
      </ul>
    </div>
    
    <div class="guanzhu" id="follow-us"style="padding:30px 0px">
      <h2 class="hometitle">关注我们 么么哒！</h2>
      <ul>
        <li class="sina"><a href="/" target="_blank"><span>新浪微博</span>杨青博客</a></li>
        <li class="tencent"><a href="/" target="_blank"><span>腾讯微博</span>杨青博客</a></li>
        <li class="qq"><a href="/" target="_blank"><span>QQ号</span>476847113</a></li>
        <li class="email"><a href="/" target="_blank"><span>邮箱帐号</span>dancesmiling@qq.com</a></li>
        <li class="wxgzh"><a href="/" target="_blank"><span>微信号</span>yangqq_1987</a></li>
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
@stop