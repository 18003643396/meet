   @extends('admin.layout.admin')
   @section('title',$title)
   @section('content')

    <div class="content-wrapper"style='margin-left:20px'>
    	<br>
    	<div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">修改用户信息</h3>
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
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible">
                    <li style='list-style:none;font-size:14px'><i class="icon fa fa-warning"></i>{{session('error')}}</li>
                </div>
            @endif
            
            <form action="/admin/user/{{$res->id}}"method="post"id="myform"enctype="multipart/form-data">
                <table class="insert-tab" width="100%">
                    <div class="box-body">
                        <div class="form-group"style="margin-left:50px">
                            <tbody>
                           
                            <tr>
                                <th><i class="require-red">*</i>用户名：</th>
                                <td>
                                    <input class="common-text required" id="title" name="name" size="16" value="{{$res->name}}" type="text">
                                </td>
                            </tr>
                            
                             <tr>
                                <th><i class="require-red">*</i>邮箱：</th>
                                <td>
                                    <input class="common-text required" id="title" name="email" size="16" value="{{$res->email}}" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>TEL：</th>
                                <td><input class="common-text" name="tel" size="16"  type="text" value='{{$res->tel}}'></td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>性别：</th>
                                <td>
                                    <label><input class="common-text required"  name="sex" value="0" type="radio"@if($res->sex== 0)
                                        checked
                                        @endif
                                        >&nbsp;女</label>
                                    <label><input class="common-text required"  name="sex" value="1" type="radio"@if($res->sex== 1) checked @endif>&nbsp;男</label>
                                    <label><input class="common-text required"  name="sex" value="2" type="radio"@if($res->sex== 2) checked @endif>&nbsp;保密</label>
                                </td>
                            </tr>
                            
                            <tr>
                                <th><i class="require-red">*</i>更改头像：</th>
                                <td><input name="img" id="" type="file"><img src="{{$res->img}}"height="50"width="50"></img></td>
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