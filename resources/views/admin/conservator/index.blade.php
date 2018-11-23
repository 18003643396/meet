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
			<h3 class="box-title">用户列表</h3>
				<div class="search-content" style="float:right">
					<form action="/admin/conservator" method="get">
						<table class="search-tab">
							<tbody>
								<tr>
									<th width="120">选择分类:</th>
									<td>
										<select name="search" id="">
											<option value="">全部</option>
											<option value="name" @if($search == "name") selected @endif}>用户名</option>

											<option value="email"@if($search == "email") selected @endif}>邮箱</option>
	
											<option value="tel"@if($search == "tel") selected @endif}>TEL</option>
										</select>
									</td>
									
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
					
					
						<button id="alldelete"class="btn btn-default">批量删除</button>  
						
						
					<!--<a id="updateOrd" href=""><i class="icon-font"></i>更新排序</a>-->
					
				</div>
		
            
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
				<table class="table table-hover">
					<tr>
						<th class="tc" width="5%"></th>
						<th>ID</th>
						<th>用户名</th>
						<th>邮箱</th>
						<th>TEL</th>
						<th>头像</th>
						<th>状态</th>
						<th>操作</th>
					</tr>
					@foreach($res as $k => $v)
					<tr>

						<td class="tc"><input name="subChk" value="{{$v->id}}" type="checkbox"></td>
						<td>{{$v->id}}</td>
						<td class='name'>{{$v->name}}</td>
						<td>{{$v->email}}</td>
						<td>{{$v->tel}}</td>
						<td><img src="{{$v->img}}"height="50"width="50"></img></td>

						<td>@if($v->status== 1)

                        		启用
                        	@else 
                        		禁用

                        	@endif

              
                        </td>
						<td>
							<a href="/admin/conservator/{{$v->id}}/edit"class='btn btn-block btn-default btn-xs'style='width: 50px;'><i class='fa fa-pencil-square-o'></i></a>&nbsp;
							<form action="/admin/conservator/{{$v->id}}" method='post' style='display:inline'>
                            	{{csrf_field()}}

                            	{{method_field("DELETE")}}
                            	<button class='btn btn-block btn-default btn-xs' style='width: 50px;margin-left:20px;'><i class='fa fa-user-times'></i></button>

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


	//双击用户名进行修改
	$('.name').dblclick(function(){

		//获取用户名
		var cname = $(this).text().trim();

		//创建input
		var ipu = $('<input type="text" size="16">');
		var spa = $('<span></span>');
		$(this).empty();
		$(this).append(ipu);
		$(this).append(spa);
		ipu.val(cname);
		ipu.select();
		var tds = $(this);

		//失去焦点
		ipu.blur(function(){
			//获取input框里面的值
			var uv = $(this).val();
			if(uv == ''){
				$(this).next().text(' *用户名不能为空').css('color','#e53e41');
			}
			var reg = /^\w{5,16}$/;
			
			//检测
			if(!reg.test(uv)){
				$(this).next().text(' *用户名格式不正确').css('color','#e53e41');

			} else{
			//获取id
				var ids = $(this).parent().prev().text().trim();
				
				
				$.get('/admin/conservatorajax',{uv:uv,ids:ids},function(data){

					 // console.log(data);
					if(data == 2){
						spa.text(' *用户名已存在').css('color','#e53e41');
					}
					else if(data == 1){

						//让输入框消失  但是输入框里面的值留下
						tds.text(uv);
					} else {

						tds.text(cname);
					}
				})
			}
		})
	})

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
				$.get('/admin/condeleteajax',{ids:checkedList.toString()},function(data){
						console.log(data);
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