@extends('home.index')  
@section('content')


   
  <div class="main-content">
    <div class="container">
              <div class="row">
        <div class="article col-xs-12 col-sm-8 col-md-8">
       <div class="ajax-load-box posts-con">
            
          </div> 
                  <div class="clearfix"></div>
           <div id="ajax-load-posts">
            <button id="fa-loadmore" class="button button-more wow fadeInUp" data-wow-delay="0.3s" data-home="true" data-paged="2" data-action="fa_load_postlist" data-total="4">加载更多</button>
          </div>       
                </div>
        <div class="sidebar col-xs-12 col-sm-4 col-md-4">
                  <div class="widget suxingme_topic">
            <h3><span>推荐专题</span></h3>
            @php 
           $subject = DB::table('subject')->join('article','subject.id','=','article.subject_id')->where('subject_id','!=',null)->orderBy('count','desc')->limit(3)->get();
                
            @endphp
            @foreach($subject as $k => $v)
            <ul class="widget_suxingme_topic">
                      <li> <a href="/home/subject/xiangqing/{{$v->subject_id}}" title="{{$v->title}}">
                        <div class="overlay"></div>
                        <div class="image" style="background-image: url({{$v->images}});"></div>
                        <div class="title">
                        <h4>{{$v->title}}</h4>
                        <div class="meta"><span>查看专题</span></div>
                      </div>
                        </a> </li>
                    </ul>
            @endforeach
            
          </div>
                  <div class="widget widget_suxingme_postlist">
            <h3><span>推荐文章</span></h3>
            <ul class="recent-posts-widget">

                      <li class="one"> <a href="/home/xiangqing?id={{$artone->id}}" title="{{$artone->user_name}}">
                        <div class="overlay"></div>
                        <img class="lazy" src="/homes/images/18.jpg" />
                        @php
                           $time = substr($artone->time,0,10);
                        @endphp
                        <div class="title"> <span>{{$time}}</span>
                        <h4>{{$artone->title}}</h4>
                      </div>
                        </a>
                     </li>
                     @foreach($articles as $k => $v)
                      <li class="others"style="height:40px;">
              
                <div class="title"style="margin-left:10px;height:100%;">
                          <h4><a href="/home/xiangqing?id={{$v->id}}" title="{{$v->title}}">{{$v->title}}</a></h4>
                           @php
                           $times = substr($v->time,0,10);
                        @endphp
                          <span>{{$times}}</span> </div>
              </li>
              @endforeach
                
                    </ul>
          </div>
                  <div class="widget suxingme_social">
            <h3><span>关注我们 么么哒！</span></h3>
            <div class="attentionus">
                <ul class="items clearfix">
                <span class="social-widget-link social-link-weibo"> <span class="social-widget-link-count"><i class="icon-weibo"></i>伱好甜丫</span> <span class="social-widget-link-title">新浪微博</span> <a href="http://www.lmlblog.com" target="_blank" rel="nofollow" ></a></span>
                 <span class="social-widget-link social-link-qq"> <span class="social-widget-link-count"><i class="icon-qq"></i>1597855517</span> <span class="social-widget-link-title">QQ号</span> <a href="http://wpa.qq.com/msgrd?v=3&uin=1597855517&site=qq&menu=yes" rel="nofollow" ></a> </span> <span class="social-widget-link social-link-email"> <span class="social-widget-link-count"><i class="icon-mail"></i>1597855517@qq.com</span> <span class="social-widget-link-title">QQ邮箱</span> <a href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=1597855517@qq.com" target="_blank" rel="nofollow" ></a> </span> 
                
                 <span class="social-widget-link social-link-wechat"> <span class="social-widget-link-count"><i class="icon-wechat"></i>lmlblog</span> <span class="social-widget-link-title">微信公众号</span> <a id="tooltip-s-weixin" href="javascript:void(0);"></a> </span>
              </ul>
                    </div>
          </div>
                </div>
      </div>
            </div>
  </div>
  <script type="text/javascript">
    $(function(){
     
      /*初始化*/
      var counter = 0; /*计数器*/
      var pageStart = 0; /*offset*/
      var pageSize = 9; /*size*/
       
      /*首次加载*/
      getData(pageStart, pageSize);
       
      /*监听加载更多*/
      $(document).on('click', '#fa-loadmore', function(){
        
        counter ++;
        pageStart = counter * pageSize;
         
        getData(pageStart, pageSize);
      });
    });
    function getData(offset,size){
      $.get('/guanmore',{offset:offset},function(data){
        var a = eval(data);
        // console.log(a);
        
        var data = a.list;
            var sum = a.length;
        
         
            var result = '';
          
            if(sum - offset < size ){
              size = sum - offset;
            }
             
            /*使用for循环模拟SQL里的limit(offset,size)*/
            // console.log(offset);
            // console.log(sum);
            for(var i=offset; i< (offset+size); i++){
              var content = a[i].content.replace(/<\/?.+?>/g, "").substr(0,200);
              result +='<div class="ajax-load-con content wow fadeInUp"><div class="content-box posts-image-box"><div class="posts-default-title"><h2><a href="/home/xiangqing?id='+a[i].id+'" title="" target="_blank">'+ a[i].title +'</a></h2></div><div class="posts-default-content"><div class="posts-text">'+content+'&hellip;</div></div><div class="posts-default-info"><ul><li class="post-author hidden-xs"><div class="avatar"><img alt="maolai" src="'+ a[i].img+'" height="96" width="96"/></div><a href="javascript:void(0)">'+ a[i].name+'</a></li><li class="ico-cat"><i class="icon-list-2"></i><a href="#">文章</a></li><li class="ico-time"><i class="icon-clock-1"></i>'+ a[i].time +'</li><li class="ico-eye hidden-xs"><i class="icon-eye-4"></i> '+ a[i].count +'</li><li class="ico-like hidden-xs"><i class="icon-thumbs-up"></i> '+ a[i].zan +'</li></ul></div></div></div></div>';
            // aaa += '<div>'+ data[i].title +'</div>';
             
            }

            $('.ajax-load-box').append(result);
             
            /*******************************************/
         
            /*隐藏more按钮*/
            if ( (offset + size) >= sum){
              $("#fa-loadmore").hide();
            }else{
              $("#fa-loadmore").show();
            }
      })
    }

       

  </script>
  @stop