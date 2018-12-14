@extends('home.user.index')

@section('content')
		@php 
			 $user = DB::table('user')->where('id',$id)->first();

		@endphp
		<div id="main" class="content">

			<div class="container">

				<h1 class="page-title">以&ldquo;{{$keywords}}&rdquo;为关键字</h1>

				<p class="Searchmeta">共计{{$count}}篇文章</p>

				<div class="location">当前位置：
					首页 &raquo; 搜索结果 &raquo; {{$keywords}}
				</div>
				@foreach ($ainfo as $k=>$v)
				<div class="posts-list js-posts">

					<div class="archive-post">

						<div class="type">
							<div class="mask"><i class="iconfont">&#xe603;</i></div>
						</div>

						<h2 class="archive-title" style="color: #">

					<span>
					
					<a href="/home/user/xiangqing?id={{$v->id}}&uid={{$user->id}}">{{$v->title}}</a>
					
					</span>
					
					<div class="post-time">{{$v->time}}</div>

				</h2>


					</div>

				</div>
				@endforeach
				
				<div class="mt+">
					<div class="pagination js-pagination">

						<div class="js-next pagination__load"></div>

					</div>
				</div>

			</div>
		</div>
	@stop	
	