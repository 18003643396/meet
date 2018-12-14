@extends('home.index')  
@section('content')
<link href="/homes/xiangqing/css/base.css" rel="stylesheet">
<link href="/homes/xiangqing/css/index.css" rel="stylesheet">
<link href="/homes/xiangqing/css/m.css" rel="stylesheet">
<link rel="stylesheet" href="/homes/pinglun/css/style.css">
<link rel="stylesheet" href="/homes/pinglun/css/comment.css">
 <article style="margin-top:10px;">
  <h1 class="t_nav"><span>您现在的位置是：首页 > 文章 > {{$article->title}}</span><a href="/" class="n1">网站首页</a><a href="/" class="n2">文章</a></h1>
  <div class="infosbox">
    <div class="newsview">
      <h3 class="news_title">{{$article->title}}</h3>
      <div class="bloginfo">
        <ul>
          <li class="author"><a href="/home/user?id={{$article->user_id}}">{{$article->user_name}}</a></li>
          @if($article->cate_id == null)
          <li class="lmname"><a href="/">文章</a></li>
          @else
          <li class="lmname"><a href="/">话题</a></li>
          @endif
          <li class="timer">{{$article->time}}</li>
          <li class="view">{{$article->count}}</li>
          <li class="icon-thumbs-up"  style="padding-left:0px;">&nbsp;{{$article->zan}}</li>
          
        </ul>
      </div>
      @php
       $author = DB::table('user')->where('id',$article->user_id)->first(); 
      @endphp
      <div class="news_about"><strong>简介:{{$author->jianjie}}</strong></div>
      <div class="news_con">
        {!! $article->content !!}
        &nbsp;
         </div>
    </div>
    <div class="share">
      <span class="session" name="{{session('uid')}}"></span>
      <p class="diggit" ><a href="javascript:;" id="zan"name="{{$article->id}}"><i class="icon-thumbs-up"></i>
      @if($res == '')
      点赞
      @else
      已点赞
      @endif
    </a></p>
      <p class="diggit"><a href="javascript:;" id="collect" name="{{$article->id}}"><i class="icon-heart-empty"></i>
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
                            return;
                         }else if(data == 2){
                           $('#zan').html('<i class="icon-thumbs-up"></i>已点赞');
                           return;
                        }else if(data == 3){
                          alert('点赞失败！');
                          return;
                        }else{
                          alert('请先登录！');
                          return;
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
                            // return;
                         }else if(data == 2){
                           $('#collect').html('<i class="icon-thumbs-up"></i>已收藏');
                           // return;
                        }else if(data == 3){
                          alert('收藏失败！');
                          return;
                        }else{
                          alert('请先登录！');
                          return;
                        }
                   });
                
            });
          </script>
      </div>
   
    <div class="nextinfo">
    	@php
    		$last = DB::table('article')->where('id','<',$article->id)->where('subject_id',null)->orderBy('id','desc')->limit(1)->first();
    		$next = DB::table('article')->where('id','>',$article->id)->where('subject_id',null)->orderBy('id','asc')->limit(1)->first();
    	@endphp

      <p>上一篇：@if($last == '')
                  无
                @else
        <a href="/home/xiangqing?id={{$last->id}}">{{$last->title}}</a>
                @endif
      </p>
      <p>下一篇：@if($next == '')
                  无
                @else
        <a href="/home/xiangqing?id={{$next->id}}">{{$next->title}}</a>
                @endif
      </p>
    </div>
   @php
      $uuser = DB::table('user')->where('id',session('uid'))->first(); 
   @endphp
   @if(session('uid') != '')
    <div class="news_pl">
      <h2>文章评论</h2>
      <ul>
        <div class="gbko"> 
         <div class="commentAll"style="width:700px;">
           <!--评论区域 begin-->
          <div class="reviewArea clearfix">
              <textarea class="content comment-input" placeholder="Please enter a comment&hellip;" onkeyup="keyUP(this)"></textarea>
              <a href="javascript:;" class="plBtn">评论</a>
          </div>
          <!--评论区域 end-->
          <!--回复区域 begin-->
          @if(session('uid') != '')
          <span id = 'user_name' name="{{session('uname')}}"></span>

          <span id="userimg" name="{{$uuser->img}}"></span>
		@endif
          <div class="comment-show">
            @foreach($comment as $k => $v)

              <div class="comment-show-con clearfix">
               
                  <div class="comment-show-con-img pull-left">
                    <img src="{{$v->img}}" alt="">
                  </div>
                  <span id="commentid" name="{{$v->id}}"></span>
                  <div class="comment-show-con-list pull-left clearfix">
                      <div class="pl-text clearfix"name="{{session('uname')}}">
                          <a href="#" class="comment-size-name">{{$v->name}} : </a>
                          <span class="my-pl-con">&nbsp;{{$v->content}}</span>
                      </div>
                      <div class="date-dz">
                          <span class="date-dz-left pull-left comment-time">{{$v->time}}</span>
                          <div class="date-dz-right pull-right comment-pl-block">
                            @if($v->user_id == session('uid'))
                              <a href="javascript:;" class="removeBlock cdelete">删除</a>
                              @endif
                              <a href="javascript:;" class="date-dz-pl pl-hf hf-con-block pull-left">回复</a>
                              <span class="pull-left date-dz-line">|</span>
                              @php
                             
                                $czan = DB::table('commentzan')->where('comment_id',$v->id)->where('user_id',session('uid'))->first();
                              @endphp
                              
                              <a href="javascript:;" class="date-dz-z pull-left"><i class="
                                date-dz-z-click-red"></i>赞 (<i class="z-num">{{$v->czan}}</i>)</a>
                          </div>
                      </div> 
                      @if($czan)
                      <script type="text/javascript">
                          $('.date-dz-z-click-red').addClass('red');
                          $('.date-dz-z').addClass('date-dz-z-click');
                      </script>
                      
                      @endif
                      <div class="hf-list-con">
                      @foreach($reply as $kk => $vv)
                      @if($vv->comment_id == $v->id)
                        <div class="all-pl-con">
                          <div class="pl-text hfpl-text clearfix">
                            <a href="#" class="comment-size-name">{{$vv->name}}: </a>
                            <span class="my-pl-con">回复
                              <a href="#" class="atName">{{@$v->name}}</a>:{{$vv->content}}</span>
                          </div>
                              <div class="date-dz">
                               <span class="date-dz-left pull-left comment-time">{{$vv->time}}</span>
                                <div class="date-dz-right pull-right comment-pl-block">
                                  <span name="{{$vv->id}}"></span>
                                  @if($vv->user_id == session('uid'))
                                  <a href="javascript:;" class="removeBlock rdelete">删除</a>
                                  @endif
                                 </div>
                           </div>
                        </div>
                        @endif
                      @endforeach
                      </div>
                  </div>
                  
              </div>
              @endforeach
          </div>
          <!--回复区域 end-->
          
          </div>
        </div>
      </ul>
    </div>
   @endif
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
        <li class="sina"><a  target="_blank"><span>新浪微博</span>伱好甜丫</a></li>
        
        <li class="qq"><a target="_blank"><span>QQ号</span>1597855517</a></li>
        <li class="email"><a href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=1597855517@qq.com" target="_blank"><span>邮箱帐号</span>1597855517@qq.com</a></li>
        <li class="wxgzh"><a target="_blank"><span>微信号</span>haotian970520</a></li>
      </ul>
    </div>
  </div>
</article>
<script type="text/javascript" src="/homes/pinglun/js/jquery.min.js"></script>
<script type="text/javascript" src="/homes/pinglun/js/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="/homes/pinglun/js/jquery.flexText.js"></script>
<!--textarea高度自适应-->
<script type="text/javascript">
    $(function () {
        $('.content').flexText();
    });
</script>
<!--textarea限制字数-->
<script type="text/javascript">
    function keyUP(t){
        var len = $(t).val().length;
        if(len > 139){
            $(t).val($(t).val().substring(0,140));
        }
    }
</script>
<!--点击评论创建评论条-->
<script type="text/javascript">
   
    $('.commentAll').on('click','.plBtn',function(){
     
        var article_id = $('#collect').attr('name');
        // console.log(article_id);
        var myDate = new Date();
        //获取当前年
        var year=myDate.getFullYear();
        //获取当前月
        var month=myDate.getMonth()+1;
        //获取当前日
        var date=myDate.getDate();
        var h=myDate.getHours();       //获取当前小时数(0-23)
        var m=myDate.getMinutes();     //获取当前分钟数(0-59)
        if(m<10) m = '0' + m;
        var s=myDate.getSeconds();
        if(s<10) s = '0' + s;
        var now=year+'-'+month+"-"+date+" "+h+':'+m+":"+s;
        var pname = $('#user_name').attr('name');
        var pimg = $('#userimg').attr('name');
        //获取输入内容
        var oSize = $(this).siblings('.flex-text-wrap').find('.comment-input').val();
        // console.log(oSize);
        
        if(oSize.replace(/(^\s*)|(\s*$)/g, "") != ''){
        $.get('/home/article/comment',{article_id:article_id,oSize:oSize},function(data){
          // console.log(data);
            if(data != 0 ){
              oHtml = '<div class="comment-show-con clearfix"><div class="comment-show-con-img pull-left"><img src="'+pimg+'" alt=""></div><span id="commentid" name="'+data+'"></span><div class="comment-show-con-list pull-left clearfix"><div class="pl-text clearfix"> <a href="#" class="comment-size-name">'+pname+' : </a> <span class="my-pl-con">&nbsp;'+ oSize +'</span> </div> <div class="date-dz"> <span class="date-dz-left pull-left comment-time">'+now+'</span> <div class="date-dz-right pull-right comment-pl-block"><a href="javascript:;" class="removeBlock cdelete">删除</a> <a href="javascript:;" class="date-dz-pl pl-hf hf-con-block pull-left">回复</a> <span class="pull-left date-dz-line">|</span> <a href="javascript:;" class="date-dz-z pull-left"><i class="date-dz-z-click-red"></i>赞 (<i class="z-num">0</i>)</a> </div> </div><div class="hf-list-con"></div></div> </div>';
              
                  $('.plBtn').parents('.reviewArea ').siblings('.comment-show').prepend(oHtml);
                  $('.plBtn').siblings('.flex-text-wrap').find('.comment-input').prop('value','').siblings('pre').find('span').text('');
             
            }else{
              alert('评论失败');
            }
        }); 
      }
        //动态创建评论模块
     
    });
</script>
<!--点击回复动态创建回复块-->
<script type="text/javascript">
  
    $('.comment-show').on('click','.pl-hf',function(){
    
        //获取回复人的名字
        var fhName = $(this).parents('.date-dz-right').parents('.date-dz').siblings('.pl-text').find('.comment-size-name').html();
        //回复@
        var fhN = '回复@'+fhName;
        //var oInput = $(this).parents('.date-dz-right').parents('.date-dz').siblings('.hf-con');
        var fhHtml = '<div class="hf-con pull-left"> <textarea class="content comment-input hf-input" placeholder="" onkeyup="keyUP(this)"></textarea> <a href="javascript:;" class="hf-pl">评论</a></div>';
        //显示回复
        if($(this).is('.hf-con-block')){
            $(this).parents('.date-dz-right').parents('.date-dz').append(fhHtml);
            $(this).removeClass('hf-con-block');
            $('.content').flexText();
            $(this).parents('.date-dz-right').siblings('.hf-con').find('.pre').css('padding','6px 15px');
            //console.log($(this).parents('.date-dz-right').siblings('.hf-con').find('.pre'))
            //input框自动聚焦
            $(this).parents('.date-dz-right').siblings('.hf-con').find('.hf-input').val('').focus().val(fhN);
        }else {
            $(this).addClass('hf-con-block');
            $(this).parents('.date-dz-right').siblings('.hf-con').remove();
        }
      
    });
</script>
<!--评论回复块创建-->
<script type="text/javascript">
 
    $('.comment-show').on('click','.hf-pl',function(){
     
        var oThis = $(this);
        var myDate = new Date();
        //获取当前年
        var year=myDate.getFullYear();
        //获取当前月
        var month=myDate.getMonth()+1;
        //获取当前日
        var date=myDate.getDate();
        var h=myDate.getHours();       //获取当前小时数(0-23)
        var m=myDate.getMinutes();     //获取当前分钟数(0-59)
        if(m<10) m = '0' + m;
        var s=myDate.getSeconds();
        if(s<10) s = '0' + s;
        var now=year+'-'+month+"-"+date+" "+h+':'+m+":"+s;
        //获取输入内容
        // console.log(now);
        var oHfValss = $(this).siblings('.flex-text-wrap').find('.hf-input').val();
          oHfVals = oHfValss.split(':');
         oHfVal = oHfVals[1] ;
        // console.log(oHfVal);
        var oHfName = $(this).parents('.hf-con').parents('.date-dz').siblings('.pl-text').find('.comment-size-name').html();
        var oAllVal = '回复@'+oHfName;
        var commentid = $(this).parent().parent().parent().prev().attr('name');
        
        var rname = $(this).parent().parent().prev().attr('name');
        
        if(oHfVal.replace(/^ +| +$/g,'') == '' || oHfVal == oAllVal){

        }else {
            $.get('/home/article/reply',{commentid:commentid,oHfVal:oHfVal},function(data){
               // console.log(data);
              if(data != 0){
                var oAt = '回复<a href="#" class="atName">@'+oHfName+'</a> '+oHfVal;
                var oHtml = '<div class="all-pl-con"><div class="pl-text hfpl-text clearfix"><a href="#" class="comment-size-name">'+rname+': </a><span class="my-pl-con">'+oAt+'</span></div><div class="date-dz"> <span class="date-dz-left pull-left comment-time">'+now+'</span> <div class="date-dz-right pull-right comment-pl-block"><span name="'+data+'"></span><a href="javascript:;" class="removeBlock rdelete">删除</a></div> </div></div>';
                 oThis.parents('.hf-con').parents('.comment-show-con-list').find('.hf-list-con').css('display','block').prepend(oHtml) && oThis.parents('.hf-con').siblings('.date-dz-right').find('.pl-hf').addClass('hf-con-block') && oThis.parents('.hf-con').remove();
              }else{
                alert('回复失败');
              }
            });
         }
       
    });
</script>
<!--删除评论块-->
<script type="text/javascript">
    $('.commentAll').on('click','.cdelete',function(){
    
        var comment_id = $(this).parent().parent().parent().prev().attr('name');
         // console.log(comment_id);
        var ddelete = $(this);
        $.get('/home/article/cdelete',{comment_id:comment_id},function(data){
          // console.log(data);
          if(data == 1){
            ddelete.parents('.date-dz-right').parents('.date-dz').parents('.comment-show-con-list').parents('.comment-show-con').remove();
          }else{
            alert('删除失败');
          }
        })
        

    })
</script>
<!-- 删除回复 -->
<script type="text/javascript">
    $('.commentAll').on('click','.rdelete',function(){
        var oT = $(this).parents('.date-dz-right').parents('.date-dz').parents('.all-pl-con');
        if(oT.siblings('.all-pl-con').length >= 1){
            var reply_id = $(this).prev().attr('name');
            // console.log(reply_id);
            var dddelete = $(this);
          $.get('/home/article/rdelete',{reply_id:reply_id},function(data){
            // console.log(data);
              if(data == 1){
                  oT.remove();
              }else{
                alert('删除失败！');
              }
           
          })
            
        }else {
          $.get('/home/article/rdelete',{reply_id:reply_id},function(data){
            // console.log(data);
            if(data == 1){
              dddelete.parents('.date-dz-right').parents('.date-dz').parents('.all-pl-con').parents('.hf-list-con').css('display','none');
                  oT.remove();
              }else{
                alert('删除失败！');
              }

          })
        }
    })
</script>
<!--点赞-->
<script type="text/javascript">
   
    $('.comment-show').on('click','.date-dz-z',function(){
    
        var zNum = $(this).find('.z-num').html();
        var commentid = $(this).parent().parent().parent().prev().attr('name');

        if($(this).is('.date-dz-z-click')){
            zNum--;
            $(this).removeClass('date-dz-z-click red');
            $(this).find('.z-num').html(zNum);
            $(this).find('.date-dz-z-click-red').removeClass('red');
            var znum = zNum.toString();
            $.get('/home/article/comment/qzan',{commentid:commentid,znum:znum},function(data){
              // console.log(data);
              if(data == 1){
                // alert('取消点赞成功');

              }else{
                alert('取消点赞失败！')
              }
            })
        }else {
            zNum++;
            $(this).addClass('date-dz-z-click');
            $(this).find('.z-num').html(zNum);
            $(this).find('.date-dz-z-click-red').addClass('red');
            // console.log(commentid);
             var znum = zNum.toString();
            $.get('/home/article/comment/zan',{commentid:commentid,znum:znum},function(data){
              // console.log(data);
              if(data == 1){
                // alert('点赞成功');

              }else{
                alert('点赞失败！')
              }
            })
        }
      
    })
</script>
    @stop