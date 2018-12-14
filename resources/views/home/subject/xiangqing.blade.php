@extends('home.index')  
@section('content')
<link href="/homes/xiangqing/css/base.css" rel="stylesheet">
<link href="/homes/xiangqing/css/index.css" rel="stylesheet">
<link href="/homes/xiangqing/css/m.css" rel="stylesheet">
<link rel="stylesheet" href="/homes/pinglun/css/style.css">
<link rel="stylesheet" href="/homes/pinglun/css/comment.css">
 <article style="margin-top:10px;">
  <h1 class="t_nav"><span>您现在的位置是：首页 > 专题 > {{$subject->title}}</span><a href="/" class="n1">网站首页</a><a href="/home/subject" class="n2">专题</a></h1>
  <div class="infosbox"style="width: 90%;">
    <div class="newsview">
      <h3 class="news_title">{{$subject->title}}</h3>
      <div class="bloginfo">
        <ul>
          <li class="author"><a href="/home/user?id={{$subject->user_id}}">{{$subject->user_name}}</a></li>
          <li class="lmname"><a href="/home/subject">专题</a></li>
          <li class="timer">{{$subject->time}}</li>
           <li class="view">{{$subject->count}}</li>
        </ul>
      </div>
      @php
       $author = DB::table('user')->where('id',$subject->user_id)->first(); 
      @endphp
      <div class="news_about"><strong>简介：{{$author->jianjie}}</strong></div>
      <div class="news_con">
        {!! $subject->content !!}
        &nbsp;
         </div>
    </div>
    <div class="share">
      <span class="session" name="{{session('uid')}}"></span>
      <p class="diggit" ><a href="javascript:;" id="zan"name="{{$subject->id}}"><i class="icon-thumbs-up"></i>
      @if($res == '')
      点赞
      @else
      已点赞
      @endif
    </a></p>
      <p class="diggit"><a href="javascript:;" id="collect" name="{{$subject->id}}"><i class="icon-heart-empty"></i>
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
                            return;
                         }else if(data == 2){
                           $('#collect').html('<i class="icon-thumbs-up"></i>已收藏');
                           return;
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
            if(data == 1){
              oHtml = '<div class="comment-show-con clearfix"><div class="comment-show-con-img pull-left"><img src="'+pimg+'" alt=""></div> <div class="comment-show-con-list pull-left clearfix"><div class="pl-text clearfix"> <a href="#" class="comment-size-name">'+pname+' : </a> <span class="my-pl-con">&nbsp;'+ oSize +'</span> </div> <div class="date-dz"> <span class="date-dz-left pull-left comment-time">'+now+'</span> <div class="date-dz-right pull-right comment-pl-block"><a href="javascript:;" class="removeBlock cdelete">删除</a> <a href="javascript:;" class="date-dz-pl pl-hf hf-con-block pull-left">回复</a> <span class="pull-left date-dz-line">|</span> <a href="javascript:;" class="date-dz-z pull-left"><i class="date-dz-z-click-red"></i>赞 (<i class="z-num">0</i>)</a> </div> </div><div class="hf-list-con"></div></div> </div>';
              
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
              if(data == 1){
                var oAt = '回复<a href="#" class="atName">@'+oHfName+'</a> '+oHfVal;
                var oHtml = '<div class="all-pl-con"><div class="pl-text hfpl-text clearfix"><a href="#" class="comment-size-name">'+rname+': </a><span class="my-pl-con">'+oAt+'</span></div><div class="date-dz"> <span class="date-dz-left pull-left comment-time">'+now+'</span> <div class="date-dz-right pull-right comment-pl-block"> <a href="javascript:;" class="removeBlock rdelete">删除</a></div> </div></div>';
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
        console.log(comment_id);
        var ddelete = $(this);
        $.get('/home/article/cdelete',{comment_id:comment_id},function(data){
          console.log(data);
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
            console.log(reply_id);
            var dddelete = $(this);
          $.get('/home/article/rdelete',{reply_id:reply_id},function(data){
            console.log(data);
              if(data == 1){
                  oT.remove();
              }else{
                alert('删除失败！');
              }
           
          })
            
        }else {
          $.get('/home/article/rdelete',{reply_id:reply_id},function(data){
            console.log(data);
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