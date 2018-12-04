<!doctype html>
<html lang="zh">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<title>个人中心</title>
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" type="text/css" href="/homes/statics/css/index.css" media="all" />
		
		

	</head>

	<body class="home blog custom-background round-avatars">
		@php 
			 $user = DB::table('user')->where('id',session('uid'))->first();
		@endphp
		<div class="Yarn_Background" style="background-image: url({{$user->background}});"></div>
		<form class="js-search search-form search-form--modal" method="get" action="/home/user/search" role="search">
			<div class="search-form__inner">
				<div>
					<div id="search-container" class="ajax_search">
						<form method="get" id="searchform" action="">
							<div class="filter_container"><input type="text" value="" autocomplete="off" placeholder="Type then select or enter" name="s" id="search-input" />
								<ul id="search_filtered" class="search_filtered"></ul>
							</div>
							<input type="submit" name="submit" id="searchsubmit" class="searchsubmit" value="" />
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
									<li id="menu-item-78" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-78">
										<a href="/home/user/guanzhu">关注</a>
									</li>
									<li id="menu-item-252" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-252">
										<a href="">归档</a>
										<ul class="sub-menu">
											<li id="menu-item-165" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-165">
												<a href="/home/user/huati">我的话题</a>
											</li>
											<li id="menu-item-163" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-163">
												<a href="/home/user/zhuanti">我的专题</a>
											</li>
											<li id="menu-item-924" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-924">
												<a href="/home/user/dongtai">我的动态</a>
											</li>
											
										</ul>
									</li>

									<li id="menu-item-173" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-173">
										<a href="/home/user/shijianzhou">时间轴</a>
									</li>
									
									
									<li id="menu-item-57" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-57">
										<a href="/home/user/liuyan">留言版</a>
									</li>
									<li id="menu-item-57" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-57">
										<a href="/home/user/info">个人设置</a>
									</li>
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
			<div class="site-branding text-center">
				<a href="">
					<figure>
						<img class="custom-logo avatar" src="{{$user->img}}" />
					</figure>
				</a>
				<h3 class="blog-description"style="margin-bottom:5px; "><p>{{$user->name}}</p></h3>
				<h4 class="blog-description"style="margin-top:5px; "><p>关注： 0&nbsp;    粉丝：0</p></h4>
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
						<div class="post post-layout-list" data-aos="fade-up">
							<div class="status_list_item icon_kyubo">
								<div class="status_user" style="background-image: url(/homes/statics/images/b0ce3f3cde0c084b6d42321b2dcbc407.jpeg);">
									<div class="status_section">
										<a href="/home/user/xiangqing?id={{$v->id}}" class="status_btn">{{$v->title}}</a>
										<p class="section_p">{{strip_tags( str_limit($v->content,200) )}}&hellip;</p>
									</div>
								</div>
							</div>
						</div>
						@endforeach
						<div class="post post-layout-list" data-aos="fade-up">
							<div class="postnormal review ">
								<div class="post-container review-item">
									<div class="row review-item-wrapper">
										<div class="col-sm-3">
											<a rel="nofollow" href="detail.html">
												<div class="review-item-img" style="background-image: url(/homes/statics/images/diego-ph-249471-2-800x1000.jpg);"></div>
											</a>
										</div>
										<div class="col-sm-9 flex-xs-middle">
											<div class="review-item-title">
												<a href="detail.html" rel="bookmark">我才不会写年终总结之瞎说篇</a>
											</div>
											<div class="review-item-creator"><b>发布日期：</b>2017-12-30</div>
											<span class="review-item-info"><b>总浏览量：</b>1203 reads</span>
										</div>
									</div>
									<div class="review-bg-wrapper">
										<div class="bg-blur" style="background-image: url(/homes/statics/images/diego-ph-249471-2-800x1000.jpg);"></div>
									</div>
								</div>
								<div class="post-container">
									<div class="entry-content">确实讨厌去写所谓的年终总结，在公司已经被动的想领导上交一个总结，自己就懒得去总结，不然，我觉得脑子里应该会编写出八九不离十的内容，所以正经八儿的事情略了，瞎说一下。 年初的人事调动是个人最不能接受的事情，但不接受也得接受，老板一句“这是命令...</div>
									<div class="post-footer">
										<a class="gaz-btn primary" href="">READ MORE</a>
										<span class="total-comments-on-post pull-right"><a href="">31 Comments</a></span>
									</div>
								</div>
							</div>
						</div>
						<div class="post post-layout-list" data-aos="fade-up">
							<div class="status_list_item icon_kyubo">
								<div class="status_user" style="background-image: url(/homes/statics/images/b0ce3f3cde0c084b6d42321b2dcbc407.jpeg);">
									<div class="status_section">
										<a href="detail.html" class="status_btn">状态</a>
										<p class="section_p">因为我这后半年飘忽不定的更新节奏，感觉真的对不住用户。最近才松下来能处理反馈的bug，顺便加快新主题 Dcras 的制作，农历年后或许能上线，准确时间，不敢说-- 为了感谢大家对 Yarn 的支持，Dcras 会以 获兑现码半价的承诺 给 Yarn ... </p>
									</div>
								</div>
							</div>
						</div>
						<div class="post post-layout-list js-gallery" data-aos="fade-up">
							<div class="post-album">
								<div class="row content">
									<div class="bg" style="background-image: url(/homes/statics/images/IMG_0150.jpg);"></div>
									<div class="contentext flex-xs-middle">
										<div class="album-title">
											<a href="detail.html">重构图像样式测试</a>
										</div>
										<h5 class="review-item-creator"><b>发布日期：</b>2017-11-13</h5>
										<div class="album-content">如眼所见是一个图像样式，必须写五十左右的文字作为这个文本框的空白填充，不写也是可以的，强迫症不能容忍空白。</div>
									</div>
									<div class="album-thumb-width flex-xs-middle">
										<div class="row album-thumb no-gutter">
											<div class="col-xs-4"><img class="thumb" src="statics/images/IMG_0150-250x250.jpg" /></div>
											<div class="col-xs-4"><img class="thumb" src="statics/images/IMG_0149-250x250.jpg" /></div>
											<div class="col-xs-4"><img class="thumb" src="statics/images/IMG_0146-250x250.jpg" /></div>
											<div class="col-xs-4"><img class="thumb" src="statics/images/IMG_0147-250x250.jpg" /></div>
											<div class="col-xs-4"><img class="thumb" src="statics/images/IMG_0148-250x250.jpg" /></div>
											<div class="col-xs-4">
												<a href="">5 pics</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="post post-layout-list" data-aos="fade-up">
							<div class="postnormal review ">
								<div class="post-container review-item">
									<div class="row review-item-wrapper">
										<div class="col-sm-3">
											<a rel="nofollow" href="detail.html">
												<div class="review-item-img" style="background-image: url(statics/images/47fb3c_9afed6c259f94589881bd55376206366mv2_d_3840_5784_s_4_2-800x450.jpg);"></div>
											</a>
										</div>
										<div class="col-sm-9 flex-xs-middle">
											<div class="review-item-title">
												<a href="detail.html" rel="bookmark">给大家介绍一下</a>
											</div>
											<div class="review-item-creator"><b>发布日期：</b>2017-10-02</div>
											<span class="review-item-info"><b>总浏览量：</b>1600 reads</span>
										</div>
									</div>
									<div class="review-bg-wrapper">
										<div class="bg-blur" style="background-image: url(statics/images/47fb3c_9afed6c259f94589881bd55376206366mv2_d_3840_5784_s_4_2-800x450.jpg);"></div>
									</div>
								</div>
								<div class="post-container">
									<div class="entry-content">现在的明星的影响力足以影响国内娱乐圈的"半壁江山"，发条微博，新浪都恐慌好几天，来来来，蹭个热点给大家介绍一下我的女朋友。</div>
									<div class="post-footer">
										<a class="gaz-btn primary" href="detail.html">READ MORE</a>
										<span class="total-comments-on-post pull-right"><a href="">30 Comments</a></span>
									</div>
								</div>
							</div>
						</div>
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
					<div class="wechatimg"><img src="statics/images/49D3746D-7519-B709-83E4-65BD1927C4E7.jpg"></div>
				</li>
				<li>
					<a title="QQ" class="socialicon" href="" target="_blank"><i class="iconfont" aria-hidden="true">&#xe616;</i></a>
				</li>
			</div>
			<div class="cr">
				Copyright&copy;2018. Design by
				<a href="">17sucai</a>
			</div>
			<script type='text/javascript' src='/homes/statics/js/jquery.min.js'></script>
			<script type='text/javascript' src='/homes/statics/js/plugins.js'></script>
			<script type='text/javascript' src='/homes/statics/js/script.js'></script>
			<script type='text/javascript' src='/homes/statics/js/particles.js'></script>
			<script type='text/javascript' src='/homes/statics/js/aos.js'></script>
			<script type='text/javascript' src='/homes/statics/js/prism.js'></script>
			<script type='text/javascript' src='/homes/statics/js/gravatar.js'></script>
			<script type='text/javascript' src='/homes/statics/js/comments-ajax.js'></script>
			<script type='text/javascript' src='/homes/statics/js/form.js'></script>

	</body>

</html>