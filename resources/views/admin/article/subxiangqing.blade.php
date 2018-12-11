   @extends('admin.layout.admin')
   @section('title',$title)
   @section('content')
<div class="col-md-12">
          <!-- Box Comment -->

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible">
                    <li style='list-style:none;font-size:14px'><i class="icon fa fa-warning"></i>{{session('error')}}</li>
                </div>
            @endif
          <div class="box box-widget">
            <div class="box-header with-border">
              <div class="user-block">
               
                <span class="username"><a>{{$res->user_name}}</a></span>
                <span class="description">{{$res->time}}</span>
              </div>
              <!-- /.user-block -->
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Mark as read">
                  <i class="fa fa-circle-o"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- post text -->
             {!!$res->content!!}

            

            
            </div>
            <!-- /.box-body -->
            
             <button type="button" class="btn btn-default btn-xs"><a href="/admin/subject/tongguo/{{$res->subject_id}}">通过</a></button>
             <button type="button" class="btn btn-default btn-xs"><a href="/admin/subject/butongguo/{{$res->subject_id}}">不通过</a></button>
           
          
          </div>
          <!-- /.box -->
        </div>

         @stop