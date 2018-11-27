   @extends('admin.layout.admin')
   @section('title',$title)
   @section('content')

    <div class="content-wrapper"style='margin-left:10px'>
    	<br>
        
    	<div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">添加轮播图</h3>
            </div>
            @if (count($errors) > 0)
            <div class="alert alert-danger alert-dismissible">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li style='font-size:14px'><i class="icon fa fa-warning"></i>&nbsp;&nbsp;&nbsp;&nbsp;{{$error}}</li>
                    @endforeach
                </ul>
              </div>
            
            @endif
            <form action="/admin/rotate"method="post"id="myform"enctype="multipart/form-data">
                <table class="insert-tab" width="100%">
                    <div class="box-body">
                        <div class="form-group"style="margin-left:50px">
                            <tbody>
                            <tr>
                                 <th><i class="require-red">*</i>标题：</th>
                                    <td>
                                    <input class="common-text required" id="title" name="title" size="16" value="" type="text">
                                    </td>
                                 </tr>
                            <tr>
                                <th><i class="require-red">*</i>位置：</th>
                                <td>
                                    <select name="position" id="catid" class="required">
                                        <option value="">请选择</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>图片：</th>
                                <td>
                                    <input name="img" id="" type="file">
                                </td>
                            </tr>
                            
                            
                            
                           
                            </tbody>    
                        </div>
                    </div>
                </table>
                {{csrf_field()}}
                    <div class="box-footer"style="margin-left:150px">
                        <input type="submit" class="btn btn-primary">&nbsp;&nbsp;&nbsp;
                     
                    </div>
            </form>
         
            </div>
        </div>
    
    </div>
     @stop
     @section('js')
<script>
    $('.alert-dismissible').delay(2000).fadeOut(2000);
</script>
@stop