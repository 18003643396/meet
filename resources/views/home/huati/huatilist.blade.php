@extends('home.index')  
@section('content')
<link href="/homes/xiangqing/css/base.css" rel="stylesheet">
<link href="/homes/xiangqing/css/index.css" rel="stylesheet">
<link href="/homes/xiangqing/css/m.css" rel="stylesheet">
<link rel="stylesheet" href="/homes/kindeditor/themes/default/default.css" />
<link rel="stylesheet" href="/homes/kindeditor/themes/simple/simple.css" />
 <article style="margin-top:10px;">
  <h1 class="t_nav"><span>您现在的位置是：首页 > 话题 >{{$cate->cate}}</span><a href="/" class="n1">网站首页</a><a href="/home/huati" class="n2">话题</a></h1>
  
   <div class="blogsbox"style="width: 70%; ">
   	<div class="blogs" data-scroll-reveal="enter bottom over 1s" >
      <h3 class="blogtitle">{{$cate->cate}}</h3>
      <p class="blogtext">{!! $cate->descript !!}</p>
      <div class="bloginfo">
		@if(!session('uid')=='')
      	<button class="canyu">参与话题</button>
      	@endif
      	<script type="text/javascript">
		$('.canyu').click(function(){
		$cate = $('#cate').attr('hidden');
		// console.log($cate);
        if($cate == 'hidden'){
        	$('#cate').attr('hidden',false);
        }else{
        	$('#cate').attr('hidden',true);
        }
        
       
      });
	</script>
        <ul>
         
          <li style="float: right;">{{$count}}参与</li>
          
        </ul>
      </div>
      <div id="cate" class="publishBarArea"style="margin-top: 50px;"hidden>
	    <form action="/home/cate/store" method="post"enctype="multipart/form-data">
	      <div class="textareawrap">
	         <center>
	          <textarea type="text" class="title"name="title" id="title" placeholder=" 请填写标题" maxlength="32"style="height: 50px;display: block;width: 700px;margin:auto;outline: none;border:1px solid #ccc;color: #333;font-size: 30px;border-radius: 20px;"></textarea></br>
	        
	            <textarea id="editor_id" name="content" style="width:700px;height:300px;margin-left:300px;border-radius: 10px;">
	            </textarea>
	            <input type="hidden" name="cate_id"value="{{$cate->id}}">
	              {{csrf_field()}}
	              <input type="submit" name="" style="color: #fff;background: #000;width: 90px;height: 30px;line-height: 25px;margin: 10px 0;border-radius: 30px;font-size: 16px;text-align: center;">
	          </center>
	      </div>
	    </form>
	  </div>
    </div>
	@foreach($artcate as $k => $v)
	  <div class="ajax-load-con content posts-default wow fadeInUp"> 
	   <div class="content-box"> 
	    <div class="posts-default-box"> 
	     <div class="posts-default-title"> 
	      <h2><a>{{$v->title}}</a></h2> 
	     </div> 
	     <div class="posts-default-content"> 
	      <div class="posts-text">
	       {!! $v->content !!}
	      </div> 
	      <div class="posts-default-info"> 
	       <ul> 
	        <li class="post-author hidden-xs"><div class="avatar"style=" margin: 0px 0px;"><img src="{{$v->img}}" height="96" width="96"/></div><a href="javascript:void(0)">{{$v->user_name}}</a></li>
	        <li class="ico-time"><i class="icon-clock-1"></i> {{$v->time}}</li> 
	        
	        
	       </ul> 
	      </div> 
	     </div> 
	    </div> 
	   </div> 
	  </div>
	  @endforeach
	 </div>
	</article>


	


@stop
<script type="text/javascript" src="/homes/pinglun/js/jquery.min.js"></script>
<script charset="utf-8" src="/homes/kindeditor/kindeditor-all.js"></script>
<script charset="utf-8" src="/homes/kindeditor/kindeditor.js"></script>
<script charset="utf-8" src="/homes/kindeditor/lang/zh-CN.js"></script>
	<script type="text/javascript">
	     var editor;
    	KindEditor.ready(function(K) {
            editor = K.create('#editor_id', {
                    themeType : 'simple'
            });
    	});
	</script>
	