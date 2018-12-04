@extends('home.user.index')

@section('content')
		<div id="main" class="content">
			<div class="container">
				<section class="post_content" itemscope itemtype="">
					<header class="post_header">
						<h1 class="post_title">动态</h1>
					</header>
				 
					@foreach($dongtai as $k => $v)
					<div class="post-Archive">
						<div id="archives">
							@php
								$time = substr($v->time,0,-3);
							@endphp
							<div class='archive-title' id='arti-2018-3'>
								<h3>{{$time}}</h3>
								<div class='archives archives-3' data-date='2018-3'>
									<div class="brick">
										<a href="/home/user/xiangqing?id={{$v->id}}">{{$v->title}}<span>(0)</span></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</section>
				</div>
			</div>
@stop			

			