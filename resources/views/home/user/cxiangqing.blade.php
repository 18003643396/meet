@extends('home.user.index')

@section('content')
		
		<div id="main" class="content">
			<div class="container">
				<article id="post-1202" class="js-gallery post-1202 post type-post status-publish format-standard has-post-thumbnail hentry category-uncategorized tag-11 tag-22 tag-29">
					<style>
						.container {
							padding: 10px 0px;
						}
						
						.post {
							margin: 0 auto
						}
					</style>
					
					<section class="post_content">
						<header class="post_header">
							<h1 class="post_title">{{$articless->title}}</h1>
						</header>
						<div class="post-body js-gallery">
							{!! $articless->content !!}
							
						</div>
						<div class="meta split split--responsive cf">
							<div class="split__title">
								<time datetime="{{$articless->time}}">{{$articless->time}}</time>
								<span class=""><a  rel="tag">主题</a><a rel="tag">日常</a><a  rel="tag">更新</a> </span>
							</div>
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
				<div class="comment-area">
					<section class="comments">
						<div class="comments-main">
							<div id="comments-list-title"></div>
							<div id="loading-comments">
								<div class="host">
									<div class="loading loading-0"></div>
									<div class="loading loading-1"></div>
									<div class="loading loading-2"></div>
								</div>
							</div>
							 @foreach($comment as $k => $v)
							<ul class="commentwrap">
								<li class="comment even thread-even depth-1" id="li-comment-">
									<div id="comment-969" class="comment_body contents">
										<div class="profile">
											<a href=""><img src="{{$v->img}}" class="gravatar" alt="小布丁"></a>
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
												<span><a  class='comment-reply-link' aria-label='回复给{{$v->name}}'style="cursor: pointer;">回复</a></span>
											</div>
											
											<div id="reply" hidden>
												<h6 id="replytitle" class="comment-reply-title"><a class="cancel-comment-reply-link"style="float: right;cursor: pointer;">取消</a></h6>
											<form action="/home/user/userreply?cid={{$v->id}}" method="post" id="commentform" class="clearfix">
												<div class="comment-form-info">
													{{csrf_field()}}
													<p class="input-row">
														<input type="text" name="content"style="border-radius:10px;border: 1px solid #ccc;height: 40px;width: 600px;">
														<input type="submit" name="submit" class="button" id="submit" tabindex="5" value="发送" style="float: right;"/>
													</p>
												</div>
											</form>
											</div>
											@foreach($reply as $kk => $vv)
						                      @if($vv->comment_id == $v->id)
						                        <div class="all-pl-con"style="background: #eee;border-radius: 5px;">
						                          <div class="pl-text hfpl-text clearfix"style="font-size: 13px;margin:10px 5px; ">
						                            <a href="#" class="comment-size-name"style="color:#333">{{$vv->name}}: </a>
						                            <span class="my-pl-con">回复
						                              <a href="#" class="atName"style="color:#333">{{@$v->name}}</a>:{{$vv->content}}</span>
						                          </div>
						                              <div class="date-dz"style="font-size: 12px;margin-left: 10px;">
						                               <span class="date-dz-left pull-left comment-time">{{$vv->time}}</span>
						          
						                           </div>
						                        </div>
						                        @endif
						                      @endforeach
										</div>
									</div>
								</li>
								<!-- #comment-## -->
							</ul>
						
							 @endforeach
							 @php
							$uuser = DB::table('user')->where('id',session('uid'))->first(); 
					  		 @endphp
							<!-- <nav id="comments-navi">
								<a class="prev page-numbers" href="">
									<</a>
										<a class='page-numbers' href="">1</a>
										<a class='page-numbers' href="">2</a>
										<a class='page-numbers' href="">3</a>
										<span aria-current='page' class='page-numbers current'>4</span></nav> -->
							<div id="respond" class="comment-respond">
								<h6 id="replytitle" class="comment-reply-title"><a rel="nofollow" id="cancel-comment-reply-link" href="" style="display:none;">取消</a></h6>
								<form action="/home/user/usercomment?aid={{$articless->id}}" method="post" id="commentform" class="clearfix">
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

		<div class="p-header">
			<figure class="p-image" style="background-image: url(statics/images/47fb3c_9afed6c259f94589881bd55376206366mv2_d_3840_5784_s_4_2.jpg);"></figure>
		</div>
		

		
			<script type="text/javascript">
				window.onscroll = function() {
					var scrollTop = document.body.scrollTop;
					if(scrollTop >= 200) {
						document.getElementById("NextPrevPosts").style.display = "none"
					} else {
						document.getElementById("NextPrevPosts").style.display = "block"
					}
				}
			</script>
			<script type="text/javascript">
				// alert($);
				$(".comment-reply-link").click(function(){
	
					$(this).parent().parent().next().attr('hidden',false);
				});
				$('.cancel-comment-reply-link').click(function(){
					$(this).parent().parent().attr('hidden',true);
				});
				
			</script>
			@stop			
