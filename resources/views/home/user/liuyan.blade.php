@extends('home.user.index')

@section('content')
		<div id="main" class="content">
			<div class="container">
				<article id="post-2" class="js-gallery post-2 page type-page status-publish has-post-thumbnail hentry">
					<style>
						.meta {
							display: none;
						}
						
						#NextPrevPosts {
							margin: 0;
							visibility: hidden;
						}
					</style>
					<section class="post_content">
						<header class="post_header">
							<h1 class="post_title">街坊留言</h1>
						</header>

						<div class="meta split split--responsive cf" style="display: block;">
							
							<div id="social-share"><span class="entypo-share"><i class="iconfont">&#xe614;</i>分享</span></div>
							<div class="slide">
								<a class="btn-slide" title="switch down"><i class="iconfont">&#xe615;</i>折叠评论区</a>
							</div>
						</div>
					</section>
				</article>
			</div>
			<svg id="upTriangleColor" width="100%" height="40" viewBox="0 0 100 102" preserveAspectRatio="none">
				<path d="M0 0 L50 100 L100 0 Z"></path>
			</svg>
			<div id="social">
				<ul>
					<li>
						<a href="" title="qzone" target="_blank"><i class="iconfont">&#xe67f;</i></a>
					</li>
					<li>
						<a href="" title="weibo" target="_blank"><i class="iconfont">&#xe680;</i></a>
					</li>
					<li>
						<a href="" title="douban" target="_blank"><i class="iconfont">&#xe681;</i></a>
					</li>
					<li>
						<a href="" title="twitter" target="_blank"><i class="iconfont">&#xe683;</i></a>
					</li>
				</ul>
			</div>
			<div id="panel">
				@php
							$liuy = DB::table('message')->where('user_id',$id)->count();
						@endphp
				<div class="comment-area">
					<section class="comments">
						<div class="comments-main">
							<div id="comments-list-title"><span>{{$liuy}}</span> 条留言 </div>
							<div id="loading-comments">
								<div class="host">
									<div class="loading loading-0"></div>
									<div class="loading loading-1"></div>
									<div class="loading loading-2"></div>
								</div>
							</div>
							<ul class="commentwrap">
								@foreach($message as $k => $v)
								<li class="comment even thread-even depth-1" id="li-comment-">
									<div id="comment-936" class="comment_body contents">
										<div class="profile">
											<a href=""><img src="{{$v->img}}" class="gravatar" alt="沺"></a>
										</div>
										<div class="main shadow">
											<div class="commentinfo">
												<section class="commeta">
													<div class="shang">
														<h4 class="author"><a href="" target="_blank"><img src="{{$v->img}}" class="gravatarsmall" alt="{{$v->name}}">{{$v->name}}</a></h4>
													</div>
												</section>
											</div>
											<div class="body">
												<p>{{$v->content}}</p>
											</div>
											<div class="xia info">
												<span><time datetime="{{$v->time}}">{{$v->time}}</time></span>
											</div>
										</div>
									</div>
								</li>
								@endforeach
							</ul>
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
							<!-- <nav id="comments-navi"style="float: right;"> -->
								
								<div style="float: right;">{{$message->links()}}</div>
								
									<!-- </nav> -->
						 	@php
							$uuser = DB::table('user')->where('id',session('uid'))->first(); 
					  		 @endphp
							<div id="respond" class="comment-respond">
								<h6 id="replytitle" class="comment-reply-title"><a rel="nofollow" id="cancel-comment-reply-link" href="" style="display:none;">取消</a></h6>
								<form action="/home/user/message?uid={{$id}}" method="post" id="commentform" class="clearfix">
									<div class="clearfix"></div>
									
									<div class="clearfix"></div>
									<div class="comment-form-info">
										<div class="real-time-gravatar"> <img id="real-time-gravatar" src="{{$uuser->img}}" alt="gravatar头像" />
										</div>
										{{csrf_field()}}
										<p class="input-row">
											<i class="row-icon"></i>
											<textarea class="text_area" rows="3" cols="80" name="content" id="comment" tabindex="4" placeholder="你不说两句吗？(°∀°)ﾉ……"></textarea>
											<input type="submit" name="submit" class="button" id="submit" tabindex="5" value="发送" />
										</p>
									</div>
								</form>
							</div>
						</div>
					</section>
				</div>
			</div>
			<svg id="dwTriangleColor" width="100%" height="40" viewBox="0 0 100 102" preserveAspectRatio="none">
				<path d="M0 0 L50 100 L100 0 Z"></path>
			</svg>
			<div class="wrapper">
			</div>
		</div>

		@stop	