      @extends('admin.layout.admin')
   @section('title',$title)
   @section('content')

    <div class="content-wrapper"style='margin-left:10px'>
      <br>
        
      <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">修改密码</h3>
            </div>
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
            @if (count($errors) > 0)
            <div class="alert alert-danger alert-dismissible">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li style='font-size:14px'><i class="icon fa fa-warning"></i>&nbsp;&nbsp;&nbsp;&nbsp;{{$error}}</li>
                    @endforeach
                </ul>
              </div>
            
            @endif
            <form action="/admin/passchange?id={{session('cid')}}"method="post"id="myform"enctype="multipart/form-data">
                <table class="insert-tab" width="100%">
                    <div class="box-body">
                        <div class="form-group"style="margin-left:50px">
                            <tbody>
                           
                            <tr>
                                <th><i class="require-red">*</i>旧密码：</th>
                                <td>
                                    <input class="common-text required" id="title" name="oldpass" size="16" value="" type="password">
                                </td>
                            </tr>
                             <tr>
                                <th><i class="require-red">*</i>新密码：</th>
                                <td>
                                    <input class="common-text required" id="title" name="newpass" size="16" value="" type="password">
                                </td>
                            </tr>
                            
        
                            </tbody>    
                        </div>
                    </div>
                </table>
                {{csrf_field()}}
                    <div class="box-footer"style="margin-left:600px">
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