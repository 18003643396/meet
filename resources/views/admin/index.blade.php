@extends('admin.layout.admin')

@section('title',$title)

@section('content')
 <br>
  <div style='float: right;'>
    <p id='times' style='font-size:15px;'></p>
    </div>
   <br>
    <div class="content-wrapper"style="margin-left:20px; ">
        <br>
        <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">系统配置</h3>
            </div>
            <form action=" "method="post"id="myform"enctype="multipart/form-data">
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
                                    <input class="common-text required" id="title" name="banquan"  value="{{$res->banquan}}" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>网站状态：</th>
                                <td>
                                    <input class="common-text required"  name="status" value="1" type="radio"@if($res->status== 1)
                                        checked
                                        @endif>&nbsp;开
                                    <input class="common-text required"  name="status" value="2" type="radio"@if($res->status== 0) checked @endif>&nbsp;关
                                </td>
                            </tr>
                            
                          
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
@section('js')
<script>
        setInterval(function(){

        var d = new Date();
        //获取年
        var y = d.getFullYear();

        //获取月
        var m = d.getMonth()+1;
        if(m < 10){

            m = '0'+m;
        }
        //获取日
        var ds = d.getDate();
        if(ds < 10){

            ds = '0'+ds;
        }

        //获取时
        var h = d.getHours();
        if(h < 10){

            h = '0'+h;
        }

        //获取分
        var ms = d.getMinutes();
        if(ms < 10){

            ms = '0'+ms;
        }

        //获取秒
        var s = d.getSeconds();
        if(s < 10){

            s = '0'+s;
        }

        //获取星期
        var day = d.getDay();

        switch(day){
            case 1:
                day = '星期一';
            break;
            case 2:
                day = '星期二';
            break;
            case 3:
                day = '星期三';
            break;
            case 4:
                day = '星期四';
            break;
            case 5:
                day = '星期五';
            break;
            case 6:
                day = '星期六';
            break;
            case 0:
                day = '星期日';
            break;
        }

        //2018-10-12 10:02:34 星期五

        $('#times').text(y+'-'+m+'-'+ds+' '+h+':'+ms+':'+s+' '+day);

        },1000)
</script>
@stop