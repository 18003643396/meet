<!DOCTYPE html>
<html>
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimal-ui">
        <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE;chrome=1">
        <title>遇见博客</title>
        <meta name="keywords" content="个人博客网站,lmlblog,Grace主题,wordpress主题">
        <link rel='stylesheet' href='/homes/css/owl.carousel.min.css' type='text/css' media='all' />
        <link rel='stylesheet' href='/homes/css/fontello.css' type='text/css' media='all' />
        <link rel='stylesheet' href='/homes/css/nicetheme.css' type='text/css' media='all' />
        <link rel='stylesheet' href='/homes/css/reset.css' type='text/css' media='all' />
        <link rel='stylesheet' href='/homes/css/style.css' type='text/css' media='all' />
        <link rel="stylesheet" type="text/css" href="/homes/css/bootstrap.min.css">  
        <link rel="stylesheet" type="text/css" href="/homes/css/index.css"> 
        <script type='text/javascript' src='/homes/js/jquery.js'></script>
        <style>
#header, #header .toggle-tougao, .two-s-footer .footer-box {
	background-color: #000;
}
#header .primary-menu ul > li > a, #menu-mobile a,  #header .js-toggle-message button,  #header .js-toggle-search,  #header .toggle-login,  #header .toggle-tougao {
	color: #bdbdbd;
}
.navbar-toggle .icon-bar {
	background-color: #bdbdbd;
}
#header .primary-menu ul > li.current-menu-item > a,  #header .primary-menu ul > li.menu-item-has-children:hover > a,  #header .primary-menu ul > li.current-menu-ancestor > a,  #header .primary-menu ul > li >a:hover {
	color: #FFF;
}
#header .toggle-tougao:hover,  #header .primary-menu ul > li .sub-menu li a:hover,  #header .primary-menu ul > li .sub-menu li.menu-item-has-children:hover > a,  #header .primary-menu ul > li .sub-menu li.current-menu-item > a {
	color: #000;
}
#header .toggle-tougao, #header .toggle-tougao:hover {
	border-color: #bdbdbd;
}
#header .toggle-tougao:hover {
	background-color: #FFF;
}
#btnForgetpsw::hover{color:#6A6A5F
}
</style>
        </head>
        <body class="home blog off-canvas-nav-left">
<div class="loader-mask">
          <div class="loader">
    <div></div>
    <div></div>
  </div>
        </div>
<div id="header" class="navbar-fixed-top">
          <div class="container">
    <h1 class="logo"> <a  href="#" title="MAOLAI博客" style="background-image: url(http://www.lmlblog.com/blog/5/images/logo.png);"/> </a> </h1>
    <div role="navigation"  class="site-nav  primary-menu">
              <div class="menu-fix-box">
        <ul id="menu-navigation" class="menu">
                  <li class="current-menu-ancestor"><a href="/">首页</a></li>
                   <li><a href="#">关注</a></li>
                    <li><a href="#">话题</a></li>
                    <li><a href="#">专题</a></li>
                    <li><a href="#">达人</a></li>
                     @if(!session('uid') == '')
                    <li><a href="/home/user">个人中心</a></li>
                    
                 
                  <li class="menu-item-has-children"><a>更多</a>
                    <ul class="sub-menu">
                      
                      <li><a href="#">寻找好友</a></li>
                      <li><a href="#">退出</a></li>
                      @endif
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
    <div class="right-nav pull-right">
              <div class="js-toggle-message hidden-xs">
       <!--  <button id="sitemessage" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="icon-megaphone"></i> </button> -->
        <div class="dropdown-menu" role="menu" aria-labelledby="sitemessage">
                  <ul>
           <!--  <li class="first"></li>
            <li><span class="time">15.10.19</span><a target="_blank" href="#">极简WordPress个人博客主题</a></li>
            <li><span class="time">15.10.18</span><a target="_blank" href="#">Module 模块化多功能WordPress企业主题</a></li>
            <li><span class="time">15.10.17</span><a target="_blank" href="#">Magneto响应WordPress杂志和博客主题</a></li>
            <li><span class="time">15.10.15</span><a target="_blank" href="#">mawiss WordPress博客杂志的主题</a></li> -->
          </ul>
                  <div class="more-messages"><a href="#">更多</a></div>
                                  </div>
      </div>
              <button class="js-toggle-search"><i class=" icon-search"></i></button>
              <a href="/home/tougao" class="toggle-tougao  hidden-xs">投稿</a> 
              @if(session('uid') == '')

              <a href="#" class="toggle-login hidden-xs a globalLoginBtn">登录</a> <span class="line  hidden-xs"></span>
              <a href="/home/zhuce" class="toggle-login hidden-xs">注册</a> 
              @else
              <a href="#" class="toggle-login hidden-xs">{{session('uname')}}</a> 
              <span class="line  hidden-xs"></span>
              <a href="/home/logout" class="toggle-login hidden-xs">退出</a> 
              @endif

        </div>
  </div>
        </div>
        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
          <div style="display:table; width:100%; height:100%;">
            <div style="vertical-align:middle; display:table-cell;">
              <div class="modal-dialog modal-sm" style="width:540px;">
        <div class="modal-content" style="border: none;height:360px;">
            <div class="col-left" style="height: 360px;background:url(homes/images/left.jpg)"></div>
            <div class="col-right"style="height: 360px">
                <div class="modal-header1">
                    <button type="button" id="login_close" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="loginModalLabel" style="font-size: 20px;color:#1E1E1E;margin-bottom: 10px;margin-left: 110px;: ">登&nbsp;录</h4>
                </div>
                <div class="modal-body"style="height: 300px; padding-bottom:5px">
                    <section class="box-login v5-input-txt" id="box-login"style="height: 280px;padding-bottom:5px">
                        
                            <ul>
                              <div class="error"style="margin-left:80px;"></div>
                                <li class="form-group"><input class="form-control name" id="id_account_l" maxlength="50" name="name" placeholder="请输入邮箱账号/手机号" type="text"style="border: 1px solid #ccc">
                                  <div style="float:right"></div></li>
                                <li class="form-group"><input class="form-control password" id="id_password_l" name="password" placeholder="请输入密码" type="password">
                                  <div style="float:right"></div></li>
                                  <li class="form-group">
                                    <input class="form-control code" id="id_password_l" name="code" placeholder="请输入验证码" type="text" style="width:120px;display:inline;border: 1px solid #ccc">
                                    <img src="/admin/captcha" alt="" onclick='this.src = this.src+="?1"' style="display:inline;float: right;border-radius: 10px;">
                                    <div style="float:right">
                                      
                                    </div>
                                </li>
                                
                            </ul>
                        <br>
                        <p class="good-tips marginB10"><a id="btnForgetpsw" class="fr"style="color:#353630; ">忘记密码？</a>还没有账号？<a href="javascript:;" id="btnRegister">立即注册</a></p>
                          <div class="login-box marginB10">
                            {{csrf_field()}}
                            <button id="login_btn" class="btn btn-micv5 btn-block"value="登录" style="height:47px;background:#A5A593;border-color:#A5A593;color:#fff;font-size:16px;">登录</button>
                            
                        </div>

                        </form>
                        <div class="threeLogin" style="margin-top:10px;bottom: 7px; ">其他方式登录<a class="nqq" href="javascript:;"></a><a class="nwx" href="javascript:;"></a><!--<a class="nwb"></a>--></div>
                        
                    </section><br>
                </div>
            </div>
        </div>
      </div>
    </div>

    </div></div>

  <script type="text/javascript" src="/homes/js/jquery2.2.2.min.js"></script>
  <script type="text/javascript" src="/homes/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="/homes/js/common.js"></script>
  <script type="text/javascript" src="/homes/js/login.js"></script>
  <script type="text/javascript">

      $(function () {
        $("#login_btn").click(function () {
           
            var name = $(".name").val();

            if (name == "") {
                $(".name").css('border','1px solid #e53e41');
                $('.name').next().text(' *用户名不能为空').css('color','#e53e41')
                return;
            }else{
                $(".name").css('border','1px solid #ccc');
                $('.name').next().text('')
            }
            
            var password = $(".password").val();

            if (password == "") {
                $(".password").css('border','1px solid #e53e41');
                $('.password').next().text(' *密码不能为空').css('color','#e53e41')
                return;
            }else{
                $(".password").css('border','1px solid #ccc');
                $('.password').next().text('')
            }
            var code = $(".code").val();

            if (code == "") {
                $(".code").css('border','1px solid #e53e41');
                $('.code').next().next().text(' *验证码不能为空').css('color','#e53e41')
                return;
            }else{
                $(".code").css('border','1px solid #ccc');
                $('.code').next().next().text('')
            }
         
            $.get('/home/dologin',{name:name,password,password,code:code},function(data){
              console.log(data);
              if(data == 1){
                $('.error').fadeIn(1000);
                $('.error').html('<i class="icon-warning"></i>验证码错误！').css('color','#e53e41');

                  $('.error').delay(2000).fadeOut(2000);
              }
              else if(data == 2)
              {
                 $('.error').fadeIn(1000);
               $('.error').html('<i class="icon-warning"></i>用户名密码错误！').css('color','#e53e41');
                   $('.error').delay(2000).fadeOut(2000);
              }
              else{
                location.reload();
              }
            })
        })
    })
  </script>

<div id="page-content" > 
  @section('content')
          <div class="top-content">
    <div class="container">
              <div class="row">
          @php

          $rotate = DB::table('rotate')->orderBy('position','asc')->offset(0)->limit(5)->get();

         @endphp
         <div class="owl-carousel top-slide-two">
               @foreach($rotate as $k => $v)
                  <div class="item"> 
                    <a href="#" title="">
                      <div class="slider-content">
                          <img src="{{$v->img}}" alt="">
                         <!--   <div class="slider-cat">wordpress主题</div> -->
                            <div class="slider-content-item">
                            <h2>{{$v->title}}</h2>
                          </div>
                      </div>
                    </a> 
                  </div>
                @endforeach
                 
          </div>
        <div class="top-singles hidden-xs">
                  <div class="single-item">
            <div class="image" style="background-image:url(/homes/images/11.jpg)"> <a href="#">
              <div class="overlay"></div>
              <div class="cat">wordpress主题</div>
              <div class="title">
                <h3>blggn -响应博客及商店的WordPress主题</h3>
              </div>
              </a> </div>
          </div>
                  <div class="single-item">
            <div class="image" style="background-image:url(/homes/images/16.jpg)"> <a href="#">
              <div class="overlay"></div>
              <div class="cat">wordpress主题</div>
              <div class="title">
                <h3>Magneto响应WordPress杂志和博客主题</h3>
              </div>
              </a> </div>
          </div>
                </div>
      </div>
            </div>
  </div>
  <div class="main-content">
    <div class="container">
              <div class="row">
        <div class="article col-xs-12 col-sm-8 col-md-8">
                  <div class="ajax-load-box posts-con">
            <div class="ajax-load-con content wow fadeInUp">
                      <div class="content-box posts-gallery-box">
                <div class="posts-gallery-img"> <a href="#" title="mawiss WordPress博客杂志的主题" target="_blank"> <img class="lazy" src="/homes/images/1.jpg" width="231" height="173" alt="mawiss WordPress博客杂志的主题" /> </a> </div>
                <div class="posts-gallery-content">
                          <h2><a href="#" title="mawiss WordPress博客杂志的主题">mawiss WordPress博客杂志的主题</a></h2>
                          <div class="posts-gallery-text">mawiss–WordPress博客杂志的主题是一种优质的WordPress博客主题，简洁的设计和完全响应式布局。这个主题是有用的许多网页的风格、滑块式、主题选项，自定义侧边栏和更多!&hellip;</div>
                          <div class="posts-default-info posts-gallery-info">
                    <ul>
                              <li class="post-author hidden-xs">
                        <div class="avatar"><img alt='maolai' src="/homes/images/wo.jpg" height='96' width='96' /></div>
                        <a href="#" target="_blank">maolai</a></li>
                              <li class="postoriginal hidden-xs"><span><i class="icon-cc-1"></i>原创</span></li>
                              <li class="ico-cat"><i class="icon-list-2"></i> <a href="#">wordpress主题</a></li>
                              <li class="ico-time"><i class="icon-clock-1"></i> 2017-10-25</li>
                              <li class="ico-eye hidden-xs"><i class="icon-eye-4"></i> 10,763</li>
                              <li class="ico-like hidden-xs"><i class="icon-heart"></i> 213</li>
                            </ul>
                  </div>
                        </div>
              </div>
                    </div>
           @php

          $art = DB::table('article')->join('user','user_id','=','user.id')->get();
          
         @endphp
        @foreach($art as $k => $v) 
            <div class="ajax-load-con content wow fadeInUp">
                      <div class="content-box posts-image-box">
                <div class="posts-default-title">
                          <h2><a href="#" title="vidorev视频的WordPress主题" target="_blank">{{$v->title}}</a></h2>
                        </div>
                <div class="posts-default-content">
                          <div class="posts-text">{{strip_tags( str_limit($v->content,200) )}}&hellip;</div>
                        </div>
                <div class="posts-default-info">
                          <ul>
                    <li class="post-author hidden-xs">
                              <div class="avatar"><img alt='maolai' src="{{$v->img}}" height='96' width='96' /></div>
                              <a href="" target="_blank">{{$v->user_name}}</a></li>
                    <li class="ico-cat"><i class="icon-list-2"></i>
                    <a href="#">wordpress主题</a></li>
                    <li class="ico-time"><i class="icon-clock-1"></i> {{$v->time}}</li>
                    <li class="ico-eye hidden-xs"><i class="icon-eye-4"></i> {{$v->count}}</li>
                    <li class="ico-like hidden-xs"><i class="icon-thumbs-up"></i> {{$v->zan}}</li>
                  </ul>
                        </div>
              </div>
                    </div>
                    @endforeach
            <div class="ajax-load-con content wow fadeInUp">
                      <div class="content-box posts-gallery-box">
                <div class="posts-gallery-img"> <a href="#" title="gridbase -新闻和博客的WordPress主题" target="_blank"> <img class="lazy" src="/homes/images/5.jpg" alt="gridbase -新闻和博客的WordPress主题" /> </a> </div>
                <div class="posts-gallery-content">
                          <h2><a href="3" title="gridbase -新闻和博客的WordPress主题" target="_blank">gridbase -新闻和博客的WordPress主题</a></h2>
                          <div class="posts-gallery-text">gridbase–溢价WordPress主题有点不寻常的设计将帮助你吸引你的访客。主题是专门为博客或杂志的网站;在考虑网站性能的编码。你也可以动态广告或你要写产品广告帖的能力(包括酷联盟号召行动按钮)。主题是现代而优雅的，易于使用的和完全响应式布局。&hellip;</div>
                          <div class="post-style-tips"> <span><a href="#">wordpress模板</a></span> </div>
                        </div>
              </div>
                    </div>


            <div class="ajax-load-con content wow fadeInUp">
                      <div class="content-box posts-gallery-box">
                <div class="posts-gallery-img"> <a href="#" title="minberi报纸编辑WordPress主题" target="_blank"> <img class="lazy" src="/homes/images/6.jpg" alt="minberi报纸编辑WordPress主题" /> </a> </div>
                <div class="posts-gallery-content">
                          <h2><a href="#" title="minberi报纸编辑WordPress主题" target="_blank">minberi报纸编辑WordPress主题</a></h2>
                          <div class="posts-gallery-text">Minberi是广泛使用的一个综合的WordPress主题。它将作为一个新闻网站或类别，喜欢时尚，运动，设计，技术，科技，旅游，政治杂志，影视，视频或博客。包含一切，你应该包括在杂志的主题。我们设计并开发了非常优雅和现代杂志的主题，是很容易定制。我们相信，我们的主题将升值，成为非常实用的网站。&hellip;</div>
                          <div class="posts-default-info posts-gallery-info">
                    <ul>
                              <li class="post-author hidden-xs">
                        <div class="avatar"><img alt='maolai' src="/homes/images/wo.jpg" height='96' width='96' /></div>
                        <a href="http://www.lmlblog.com/" target="_blank">maolai</a></li>
                              <li class="ico-cat"><i class="icon-list-2"></i> <a href="#">wordpress主题</a></li>
                              <li class="ico-time"><i class="icon-clock-1"></i> 2017-10-25</li>
                              <li class="ico-eye hidden-xs"><i class="icon-eye-4"></i> 2,555</li>
                              <li class="ico-like hidden-xs"><i class="icon-heart"></i> 25</li>
                            </ul>
                  </div>
                        </div>
              </div>
                    </div>
            <div class="ajax-load-con content wow fadeInUp">
                      <div class="content-box posts-image-box">
                <div class="posts-default-title">
                          <h2><a href="#" title="Penta响应博客的WordPress主题" target="_blank">Penta响应博客的WordPress主题</a></h2>
                        </div>
                <div class="post-images-item">
                          <ul>
                    <li>
                              <div class="image-item"> <a href="#">
                                <div class="overlay"></div>
                                <img class="lazy" src="/homes/images/8.jpg" alt="Penta响应博客的WordPress主题" /> </a> </div>
                            </li>
                    <li>
                              <div class="image-item"> <a href="http://www.lmlblog.com/911.html">
                                <div class="overlay"></div>
                                <img class="lazy" src="/homes/images/9.jpg" alt="Penta响应博客的WordPress主题" /> </a> </div>
                            </li>
                    <li>
                              <div class="image-item"> <a href="http://www.lmlblog.com/911.html">
                                <div class="overlay"></div>
                                <img class="lazy" src="/homes/images/10.jpg" alt="Penta响应博客的WordPress主题" /> </a> </div>
                            </li>
                  </ul>
                        </div>
                <div class="posts-default-content">
                          <div class="posts-text">如果你要分享，想开始一个博客–这WordPress的主题思想和故事的最好的办法是给你!Penta创建博客的工作更愉快和简单。一个明确的，但时尚的设计是完全响应，这意味着你的追随者将能够读取你手机上没有画面质量的损失。博客可以让你在目前的职位多布局。&hellip;</div>
                        </div>
                <div class="posts-default-info">
                          <ul>
                    <li class="ico-cat"><i class="icon-list-2"></i> <a href="#">wordpress主题</a></li>
                    <li class="ico-time"><i class="icon-clock-1"></i> 2017-10-25</li>
                    <li class="ico-eye hidden-xs"><i class="icon-eye-4"></i> 3,016</li>
                    <li class="ico-like hidden-xs"><i class="icon-heart"></i> 70</li>
                  </ul>
                        </div>
              </div>
                    </div>
            <div class="ajax-load-con content wow fadeInUp">
                      <div class="content-box posts-gallery-box">
                <div class="posts-gallery-img"> <a href="#" title="blggn -响应博客及商店的WordPress主题" target="_blank"> <img class="lazy" src="/homes/images/11.jpg" alt="blggn -响应博客及商店的WordPress主题" /> </a> </div>
                <div class="posts-gallery-content">
                          <h2><a href="#" title="blggn -响应博客及商店的WordPress主题" target="_blank">blggn -响应博客及商店的WordPress主题</a></h2>
                          <div class="posts-gallery-text">一个新面孔的惊人的博客及商店的WordPress主题创意。主题是超专业，细腻光滑，用干净的现代布局非常容易定制。本主题提供几乎任何需要伟大的用户体验，它是完美的时尚，生活，旅游，食品，工艺品和其他许多创造性的博客。&hellip;</div>
                          <div class="posts-default-info posts-gallery-info">
                    <ul>
                              <li class="ico-cat"><i class="icon-list-2"></i> <a href="#">wordpress主题</a></li>
                              <li class="ico-time"><i class="icon-clock-1"></i> 2017-10-24</li>
                              <li class="ico-eye hidden-xs"><i class="icon-eye-4"></i> 2,385</li>
                              <li class="ico-like hidden-xs"><i class="icon-heart"></i> 35</li>
                            </ul>
                  </div>
                        </div>
              </div>
                    </div>
            <div class="ajax-load-con content wow fadeInUp">
                      <div class="content-box posts-image-box">
                <div class="posts-default-title">
                          <h2><a href="#" title="Pepper博客/迷你杂志创意的WordPress主题" target="_blank">Pepper博客/迷你杂志创意的WordPress主题</a></h2>
                        </div>
                <div class="post-images-item">
                          <ul>
                    <li>
                              <div class="image-item"> <a href="#">
                                <div class="overlay"></div>
                                <img class="lazy" src="/homes/images/12.jpg" alt="Pepper博客/迷你杂志创意的WordPress主题" /> </a> </div>
                            </li>
                    <li>
                              <div class="image-item"> <a href="http://www.lmlblog.com/903.html">
                                <div class="overlay"></div>
                                <img class="lazy" src="/homes/images/13.jpg" alt="Pepper博客/迷你杂志创意的WordPress主题" /> </a> </div>
                            </li>
                    <li>
                              <div class="image-item"> <a href="http://www.lmlblog.com/903.html">
                                <div class="overlay"></div>
                                <img class="lazy" src="/homes/images/14.jpg" alt="Pepper博客/迷你杂志创意的WordPress主题" /> </a> </div>
                            </li>
                  </ul>
                        </div>
                <div class="posts-default-content">
                          <div class="posts-text">Peppermint，你新的惊人的博客和迷你杂志的主题。Peppermint是一种博客/迷你杂志的现代外观的WordPress主题和强烈关注的排版工作很容易。Peppermint是新的WordPress主题，可用于任何一种迷你杂志，病毒的博客(生活、时尚、等)或任何其他个人网站。主题是充分响应在iPhone，iPad和Android手机和平板电脑。&hellip;</div>
                        </div>
                <div class="posts-default-info">
                          <ul>
                    <li class="ico-cat"><i class="icon-list-2"></i> <a href="#">wordpress主题</a></li>
                    <li class="ico-time"><i class="icon-clock-1"></i> 2017-10-24</li>
                    <li class="ico-eye hidden-xs"><i class="icon-eye-4"></i> 2,262</li>
                    <li class="ico-like hidden-xs"><i class="icon-heart"></i> 47</li>
                  </ul>
                        </div>
              </div>
                    </div>
            <div class="ajax-load-con content wow fadeInUp">
                      <div class="content-box posts-gallery-box">
                <div class="posts-gallery-img"> <a href="#" title="Linx - WordPress博客和杂志的主题" target="_blank"> <img class="lazy" src="/homes/images/15.jpg" alt="Linx - WordPress博客和杂志的主题" /> </a> </div>
                <div class="posts-gallery-content">
                          <h2><a href="#" title="Linx - WordPress博客和杂志的主题" target="_blank">Linx - WordPress博客和杂志的主题</a></h2>
                          <div class="posts-gallery-text">LINX是一个功能和设计思想的WordPress博客和杂志的主题。其特点是思想和实施仔细为各级用户容易。民众可以轻松导入和修改以适合你的需要。如果你想从零开始，它也容易–刚刚安装的主题，调整设置点来创建你自己的独特的风格，开始写博客。Linx适合所有你的博客风格–时尚博客，美食博客，旅游博客，生活博客，美女博客，DIY的博客，摄影博客，简单的杂志等&hellip;</div>
                          <div class="posts-default-info posts-gallery-info">
                    <ul>
                              <li class="ico-cat"><i class="icon-list-2"></i> <a href="#">wordpress主题</a></li>
                              <li class="ico-time"><i class="icon-clock-1"></i> 2017-10-24</li>
                              <li class="ico-eye hidden-xs"><i class="icon-eye-4"></i> 2,577</li>
                              <li class="ico-like hidden-xs"><i class="icon-heart"></i> 42</li>
                            </ul>
                  </div>
                        </div>
              </div>
                    </div>
            <div class="ajax-load-con content posts-default wow fadeInUp">
                      <div class="content-box">
                <div class="posts-default-img"> <a href="#" title="trendion |个人生活博客和杂志的WordPress主题" target="_blank">
                  <div class="overlay"></div>
                  <img class="lazy" src="/homes/images/b1.jpg" alt="trendion |个人生活博客和杂志的WordPress主题" /> </a> </div>
                <div class="posts-default-box">
                          <div class="posts-default-title">
                    <h2><a href="#" title="trendion |个人生活博客和杂志的WordPress主题" target="_blank">trendion |个人生活博客和杂志的WordPress主题</a></h2>
                  </div>
                          <div class="posts-default-content">
                    <div class="posts-text">trendion是当代的，反应和精制生活方式博客的WordPress主题一个圆滑的，诱人的，新鲜的和现代的设计一个人时尚或干净的和时尚生活方式的博客，一个在线杂志或生活杂志这将是一个伟大的解决方案，世界的美丽，旅游与风格趋势的博客，组合，医疗保健的博客时尚新闻。主题可以轻松地管理你的帖子，故事和文章，写下你的生活方式。它是完美的：博客作者，作家，摄影师，文案和社交活跃的人&hellip;</div>
                    <div class="posts-default-info">
                              <ul>
                        <li class="ico-cat"><i class="icon-list-2"></i> <a href="#">wordpress主题</a></li>
                        <li class="ico-time"><i class="icon-clock-1"></i> 2017-10-24</li>
                        <li class="ico-eye hidden-xs"><i class="icon-eye-4"></i> 1,533</li>
                        <li class="ico-like hidden-xs"><i class="icon-heart"></i> 39</li>
                      </ul>
                            </div>
                  </div>
                        </div>
              </div>
                    </div>
            <div class="ajax-load-con content wow fadeInUp">
                      <div class="content-box posts-image-box">
                <div class="posts-default-title">
                          <h2><a href="#" title="Magneto响应WordPress杂志和博客主题
" target="_blank">Magneto响应WordPress杂志和博客主题</a></h2>
                        </div>
                <div class="post-images-item">
                          <ul>
                    <li>
                              <div class="image-item"> <a href="http://www.lmlblog.com/1028.html">
                                <div class="overlay"></div>
                                <img class="lazy" src="/homes/images/16.jpg" alt="Magneto响应WordPress杂志和博客主题" /> </a> </div>
                            </li>
                    <li>
                              <div class="image-item"> <a href="http://www.lmlblog.com/1028.html">
                                <div class="overlay"></div>
                                <img class="lazy" src="/homes/images/17.jpg" alt="Magneto响应WordPress杂志和博客主题" /> </a> </div>
                            </li>
                    <li>
                              <div class="image-item"> <a href="http://www.lmlblog.com/1028.html">
                                <div class="overlay"></div>
                                <img class="lazy" src="/homes/images/10.jpg" alt="Magneto响应WordPress杂志和博客主题" /> </a> </div>
                            </li>
                  </ul>
                        </div>
                <div class="posts-default-content">
                          <div class="posts-text">Magneto是一个强大的WordPress模板填充页面生成器和功能吨包括6个月的支持。它非常适合杂志，新闻，体育，游戏，旅游，时尚，科技，评论网站。这是一个极有价值的WordPress主题的杂志、报纸、博客网站的生活方式。这给了设计师和开发商在backendsaving时间强大的设计工具，一个巨大的范围和更多的金钱，包括页面生成器，主题选项，简码，小工具、Mega Menu和更多。&hellip;</div>
                        </div>
                <div class="posts-default-info">
                          <ul>
                    <li class="post-author hidden-xs">
                              <div class="avatar"><img alt='maolai' src="/homes/images/wo.jpg" class='avatar' height='96' width='96' /></div>
                              <a href="http://www.lmlblog.com/" target="_blank">maolai</a></li>
                    <li class="ico-cat"><i class="icon-list-2"></i> <a href="#">wordpress主题</a></li>
                    <li class="ico-time"><i class="icon-clock-1"></i> 2017-10-24</li>
                    <li class="ico-eye hidden-xs"><i class="icon-eye-4"></i> 1,387</li>
                    <li class="ico-like hidden-xs"><i class="icon-heart"></i> 12</li>
                  </ul>
                        </div>
              </div>
                    </div>
          </div>
                  <div class="clearfix"></div>
           <div id="ajax-load-posts">
            <button id="fa-loadmore" class="button button-more wow fadeInUp" data-wow-delay="0.3s" data-home="true" data-paged="2" data-action="fa_load_postlist" data-total="4">加载更多</button>
          </div>       
                </div>
        <div class="sidebar col-xs-12 col-sm-4 col-md-4">
                  <div class="widget suxingme_topic">
            <h3><span>推荐专题</span></h3>
            <ul class="widget_suxingme_topic">
                      <li> <a href="#" title="wordpress主题推荐">
                        <div class="overlay"></div>
                        <div class="image" style="background-image: url(/homes/images/13.jpg);"></div>
                        <div class="title">
                        <h4>wordpress主题推荐</h4>
                        <div class="meta"><span>查看专题</span></div>
                      </div>
                        </a> </li>
                    </ul>
            <ul class="widget_suxingme_topic">
                      <li> <a href="#" title="wordpress视频主题">
                        <div class="overlay"></div>
                        <div class="image" style="background-image: url(/homes/images/5.jpg);"></div>
                        <div class="title">
                        <h4>wordpress视频主题</h4>
                        <div class="meta"><span>查看专题</span></div>
                      </div>
                        </a> </li>
                    </ul>
            <ul class="widget_suxingme_topic">
                      <li> <a href="#" title="wordpress杂志主题">
                        <div class="overlay"></div>
                        <div class="image" style="background-image: url(/homes/images/6.jpg);"></div>
                        <div class="title">
                        <h4>wordpress杂志主题</h4>
                        <div class="meta"><span>查看专题</span></div>
                      </div>
                        </a> </li>
                    </ul>
          </div>
                  <div class="widget widget_suxingme_postlist">
            <h3><span>最新文章</span></h3>
            <ul class="recent-posts-widget">
                      <li class="one"> <a href="#" title="响应式个人杂志WordPress博客主题">
                        <div class="overlay"></div>
                        <img class="lazy" src="/homes/images/18.jpg" alt="响应式个人杂志WordPress博客主题" />
                        <div class="title"> <span>2017-10-25</span>
                        <h4>响应式个人杂志WordPress博客主题</h4>
                      </div>
                        </a> </li>
                      <li class="others">
                <div class="image"><a href="#" title="Magneto响应WordPress杂志和博客主题"> <img class="lazy" src="/homes/images/9.jpg" alt="Magneto响应WordPress杂志和博客主题" /> </a></div>
                <div class="title">
                          <h4><a href="#" title="Magneto响应WordPress杂志和博客主题">Magneto响应WordPress杂志和博客主题</a></h4>
                          <span>2017-10-25</span> </div>
              </li>
                      <li class="others">
                <div class="image"><a href="#" title="Linx - WordPress博客和杂志的主题"> <img class="lazy" src="/homes/images/10.jpg" alt="Linx - WordPress博客和杂志的主题" /> </a></div>
                <div class="title">
                          <h4><a href="#" title="Linx - WordPress博客和杂志的主题">Linx - WordPress博客和杂志的主题</a></h4>
                          <span>2017-10-25</span> </div>
              </li>
                      <li class="others">
                <div class="image"><a href="#" title="个人生活博客和杂志的WordPress主题"> <img class="lazy" src="/homes/images/11.jpg" alt="个人生活博客和杂志的WordPress主题" /> </a></div>
                <div class="title">
                          <h4><a href="#" title="个人生活博客和杂志的WordPress主题">个人生活博客和杂志的WordPress主题</a></h4>
                          <span>2017-10-25</span> </div>
              </li>
                      <li class="others">
                <div class="image"><a href="#" title="Penta响应博客的WordPress主题"> <img class="lazy" src="/homes/images/12.jpg" alt="Penta响应博客的WordPress主题" /> </a></div>
                <div class="title">
                          <h4><a href="#" title="Penta响应博客的WordPress主题">Penta响应博客的WordPress主题泄漏</a></h4>
                          <span>2017-10-25</span> </div>
              </li>
                    </ul>
          </div>
                  <div class="widget suxingme_social">
            <h3><span>关注我们 么么哒！</span></h3>
            <div class="attentionus">
                      <ul class="items clearfix">
                <span class="social-widget-link social-link-weibo"> <span class="social-widget-link-count"><i class="icon-weibo"></i>maolai博客</span> <span class="social-widget-link-title">新浪微博</span> <a href="http://www.lmlblog.com" target="_blank" rel="nofollow" ></a></span> <span class="social-widget-link social-link-tencent-weibo"> <span class="social-widget-link-count"><i class="icon-tencent-weibo"></i>maolai博客</span> <span class="social-widget-link-title">腾讯微博</span> <a href="http://www.lmlblog.com" target="_blank" rel="nofollow" ></a> </span> <span class="social-widget-link social-link-qq"> <span class="social-widget-link-count"><i class="icon-qq"></i>2195335317</span> <span class="social-widget-link-title">QQ号</span> <a href="http://wpa.qq.com/msgrd?v=3&uin=2195335317&site=qq&menu=yes" rel="nofollow" ></a> </span> <span class="social-widget-link social-link-email"> <span class="social-widget-link-count"><i class="icon-mail"></i>lmlblog@qq.com</span> <span class="social-widget-link-title">QQ邮箱</span> <a href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=lmlblog@qq.com" target="_blank" rel="nofollow" ></a> </span> <span class="social-widget-link social-link-wechat"> <span class="social-widget-link-count"><i class="icon-wechat"></i>lmlblog</span> <span class="social-widget-link-title">微信公众号</span> <a id="tooltip-s-weixin" href="javascript:void(0);"></a> </span>
              </ul>
                    </div>
          </div>
                </div>
      </div>
            </div>
  </div> @show
        </div>

      
<div class="clearfix"></div>
<div id="footer" class="two-s-footer clearfix">
          <div class="footer-box">
    <div class="container">
              <div class="social-footer"> <a id="tooltip-f-weixin" class="wxii" href="javascript:void(0);"><i class="icon-wechat"></i></a> </div>
              <div class="nav-footer"> <a>首页</a> <a href="#">wordpress专题</a> <a href="#">域名主机</a> <a href="#">wordpress主题</a> <a>页面模版</a> <a href="http://www.lmlblog.com/2656.html">模板下载</a> </div>
              <div class="copyright-footer">
        <p>Copyright © 2018 <a class="site-link" href="#" title="lmlblog" rel="home">lmlblog</a> · Powered By WordPress · Grace Theme By <a href="http://www.lmlblog.com" target="_blank">maolai</a></p>
      </div>
        @php

          $fri = DB::table('friend')->get();

         @endphp
              <div class="links-footer"> <span>友情链接：</span> 
                @foreach($fri as $k => $v)
                <a href="{{$v->url}}" title="{{$v->title}}" target="_blank">{{$v->name}}</a>
                 @endforeach
                  </div>
            </div>
  </div>
    </div>
<div class="search-form">
          <form method="get" action="" role="search">
    <div class="search-form-inner">
              <div class="search-form-box">
        <input class="form-search" type="text" name="s" placeholder="键入搜索关键词">
        <button type="submit" id="btn-search"><i class="icon-search"></i> </button>
      </div>
              <div class="search-commend">
        <h4>大家都在搜</h4>
        <ul>
                  <li><a href="#">wordpress主题</a></li>
                  <li><a href="#">个人博客模板</a></li>
                  <li><a href="#">网页模板</a></li>
                </ul>
      </div>
            </div>
  </form>
          <div class="close-search"> <span class="close-top"></span> <span class="close-bottom"></span> </div>
        </div>
<div class="f-weixin-dropdown">
          <div class="tooltip-weixin-inner">
    <h3>关注我们的公众号</h3>
    <div class="qcode"> <img src="/homes/http://www.lmlblog.com/blog/5/images/wx.png" width="160" height="160" alt="微信公众号"> </div>
  </div>
          <div class="close-weixin"> <span class="close-top"></span> <span class="close-bottom"></span> </div>
        </div>
<script type='text/javascript'>
/* <![CDATA[ */
var suxingme_url = {"slidestyle":"index_slide_sytle_2","wow":"1","sideroll":"1","duang":"1"};
/* ]]> */
</script> 
<script type='text/javascript' src='/homes/js/plugins.min.js'></script> 
<script type='text/javascript' src='/homes/js/lmlblog.js'></script> 
<script type='text/javascript' src='/homes/js/owl.carousel.min.js'></script> 
<script type='text/javascript' src='/homes/js/wow.min.js'></script>
</body>
</html>