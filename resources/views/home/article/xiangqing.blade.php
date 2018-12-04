@extends('home.index')  
@section('content')
<link href="/homes/xiangqing/css/base.css" rel="stylesheet">
<link href="/homes/xiangqing/css/index.css" rel="stylesheet">
<link href="/homes/xiangqing/css/m.css" rel="stylesheet">
 <article style="margin-top:10px;">
  <h1 class="t_nav"><span>您现在的位置是：首页 > 慢生活 > 程序人生</span><a href="/" class="n1">网站首页</a><a href="/" class="n2">慢生活</a></h1>
  <div class="infosbox">
    <div class="newsview">
      <h3 class="news_title">{{$article->title}}</h3>
      <div class="bloginfo">
        <ul>
          <li class="author"><a href="/">{{$article->user_name}}</a></li>
          <li class="lmname"><a href="/">学无止境</a></li>
          <li class="timer">{{$article->time}}</li>
          <li class="view">{{$article->count}}</li>
          <li class="icon-thumbs-up"  style="padding-left:0px;">&nbsp;{{$article->zan}}</li>
          
        </ul>
      </div>
      <div class="news_about"><strong>简介</strong></div>
      <div class="news_con">
        {!! $article->content !!}
        &nbsp;
         </div>
    </div>
    <div class="share">
      <p class="diggit" ><a href="#" id="zan"name="{{$article->id}}"><i class="icon-thumbs-up"></i>
      @if($res == '')
      点赞
      @else
      已点赞
      @endif
    </a></p>
      <p class="diggit"><a href="" id="collect" name="{{$article->id}}"><i class="icon-heart-empty"></i>
     @if($rs == '')
       收藏
      @else
      已收藏
      @endif
     
    </a></p>
      <script type="text/javascript">
            $('#zan').click(function(){
              var article_id = $(this).attr('name');
                  // console.log(user_id);
                 $.get('/home/article/zan',{article_id:article_id},function(data){
                      // console.log(data);
                       if(data == 1){
                          $('#zan').html('<i class="icon-thumbs-up"></i>点赞');
                       }else if(data == 2){
                         $('#zan').html('<i class="icon-thumbs-up"></i>已点赞');
                      }else if(data == 3){
                        alert('点赞失败！');
                      }else{
                        alert('取消点赞失败！');
                      }
                 });
            });

            $('#collect').click(function(){
              var article_id = $(this).attr('name');
                  // console.log(user_id);
                 $.get('/home/article/collect',{article_id:article_id},function(data){
                      // console.log(data);
                       if(data == 1){
                          $('#collect').html('<i class="icon-thumbs-up"></i>收藏');
                       }else if(data == 2){
                         $('#collect').html('<i class="icon-thumbs-up"></i>已收藏');
                      }else if(data == 3){
                        alert('收藏失败！');
                      }else{
                        alert('删除收藏失败！');
                      }
                 });
            });
          </script>
      </div>
   
    <div class="nextinfo">
      <p>上一篇：<a href="/news/life/2018-03-13/804.html">作为一个设计师,如果遭到质疑你是否能恪守自己的原则?</a></p>
      <p>下一篇：<a href="/news/life/">返回列表</a></p>
    </div>
    <div class="otherlink">
      <h2>相关文章</h2>
      <ul>
        <li><a href="/download/div/2018-04-22/815.html" title="html5个人博客模板《黑色格调》">html5个人博客模板《黑色格调》</a></li>
        <li><a href="/download/div/2018-04-18/814.html" title="html5个人博客模板主题《清雅》">html5个人博客模板主题《清雅》</a></li>
        <li><a href="/download/div/2018-03-18/807.html" title="html5个人博客模板主题《绅士》">html5个人博客模板主题《绅士》</a></li>
        <li><a href="/download/div/2018-02-22/798.html" title="html5时尚个人博客模板-技术门户型">html5时尚个人博客模板-技术门户型</a></li>
        <li><a href="/download/div/2017-09-08/789.html" title="html5个人博客模板主题《心蓝时间轴》">html5个人博客模板主题《心蓝时间轴》</a></li>
        <li><a href="/download/div/2017-07-16/785.html" title="古典个人博客模板《江南墨卷》">古典个人博客模板《江南墨卷》</a></li>
        <li><a href="/download/div/2017-07-13/783.html" title="古典风格-个人博客模板">古典风格-个人博客模板</a></li>
        <li><a href="/download/div/2015-06-28/748.html" title="个人博客《草根寻梦》—手机版模板">个人博客《草根寻梦》—手机版模板</a></li>
        <li><a href="/download/div/2015-04-10/746.html" title="【活动作品】柠檬绿兔小白个人博客模板">【活动作品】柠檬绿兔小白个人博客模板</a></li>
        <li><a href="/jstt/bj/2015-01-09/740.html" title="【匆匆那些年】总结个人博客经历的这四年…">【匆匆那些年】总结个人博客经历的这四年…</a></li>
      </ul>
    </div>
    <div class="news_pl">
      <h2>文章评论</h2>
      <ul>
        <div class="gbko"> </div>
      </ul>
    </div>
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
 
  
</script>
    @stop