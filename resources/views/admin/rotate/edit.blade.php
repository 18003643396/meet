   @extends('admin.layout.admin')
   @section('title',$title)
   @section('content')

    <div class="content-wrapper"style='margin-left:20px'>
    	<br>
    	<div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">修改轮播图信息</h3>
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
            
            <form action="/admin/rotate/{{$res->id}}"method="post"id="myform"enctype="multipart/form-data">
                <table class="insert-tab" width="100%">
                    <div class="box-body">
                        <div class="form-group"style="margin-left:50px">
                            <tbody>
                            <tr>
                                 <th><i class="require-red">*</i>标题：</th>
                                <td>
                                    <input class="common-text required" id="title" name="title" size="16" value="{{$res->title}}" type="text">
                                </td>
                             </tr>
                            <tr>
                                <th><i class="require-red">*</i>位置：</th>
                                <td>
                                    <select name="position" id="catid" class="required">
                                        <option value="">请选择</option>
                                        <option value="1"@if($res->position == 1) selected @endif}>1</option>
                                        <option value="2"@if($res->position == 2) selected @endif}>2</option>
                                        <option value="3"@if($res->position == 3) selected @endif}>3</option>
                                        <option value="4"@if($res->position == 4) selected @endif}>4</option>
                                        <option value="5"@if($res->position == 5) selected @endif}>5</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>图片：</th>
                                <td>
                                    <input name="img" id="" type="file">
                                    <img src = '{{$res -> img}}' width='200px' height="100px">
                                </td>
                            </tr>
                           
                            </tbody>    
                        </div>
                    </div>
                </table>
                
                    <div class="box-footer"style="margin-left:150px">{{csrf_field()}}
                 {{method_field('PUT')}}
                        <input type="submit" class="btn btn-primary"value='修改'>
                     
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