@extends('home.user.index')

@section('content')
		@php 
			 $user = DB::table('user')->where('id',$id)->first();
		@endphp
		<div id="main" class="content">
			<div class="container">
				<section class="post_content" itemscope itemtype="">
					<header class="post_header">
						<h1 class="post_title">专题</h1>
					</header>
<div class="post-Archive">
					@foreach($zhuanti as $k => $v)
					
						<div id="archives">
							@php
								$time = substr($v->time,0,-3);
							@endphp
							<div class='archive-title' id='arti-2018-3'>
								<h3>{{$time}}</h3>
								<div class='archives archives-3' data-date='2018-3'>
									<div class="brick">
										<a href="/home/user/cxiangqing?id={{$v->id}}&uid={{$user->id}}">{{$v->title}}</a>
									</div>
								</div>
							</div>
							</div>
						
				
				@endforeach
			</div>
				</section>
			</div>
		</div>
@stop			

			