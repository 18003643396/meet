   @extends('admin.layout.admin')
   @section('title',$title)
   @section('content')
<div class="col-md-12">
          <!-- Box Comment -->
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
            
             
           
          
          </div>
          <button><a href="/admin/article">返回列表</a></button>
          <!-- /.box -->
        </div>

         @stop