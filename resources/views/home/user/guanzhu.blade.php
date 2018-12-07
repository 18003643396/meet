@extends('home.user.index')

@section('content')
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
						<h1 class="post_title">
						@if($id == session('uid'))
						我的关注
						@else
						他的关注
						@endif
						</h1>
					</header>
					<div class="links">
						<h3 class="catalog-title">Life Blog</h3>
						<div class="catalog-description"></div>
						@php
							$guan = DB::table('follow')->where('user_id',$id)->count();
						@endphp
						<div class="catalog-share">{{$guan}}个关注</div>
						<div class="userItems">
							@foreach($ginfo as $k => $v)
							<div class="userItem">
								<div class="userItem--inner">
									<div class="userItem-content"><img alt='' src='{{$v->img}}' class='avatar avatar-64 photo' height='64' width='64' />
										<div class="userItem-name">
											<a class="link link--primary" href="#" target="_blank">{{$v->name}}</a>
										</div>
									</div>
								</div>
							</div>
							@endforeach
							
						</div>
					</div>
				</section>
			</div>
		</div>
@stop
		