   @extends('admin.layout.admin')
   @section('title',$title)
   @section('content')

    <div class="content-wrapper"style='margin-left:10px'>
    	<br>
        
    	<div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">添加友情链接</h3>
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
            <form action="/admin/friend"method="post"id="myform"enctype="multipart/form-data">
                <table class="insert-tab" width="100%">
                    <div class="box-body">
                        <div class="form-group"style="margin-left:50px">
                            <tbody>
                           
                            <tr>
                                <th><i class="require-red">*</i>名称：</th>
                                <td>
                                    <input class="common-text required" id="title" name="name" size="16" value="" type="text">
                                </td>
                            </tr>
                            
                            
                             <tr>
                                <th><i class="require-red">*</i>url地址：</th>
                                <td>
                                    <input class="common-text required" id="title" name="url" size="16" value="" type="text">
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