   @extends('admin.layout.admin')
   @section('title',$title)
   @section('content')
<!--  {{$search = empty($_GET['search'])?null:$_GET['search']}} -->
<!--  {{$keywords = empty($_GET['keywords'])?null:$_GET['keywords']}} -->
<div class="content-wrapper"style='margin-left:10px'><br>
	

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible">
                    <li style='list-style:none;font-size:14px'><i class="icon fa fa-warning"></i>{{session('error')}}</li>
                </div>
            @endif
	<div class="col-xs-12">
		<div class="box">

			<div class="box-header">
			<h3 class="box-title">文章列表</h3>
				<div class="search-content" style="float:right">
					<form action="/admin/article" method="get">
						<table class="search-tab">
							<tbody>
								<tr>
									
									
									<td><input class="common-text" 
										@if ($keywords == null)
											placeholder="请输入关键字"
										@else 
											placeholder="{{$keywords}}"
										@endif


										 name="keywords" value="" id="" type="text"></td>
									<td>
										<button class='btn btn-block btn-default btn-xs' ><i class='fa  fa-search'></i></button>
									</td>
								</tr>
							</tbody>
						</table>
					</form>
				</div>
			<!--<div class="result-title">-->
				<div class="result-list"style="margin-top:20px;">
					
					
				
						
					<!--<a id="updateOrd" href=""><i class="icon-font"></i>更新排序</a>-->
					
				</div>
		
            
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
				<table class="table table-hover">
					<tr>
						
						<th>ID</th>
						<th>标题</th>
						<th>作者</th>
						<th>时间</th>
						<th>操作</th>
					</tr>
					@foreach($res as $k => $v)
					<tr>
						
						<td>{{$v->id}}</td>
						<td>{{$v->title}}</td>
						<td>{{$v->user_name}}</td>
						<td>{{$v->time}}</td>

						
						<td>	
							<a href="/admin/article/look/{{$v->id}}"class='btn btn-block btn-default btn-xs'style='width: 80px;'>查看文章</a>&nbsp;
							<form action="/admin/article/delete/{{$v->id}}" method='post' style='display:inline'>
                            	{{csrf_field()}}

                            	{{method_field("DELETE")}}
                            	<button class='btn btn-block btn-default btn-xs' style='width: 50px;margin-left:20px;'><i class='fa fa-remove'></i></button>

                            </form>
                        </td>

					</tr>
					@endforeach
				</table>
				
            </div>
			<center>
			
			{{$res->links()}}
			
			</center>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

	</div>
	{{session('error')}}
 @stop
  @section('js')
<script>
    $('.alert-dismissible').delay(2000).fadeOut(2000);

</script>
@stop