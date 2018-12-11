@extends('home.index')  
@section('content')


<link href="/homes/xiangqing/css/base.css" rel="stylesheet">
<link href="/homes/xiangqing/css/index.css" rel="stylesheet">
<link href="/homes/xiangqing/css/m.css" rel="stylesheet">

 <article style="margin-top:10px;">
  <h1 class="t_nav"><span>您现在的位置是：首页 > 专题 </span><a href="/" class="n1">网站首页</a><a class="n2">专题</a></h1>
  <div class="share">

  
  
 <ul class="widget_suxingme_topic"width='300px;'>
  @foreach($subject as $k => $v)
    <li style="margin-left: 75px;">
      <a href="#" title="{{$v->title}}">
        <div class="overlay"></div>
          <div class="image" style="background-image: url({{$v->images}});"></div>
           <div class="title">
              <h4>{{$v->title}}</h4>
               <div class="meta"><span style="right: 100px;top:100px;margin-top: 10px;">查看专题</span>
               </div>
          </div>
        </a>
     </li>
      @endforeach
    </ul>
     


</div>

<style type="text/css">
                
                .pagination li{
                  float: left;
                  margin-left:
                  display: inline-block;
                    padding: 0 8px;
                    color: #666; 
                    height: 30px;
                    line-height: 30px;
                }
                .active{
                border-radius: 50%;
                  background: #EBEBEB;
                  min-width: 30px;
                  height: 30px;
                  line-height: 30px;
                  text-align: center;
                  color: #bebbaa;
                  font-size: 15px;}
              </style>

</div>
 
</article>
<script type="text/javascript" src="/homes/pinglun/js/jquery.min.js"></script>


    @stop