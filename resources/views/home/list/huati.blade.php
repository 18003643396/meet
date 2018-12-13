@extends('home.index')  
@section('content')


<link href="/homes/xiangqing/css/base.css" rel="stylesheet">
<link href="/homes/xiangqing/css/index.css" rel="stylesheet">
<link href="/homes/xiangqing/css/m.css" rel="stylesheet">

 <article style="margin-top:10px;">
  <h1 class="t_nav"><span>您现在的位置是：首页 > 话题 </span><a href="/" class="n1">网站首页</a><a class="n2">话题</a></h1>
  <div class="share">
<ul>
  @foreach($cate as $k => $v)
  @php
    $count = DB::table('article')->where('cate_id',$v->id)->count();
  @endphp
  

 <li> <div class="shareli" style="background-image:url(/images/5.jpg)"><a href="/home/huati/list/{{$v->id}}"> <i><img></i>
      <h2><b>{{$v->cate}}</b></h2>
      <span style="background: #999;">参与 | {{$count}}</span> </a></div> </li>
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
{{$cate->links()}}

</div>
 
</article>
<script type="text/javascript" src="/homes/pinglun/js/jquery.min.js"></script>


    @stop