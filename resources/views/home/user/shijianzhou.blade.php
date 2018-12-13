@extends('home.user.index')

@section('content')
		@php 
			 $user = DB::table('user')->where('id',$id)->first();
		@endphp
		<div id="main" class="content">
			<div class="container">
				<style>
					body.custom-background {
						background: #fff
					}
					
					.container {
						padding: 10px 0px;
					}
				</style>
				<section class="post_content">
					<header class="post_header">
						<h1 class="post_title">时间轴</h1>
					</header>
					<div class="applicant__timeline">
						<ul>
							@foreach($article as $k=>$v)
							<li>
								<div><a href="/home/user/xiangqing?id={{$v->id}}&uid={{$user->id}}"style="color:#999;">{{$v->title}}</a><br /><span class="time-ago">{{$v->time}}</span></div>
							</li>
							@endforeach
							
						</ul>
					</div>
				</section>
			</div>
		</div>

@stop			
		