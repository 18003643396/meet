<!doctype html>
<html lang="zh">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<title>个人中心</title>
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" type="text/css" href="/homes/statics/css/index.css" media="all" /><script type='text/javascript' src='/homes/statics/js/jquery.min.js'></script>
		
		

	</head>

	<body class="home blog custom-background round-avatars">
		@php 
			 $user = DB::table('user')->where('id',$id)->first();
		@endphp
		<div class="Yarn_Background" style="background-image: url({{$user->background}});"></div>
		<form class="js-search search-form search-form--modal" method="post" action="/home/user/search?id={{$user->id}}" role="search">
			<div class="search-form__inner">
				<div>
					<div id="search-container" class="ajax_search">
						<form method="post" id="searchform" action="/home/user/search?id={{$user->id}}">
							<div class="filter_container">
								<input type="text" value="" autocomplete="off" placeholder="Type then select or enter" name="keywords" id="search-input" />
								<ul id="search_filtered" class="search_filtered"></ul>
							</div>
							 {{csrf_field()}}
							<input type="submit"  id="searchsubmit" class="searchsubmit" value="" />
						</form>
					</div>
				</div>
			</div>
		</form>
		<div class="navi" data-aos="fade-down">
			<div class="bt-nav">
				<div class="line line1"></div>
				<div class="line line2"></div>
				<div class="line line3"></div>
			</div>
			<div class="navbar animated fadeInRight">
				<div class="inner">
					<nav id="site-navigation" class="main-navigation">
						<div id="main-menu" class="main-menu-container">
							<div class="menu-menu-container">
								<ul id="primary-menu" class="menu">
									<li id="menu-item-17" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-17">
										<a href="/">首页</a>
									</li>
									<li id="menu-item-173" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-173">
										<a href="/home/user?id={{$user->id}}">主页</a>
									</li>
									
									<li id="menu-item-78" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-78">
										<a href="/home/user/guanzhu?id={{$user->id}}">
										@if($id == session('uid'))	
										关注
										@else
										他的关注
										@endif
										</a>
									</li>
									

									<li id="menu-item-252" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-252">
										<a href="">归档</a>
										<ul class="sub-menu">
											<li id="menu-item-165" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-165">
												<a href="/home/user/huati?id={{$user->id}}">话题</a>
											</li>
											<li id="menu-item-163" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-163">
												<a href="/home/user/zhuanti?id={{$user->id}}">专题</a>
											</li>
											<li id="menu-item-924" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-924">
												<a href="/home/user/dongtai?id={{$user->id}}">动态</a>
											</li>
											
										</ul>
									</li>
									<li id="menu-item-173" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-173">
										<a href="/home/user/collect?id={{$user->id}}">收藏</a>
									</li>
									<li id="menu-item-173" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-173">
										<a href="/home/user/shijianzhou?id={{$user->id}}">时间轴</a>
									</li>
									
									
									<li id="menu-item-57" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-57">
										<a href="/home/user/liuyan/{{$user->id}}">留言版</a>
									</li>
									@if($id == session('uid'))
									<li id="menu-item-57" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-57">
										<a href="/home/user/info">个人设置</a>
									</li>
									@endif
								</ul>
							</div>
						</div>
					</nav>
					<!-- #site-navigation -->
				</div>
			</div>
		</div>
		
		<div class="hebin" data-aos="fade-down">
			<i class=" js-toggle-search iconfont">&#xe60e;</i>
		</div>
		<header id="masthead" class="overlay animated from-bottom" itemprop="brand">
			<div class="site-branding text-center"style="padding-top: 80px;">
				<a href="">
					<figure>
						<img class="custom-logo avatar" src="{{$user->img}}" />
					</figure>
				</a>
				<h3 class="blog-description"style="margin-bottom:5px; "><p>{{$user->name}}</p>@if($id != session('uid'))
				@php
					$res = DB::table('follow')->where('user_id',session('uid'))->where('followuser_id',$id)->first();
				@endphp
				<button id="guanzhu"style="cursor: pointer;background: url(/homes/statics/images/operatenew24.png) no-repeat;
				@if($res)
				background-position: -2px -544px;
				@else
				background-position: 0 -121px;
				@endif
				width: 70px; "name="{{$id}}"><p style="color: #fff;margin-left: 10px;font-size:14px;"id='wenzi'>
				
				@if($res)
				  已关注
				 @else
				 关&nbsp;注
				 @endif
				</p></button>
				<script type="text/javascript">
					$('#guanzhu').click(function(){
						var id = $(this).attr('name');
						$.get('/home/user/jiaguanzhu',{id:id},function(data){
							console.log(data);
							if(data == 1){
								$('#wenzi').text('已关注');
								$('#guanzhu').css('background-position','-2px -544px');
							}else if(data == 3){
								$('#wenzi').html('关&nbsp;注');
								$('#guanzhu').css('background-position','0 -121px');
							}else if(data == 2){
								alert('关注失败!');
							}else{
								alert('取消关注失败！');
							}
						})
					})
				</script>
				@endif</h3>
				@php
					$guan = DB::table('follow')->where('user_id',$id)->count();
					$fen = DB::table('follow')->where('followuser_id',$id)->count();
				@endphp
				<h4 class="blog-description"style="margin-top:5px; "><p>关注：{{$guan}}&nbsp;    粉丝：{{$fen}}</p></h4>
				
			</div>
			<!-- .site-branding -->
			<div class="decor-part">
				<div id="particles-js"></div>
			</div>
			<div class="animation-header">
				<div class="decor-wrapper">
					<svg id="header-decor" class="decor bottom" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 100 100" preserveAspectRatio="none">
						<path class="large left" d="M0 0 L50 50 L0 100" fill="rgba(255,255,255, .1)"></path>
						<path class="large right" d="M100 0 L50 50 L100 100" fill="rgba(255,255,255, .1)"></path>
						<path class="medium left" d="M0 100 L50 50 L0 33.3" fill="rgba(255,255,255, .3)"></path>
						<path class="medium right" d="M100 100 L50 50 L100 33.3" fill="rgba(255,255,255, .3)"></path>
						<path class="small left" d="M0 100 L50 50 L0 66.6" fill="rgba(255,255,255, .5)"></path>
						<path class="small right" d="M100 100 L50 50 L100 66.6" fill="rgba(255,255,255, .5)"></path>
						<path d="M0 99.9 L50 49.9 L100 99.9 L0 99.9" fill="rgba(255,255,255, 1)"></path>
						<path d="M48 52 L50 49 L52 52 L48 52" fill="rgba(255,255,255, 1)"></path>
					</svg>
				</div>
			</div>
		</header>
		 

      @section('content')

		<div id="main" class="content"> 
			
			<div class="container">
				<article itemscope="itemscope">
					<div class="posts-list js-posts">
						@foreach($article as $k => $v)
						
						@if($v->subject_id != null)
						<!-- 专题 -->
						<div class="post post-layout-list" data-aos="fade-up">
							<div class="postnormal review ">
								<div class="post-container review-item">
									<div class="row review-item-wrapper">
										<div class="col-sm-3">
											<a rel="nofollow">
												<div class="review-item-img" style="background-image: url(/homes/statics/images/diego-ph-249471-2-800x1000.jpg);"></div>
											</a>
										</div>
										<div class="col-sm-9 flex-xs-middle">
											<div class="review-item-title">
												<a href="/home/user/xiangqing?id={{$v->id}}&uid={{$user->id}}" rel="bookmark">{{$v->title}}</a>
											</div>
											<div class="review-item-creator"><b>发布日期：</b>{{$v->time}}</div>
											<span class="review-item-info"><b>总浏览量：</b>{{$v->count}} reads</span>
										</div>
									</div>
									<div class="review-bg-wrapper">
										<div class="bg-blur" style="background-image: url(/homes/statics/images/diego-ph-249471-2-800x1000.jpg);"></div>
									</div>
								</div>
								<div class="post-container">
									<div class="entry-content">{{strip_tags( str_limit($v->content,200) )}}&hellip;</div>
									<div class="post-footer">
										<a class="gaz-btn primary" href="/home/user/xiangqing?id={{$v->id}}&uid={{$user->id}}">READ MORE</a>
										
									</div>
								</div>
							</div>
						</div>
						@elseif($v->cate_id != null )
						<!-- 话题 -->
						<div class="post post-layout-list js-gallery" data-aos="fade-up">
							<div class="post-album">
								<div class="row content">
									<div class="bg" style="background-image: url(/homes/statics/images/IMG_0150.jpg);"></div>
									<div class="contentext flex-xs-middle">
										<div class="album-title">
											<a href="/home/user/xiangqing?id={{$v->id}}&uid={{$user->id}}">{{$v->title}}</a>
										</div>
										<h5 class="review-item-creator"><b>发布日期：</b>{{$v->time}}</h5>
										<div class="album-content">{{strip_tags( str_limit($v->content,200) )}}&hellip;</div>
									</div>
									<div class="album-thumb-width flex-xs-middle">
										<div class="row album-thumb no-gutter">
											
										</div>
									</div>
								</div>
							</div>
						</div>
						@else
						<!-- 文章 -->
						<div class="post post-layout-list" data-aos="fade-up">
							<div class="status_list_item icon_kyubo">
								<div class="status_user" style="background-image: url(/homes/statics/images/b0ce3f3cde0c084b6d42321b2dcbc407.jpeg);">
									<div class="status_section">
										<a href="/home/user/xiangqing?id={{$v->id}}&uid={{$user->id}}" class="status_btn">{{$v->title}}</a>
										<p class="section_p">{{strip_tags( str_limit($v->content,200) )}}&hellip;</p>
									</div>
								</div>
							</div>
						</div>
						<!-- 专题 -->
						@endif
						
						@endforeach
						
						
					</div>
					<!-- post-formats end Infinite Scroll star -->
					<!-- post-formats -->
					<div class="pagination js-pagination">
						<div class="js-next pagination__load">
							<a href=""><i class="iconfont">&#xe605;</i></a>
						</div>
					</div>
					<!-- -pagination  -->
			</div>
		</div>
			@show
		<footer id="footer" class="overlay animated from-top">
			<div class="decor-wrapper">
				<svg id="footer-decor" class="decor top" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 100 100" preserveAspectRatio="none">
					<path class="large left" d="M0 0 L50 50 L0 100" fill="rgba(255,255,255, .1)"></path>
					<path class="large right" d="M100 0 L50 50 L100 100" fill="rgba(255,255,255, .1)"></path>
					<path class="medium left" d="M0 0 L50 50 L0 66.6" fill="rgba(255,255,255, .3)"></path>
					<path class="medium right" d="M100 0 L50 50 L100 66.6" fill="rgba(255,255,255, .3)"></path>
					<path class="small left" d="M0 0 L50 50 L0 33.3" fill="rgba(255,255,255, .5)"></path>
					<path class="small right" d="M100 0 L50 50 L100 33.3" fill="rgba(255,255,255, .5)"></path>
					<path d="M0 0 L50 50 L100 0 L0 0" fill="rgba(255,255,255, 1)"></path>
					<path d="M48 48 L50 51 L52 48 L48 48" fill="rgba(255,255,255, 1)"></path>
				</svg>
			</div>
			<div class="socialize" data-aos="zoom-in">
				<li>
					<a title="weibo" class="socialicon" href=""><i class="iconfont" aria-hidden="true">&#xe601;</i></a>
				</li>
				<li class="wechat">
					<a class="socialicon"><i class="iconfont">&#xe609;</i></a>
					<div class="wechatimg"><img src=""></div>
				</li>
				<li>
					<a title="QQ" class="socialicon" href="" target="_blank"><i class="iconfont" aria-hidden="true">&#xe616;</i></a>
				</li>
			</div>
			<div class="cr">
				Copyright&copy;2018. Design by
				<a href="">17sucai</a>
			</div>
			
			<script type='text/javascript' src='/homes/statics/js/plugins.js'></script>
			<script type='text/javascript' src='/homes/statics/js/script.js'></script>
			<script type='text/javascript' src='/homes/statics/js/particles.js'></script>
			<script type='text/javascript' src='/homes/statics/js/aos.js'></script>
			<script type='text/javascript' src='/homes/statics/js/prism.js'></script>
			<script type='text/javascript' src='/homes/statics/js/gravatar.js'></script>
			<!-- <script type='text/javascript' src='/homes/statics/js/comments-ajax.js'></script> -->
			<!-- <script type='text/javascript' src='/homes/statics/js/form.js'></script> -->

	</body>

</html>