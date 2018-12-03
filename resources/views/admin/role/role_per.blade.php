  @extends('admin.layout.admin')
   @section('title',$title)
   @section('content')

    <div class="content-wrapper"style='margin-left:20px'>
    	<br>
        
    	<div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">设置角色</h3>
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
            <form action="/admin/do_role_per?id={{$res->id}}"method="post"id="myform"enctype="multipart/form-data">
                <table class="insert-tab" width="100%">
                    <div class="box-body">
                        <div class="form-group"style="margin-left:50px">
                            <tbody>
                           
                            <tr>
                                <th width="30%"><i class="require-red">*</i>角色：</th>
                                <td>
                                    <b>{{$res->role_name}}</b>
                                </td>
                            </tr>
                            
                            <tr>
                                <th><i class="require-red">*</i>选择权限：</th>
                                <td>
                                    <ul style="list-style: none">
                                    @foreach($per as $k=>$v)
                                    @if(in_array($v->id,$info))
                                    <li>
                                        <label><input type="checkbox" name='per_id[]' value='{{$v->id}}' checked>{{$v->per_name}}</label>
                                    </li>
                                    @else
                                    <li>
                                        <label><input type="checkbox" name='per_id[]' value='{{$v->id}}'>{{$v->per_name}}</label>
                                    </li>
                                    @endif
                                @endforeach
                                   </ul>
                                </td>
                            </tr>
                           
                            </tbody>    
                        </div>
                    </div>
                </table>
                {{csrf_field()}}
                    <div class="box-footer"style="margin-left:280px">
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