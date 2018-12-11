<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="/admins/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" type="text/css" href="/admins/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/admins/css/main.css"/>
    <script type="text/javascript" src="/admins/js/libs/modernizr.min.js"></script>
  <link rel="stylesheet" href="/admins/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/admins/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/admins/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="/admins/dist/css/skins/skin-blue.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style type="text/css">
    .nav>li>a:hover, .nav>li>a:active, .nav>li>a:focus {
      background-color:#337ab7; 
    }
    .nav .open>a, .nav .open>a:focus, .nav .open>a:hover{
      background-color: #337ab7; 
    }
    .skin-purple-light{
    border-right: 1px solid #d2d6de;
    }
    .skin-purple-light .left-side {
    background-color: #f9fafc;
 
}
.skin-purple-light .sidebar-menu>li:hover>a, .skin-purple-light .sidebar-menu>li.active>a {
    color: #000;
    background: #f4f4f5;
}
.skin-purple-light .sidebar-menu>li>.treeview-menu {
    background: #f4f4f5;
}
.skin-purple-light .sidebar-form .btn {
    color: #999;
    border-top-left-radius: 0;
    border-top-right-radius: 2px;
    border-bottom-right-radius: 2px;
    border-bottom-left-radius: 0;
}
_all-skins.min.css:1
.skin-purple-light .sidebar-form input[type="text"], .skin-purple-light .sidebar-form .btn {
    box-shadow: none;
    background-color: #fff;
    border: 1px solid transparent;
    height: 35px;
}

  </style>      
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="sidebar-mini skin-purple-light"style='height: auto; min-height: 100%;'>
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">
                @php

                    $user = DB::table('conservator')->where('id',session('cid'))->first();

                @endphp
    <!-- Logo -->
    <a href="index2.html" class="logo"style='background:#605CA8;color: #fff;'>
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>M</b>eet</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>遇见·</b>meet</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation"style='background:#605CA8'>
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button"style='color: #fff;'>
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"style='color: #fff;'>
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the messages -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <!-- User Image -->
                        <img src="{{$user->img}}" class="img-circle" alt="User Image">
                      </div>
                      <!-- Message title and timestamp -->
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <!-- The message -->
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
                <!-- /.menu -->
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"style='color: #fff;'>
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <li><!-- start notification -->
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <!-- end notification -->
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks Menu -->
          <li class="dropdown tasks-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"style='color: #fff;'>
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- Inner menu: contains the tasks -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <!-- Task title and progress text -->
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <!-- The progress bar -->
                      <div class="progress xs">
                        <!-- Change the css width attribute to simulate progress -->
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"style='color: #fff;'>
              <!-- The user image in the navbar-->
              <img src="{{$user->img}}" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">{{$user->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header"style='background:#605CA8'>
                
                   <img src="{{$user->img}}" class="img-circle" alt="User Image">
               

                <p>
                 {{$user->name}}
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-footer">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="/admin/pass">修改密码</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="/admin/img">
                     
                         修改头像
                       </a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="/admin/logout">退出</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
<!--               <li class="user-footer">
                <div class="pull-left">
                  <a href="/admin/passchange" class="btn btn-default btn-flat">修改密码</a>
                </div>
                <div class="pull-right">
                  <a href="/admin/logout" class="btn btn-default btn-flat">退出</a>
                </div>
              </li>
           
 -->
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"style='color: #fff;'></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar"style='background: #f9fafc'>

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{$user->img}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{$user->name}}</p>
          <!-- Status -->
          <a href="#"style='color:#000'><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional)
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form> -->
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-smile-o"></i> Meet a goog left <i class="fa fa-smile-o"></i></li>
        <hr>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="/admin/configure"style='color: #000'><i class="fa fa-gear"></i> <span>系统设置</span></a></li>
        <li class="treeview">
          <a href="#"style='color: #000'><i class="fa fa-user-secret"></i> <span>管理员管理</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/admin/conservator/create"style='color: #000'><i class="fa fa-user-plus"></i>管理员添加</a></li>
            <li><a href="/admin/conservator"style='color: #000'><i class="fa fa-users"></i>管理员列表</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"style='color: #000'><i class="fa fa-key"></i> <span>角色管理</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/admin/role/create"style='color: #000'><i class="fa fa-plus"></i>角色添加</a></li>
            <li><a href="/admin/role"style='color: #000'><i class="fa  fa-bars"></i>角色列表</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"style='color: #000'><i class="fa  fa-check-square-o"></i> <span>权限管理</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/admin/permission/create"style='color: #000'><i class="fa fa-plus"></i>权限添加</a></li>
            <li><a href="/admin/permission"style='color: #000'><i class="fa  fa-bars"></i>权限列表</a></li>
          </ul>
        </li>
         <li class="treeview">
          <a href="#"style='color: #000'><i class="fa fa-user"></i> <span>用户管理</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/admin/user/create"style='color: #000'><i class="fa fa-user-plus"></i>用户添加</a></li>
            <li><a href="/admin/user"style='color: #000'><i class="fa fa-users"></i>用户列表</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"style='color: #000'><i class="fa fa-chain"></i> <span>友情链接管理</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/admin/friend/create"style='color: #000'><i class="fa fa-plus"></i>友情链接添加</a></li>
            <li><a href="/admin/friend"style='color: #000'><i class="fa fa-chain"></i>友情链接列表</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"style='color: #000'><i class="fa fa-image"></i> <span>轮播图管理</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/admin/rotate/create"style='color: #000'><i class="fa fa-plus"></i>轮播图添加</a></li>
            <li><a href="/admin/rotate"style='color: #000'><i class="fa fa-image"></i>轮播图列表</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"style='color: #000'><i class=""><b>#&nbsp;&nbsp;</b></i> <span> 话题管理</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/admin/cate/create"style='color: #000'><i class="fa fa-plus"></i>话题添加</a></li>
            <li><a href="/admin/cate"style='color: #000'><i class=""><b>#&nbsp;&nbsp;</b></i>话题列表</a></li>
          </ul>
        </li>
         <li class="treeview">
          <a href="#"style='color: #000'><i class="fa fa-newspaper-o"></i> <span>文章管理</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            
            <li><a href="/admin/article"style='color: #000'><i class="fa fa-newspaper-o"></i>文章列表</a></li>
            <li><a href="/admin/subject"style='color: #000'><i class="fa fa-newspaper-o"></i>专题列表</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <br>
    @if(session('success'))
                  <div class="alert alert-success alert-dismissible">
                      <li style='list-style:none;font-size:14px'><i class="icon fa fa-check"></i>{{session('success')}}</li>
                  </div>
              @endif
     @section('content')

      @show


    
    </section>
    <!-- /.content -->
  </div>
   

  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2018 <a href="#">Company</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                    <span class="label label-danger pull-right">70%</span>
                  </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="/admins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/admins/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="/admins/dist/js/adminlte.min.js"></script>
 @section('js')

  
    @show
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
<script>
    $('.alert-dismissible').delay(2000).fadeOut(2000);
</script>
</body>
</html>
