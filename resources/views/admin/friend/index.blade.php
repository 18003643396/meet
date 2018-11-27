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
			<h3 class="box-title">友情链接列表</h3>
				<div class="search-content" style="float:right">
					<form action="/admin/friend" method="get">
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
					
					
						<button id="alldelete"class="btn btn-default"><i class='fa fa-trash-o'></i></button>  
						
						
					<!--<a id="updateOrd" href=""><i class="icon-font"></i>更新排序</a>-->
					
				</div>
		
            
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
				<table class="table table-hover">
					<tr>
						<th class="tc" width="5%"></th>
						<th>ID</th>
						<th>名称</th>
						<th>标题</th>
						<th>网址</th>
						<th>操作</th>
					</tr>
					@foreach($res as $k => $v)
					<tr>

						<td class="tc"><input name="subChk" value="{{$v->id}}" type="checkbox"></td>
						<td>{{$v->id}}</td>
						<td class='name'>{{$v->name}}</td>
						<td>{{$v->title}}</td>
						<td>{{$v->url}}</td>
						
						<td>
							<a href="/admin/friend/{{$v->id}}/edit"class='btn btn-block btn-default btn-xs'style='width: 50px;'><i class='fa fa-pencil-square-o'></i></a>&nbsp;
							<form action="/admin/friend/{{$v->id}}" method='post' style='display:inline'>
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




	//批量删除
	$('#alldelete').click(function(){
			// 判断是否至少选择一项 
			var checkedNum = $("input[name='subChk']:checked").length; 
			if(checkedNum == 0) { 
				alert("请选择至少一项！"); 
				return; 
			} 
			// 批量选择 
			if(confirm("确定要删除所选项目？")) { 
				var checkedList = new Array(); 
				$("input[name='subChk']:checked").each(function() { 
				checkedList.push($(this).val()); 
				}); 
				$(':checked').parent().parent().remove()
				$.get('/admin/frienddeleteajax',{ids:checkedList.toString()},function(data){
						
						if(data == 1){
							 alert("删除成功");
						}else{
							alert("删除失败！"); 
						}
				})
			} 
		}); 
			

</script>
@stop