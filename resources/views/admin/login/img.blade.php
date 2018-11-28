   @extends('admin.layout.admin')
   @section('title',$title)
   @section('content')
   @php

          $user = DB::table('conservator')->where('id',session('cid'))->first();

    @endphp
    <br>
<div class="box box-primary">
     @if(session('error'))
                <div class="alert alert-danger alert-dismissible">
                    <li style='list-style:none;font-size:14px'><i class="icon fa fa-warning"></i>{{session('error')}}</li>
                </div>
            @endif
            <form id='art_form' action="/admin/upload" method="post"  enctype='multipart/form-data'>
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{$user->img}}" alt="User profile picture" id='imgs'>

              <h3 class="profile-username text-center">{{$user -> name}}</h3>

              <p class="text-muted text-center">Software Engineer</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                    <center>
                        {{csrf_field()}}
                         <input name="img"  type="file"style='margin-left:120px' id='upload'>
                    </center>
                </li>
             
              </ul>

             
               <input type="submit" class="btn btn-primary btn-block" id="file_upload" value='更换'>
            </div>
        </form>
            <!-- /.box-body -->
          </div>
   
     @stop
     @section('js')
<script>
    $('.alert-dismissible').delay(2000).fadeOut(2000);
        $(function () {
        $("#file_upload").click(function () {

            var imgPath = $("#upload").val();

            if (imgPath == "") {
                alert("请选择上传图片！");
                return;
            }else{
            //判断上传文件的后缀名
              var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
              if (strExtension != 'jpg' && strExtension != 'gif'
                  && strExtension != 'png' && strExtension != 'bmp') {
                  alert("请选择图片文件");
                  return;
              }else{
                var formData = new FormData($('#art_form')[0]);
                    // console.log(formData);
                    $.ajax({
                        type: "POST",
                        url: "/admin/upload",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            $('#imgs').attr('src',data);
                            // $('#art_thumb').val(data);

                            setTimeout(function(){
                            location.href = '/admin';
                            },500)

                        }
                       
                    });
                  } 
            
              }
            
        })
    })
</script>
@stop