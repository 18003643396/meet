@extends('home.user.index')

@section('content')
		@php 
			 $user = DB::table('user')->where('id',$id)->first();
		@endphp
		<div id="main" class="content"> 
			
			<div class="container">
				<article itemscope="itemscope">
					<div class="posts-list js-posts">
						@foreach($cinfo as $k => $v)
						
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
												<a href="/home/user/cxiangqing?id={{$v->id}}&uid={{$user->id}}" rel="bookmark">{{$v->title}}</a>
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
										<a class="gaz-btn primary" href="/home/user/cxiangqing?id={{$v->id}}&uid={{$user->id}}">READ MORE</a>
										
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
											<a href="/home/user/cxiangqing?id={{$v->id}}&uid={{$user->id}}">{{$v->title}}</a>
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
										<a href="/home/user/cxiangqing?id={{$v->id}}&uid={{$user->id}}" class="status_btn">{{$v->title}}</a>
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
@stop			

			