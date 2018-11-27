   @extends('admin.layout.admin')
   @section('title',$title)
   @section('content')
<!--  {{$search = empty($_GET['search'])?null:$_GET['search']}} -->
<!--  {{$keywords = empty($_GET['keywords'])?null:$_GET['keywords']}} -->
<div class="content-wrapper"style='margin-left:10px'><br>
	@if(session('success'))
	                <div class="alert alert-success alert-dismissible">
	                    <li style='list-style:none;font-size:14px'><i class="icon fa fa-check"></i>{{session('success')}}</li>
	                </div>
	            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible">
                    <li style='list-style:none;font-size:14px'><i class="icon fa fa-warning"></i>{{session('error')}}</li>
                </div>
            @endif
	<div class="col-xs-12">
		<div class="box">

			<div class="box-header">
			<h3 class="box-title">轮播图列表</h3>
				
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
						<th>位置</th>
						<th>轮播图</th>
						<th>操作</th>
					</tr>
					@foreach($res as $k => $v)
					<tr>

						<td class="tc"><input name="subChk" value="{{$v->id}}" type="checkbox"></td>
						<td>{{$v->id}}</td>
						<td class='name'>{{$v->position}}</td>
						<td><img src="{{$v->img}}" width='200px'height='100px'></td>
						
						<td>
							<a href="/admin/rotate/{{$v->id}}/edit"class='btn btn-block btn-default btn-xs'style='width: 50px;'><i class='fa fa-pencil-square-o'></i></a>&nbsp;
							<form action="/admin/rotate/{{$v->id}}" method='post' style='display:inline'>
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
				$.get('/admin/rotatedeleteajax',{ids:checkedList.toString()},function(data){
						
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