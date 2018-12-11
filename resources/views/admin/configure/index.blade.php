@extends('admin.layout.admin')

@section('title',$title)

@section('content')

<div class="content-wrapper"style="margin-left:20px; ">
	@if (count($errors) > 0)
            <div class="alert alert-danger alert-dismissible">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li style='font-size:14px'><i class="icon fa fa-warning"></i>&nbsp;&nbsp;&nbsp;&nbsp;{{$error}}</li>
                    @endforeach
                </ul>
              </div>
            
            @endif
        <br>
        <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">系统配置</h3>
            </div>
            <form action="/admin/configure/edit"method="post"id="myform"enctype="multipart/form-data">
                <table class="insert-tab" width="100%">
                    <div class="box-body">
                        <div class="form-group"style="margin-left:50px">
                            <tbody>      
                            <tr>
                                <th><i class="require-red">*</i>网站名：</th>
                                <td>
                                    <input class="common-text required" id="title" name="name"  value="{{$res->name}}" type="">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>关键词：</th>
                                <td>
                                    <input class="common-text required" id="title" name="keywords"  value="{{$res->keywords}}" type="">
                                </td>
                            </tr>
                            
                            <tr>
                                <th>网站描述：</th>
                                <td><textarea name="content" class="common-textarea" id="content" cols="15" style="width: 80%;" rows="5">{{$res->content}}</textarea></td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>网站版权：</th>
                                <td>
                                    <input class="common-text required" id="title" name="banquan"  value="{{$res->banquan}}" type="text"size="85">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>网站状态：</th>
                                <td>
                                    <input class="common-text required"  name="status" value="1" type="radio"@if($res->status== 1)
                                        checked
                                        @endif>&nbsp;开
                                    <input class="common-text required"  name="status" value="2" type="radio"@if($res->status== 2) checked @endif>&nbsp;关
                                </td>
                            </tr>
                            
                         {{csrf_field()}}
                            </tbody>    
                        </div>
                    </div>
                </table>
                <center>
                    <div class="box-footer"style="margin-left:50px">
                        <button type="submit" class="btn btn-primary">提交</button>&nbsp;&nbsp;&nbsp;
                       
                    </div>
                </center>
            </form>
         
            </div>
        </div>
    
    </div>

@stop