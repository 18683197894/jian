<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ config('app.name') }}  - {{ $title}}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="csrf-token" content="{{ csrf_token() }}">
 
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('Admin/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('Admin/adminlte/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('Admin/adminlte/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('Admin/adminlte/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('Admin/adminlte/dist/css/skins/_all-skins.min.css')}}">
  <!-- Morris chart -->
  <!-- <link rel="stylesheet" href="{{ asset('Admin/adminlte/bower_components/morris.js/morris.css')}}"> -->
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('Admin/adminlte/bower_components/jvectormap/jquery-jvectormap.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('Admin/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('Admin/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('Admin/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
@yield('css')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="{{ url('/') }}" target="_blank" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>建商联盟</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">

        <ul class="nav navbar-nav">

          <!-- Messages: style can be found in dropdown.less-->

          <!-- Notifications: style can be found in dropdown.less -->
          <!-- <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
               
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li> -->
          <!-- Tasks: style can be found in dropdown.less -->
         <!--  <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                
                <ul class="menu">
                  <li>
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                
                  <li>
                    <a href="#">
                      <h3>
                        Create a nice theme
                        <small class="pull-right">40%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">40% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
              
                  <li>
                    <a href="#">
                      <h3>
                        Some task I need to do
                        <small class="pull-right">60%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                
                  <li>
                    <a href="#">
                      <h3>
                        Make beautiful transitions
                        <small class="pull-right">80%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">80% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li> -->
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#">
              <!-- <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
              <span >{{ session('Admin')->name }}</span>
            </a>
           
          </li>
        
          <li>
            <a href="{{ url('/jslmext') }}" data-toggle="">退出</a>
          </li>
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->


      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">&nbsp;&nbsp;{{ !empty(session('info'))?session('info'):'MAIN NAVIGATION' }}</li>
@if(session('Admin')->status == 1)
     <li class="
@if($title == "用户管理" || $title == "")
active
@endif
         treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>用户管理</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li 
@if($title == "用户管理")
class="active"
@endif
            ><a href="{{ url('/jslmadmin/userhome/index') }}"><i class="fa fa-circle-o"></i>用户管理</a></li>
            <li 
@if($title == "板块管理")
class="active"
@endif
            ><a href="{{ url('jslmadmin/payment/index') }}"><i class="fa fa-circle-o"></i>订单管理</a></li>
          </ul>
        </li>

        <li class="
@if($title == "添加板块" || $title == "板块管理" || $title == "常见问答")
active
@endif
         treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>新闻管理</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li 
@if($title == "添加板块")
class="active"
@endif
            >
            <a href="{{ url('/jslmadmin/newsleiadd') }}"><i class="fa fa-circle-o"></i>添加板块</a>
            </li>
            
            <li 
@if($title == "板块管理")
class="active"
@endif
            >
            <a href="{{ url('jslmadmin/newsleiindex') }}"><i class="fa fa-circle-o"></i>板块管理</a>
            </li>
            
            <li 
@if($title == "常见问答")
class="active"
@endif
            ><a href="{{ url('jslmadmin/newslei/interlocution/interindex') }}"><i class="fa fa-circle-o"></i>常见问答</a>
            </li>
          </ul>
        
        </li>

        <li class="
@if($title == "包管理" || $title == '产品管理')
active
@endif
        treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>产品管理</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!-- <li
@if($title == "风格列表")
class="active"
@endif
            ><a href="{{ url('/admin/product/style/index') }}"><i class="fa fa-circle-o"></i>风格列表</a>
            </li> -->
            <li
@if($title == "包管理")
class="active"
@endif
            ><a href="{{ url('newpro/index/package/packageindex') }}"><i class="fa fa-circle-o"></i>包管理</a>
            </li>
  
            <li
@if($title == "产品管理")
class="active"
@endif
            ><a href="{{ url('/newpro/index/package/productindex') }}"><i class="fa fa-circle-o"></i>产品管理</a></li>
           
          </ul>
        </li>
        
        <li class="
@if($title == "添加案例" || $title == "案例管理")
active
@endif
        treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>案例管理</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li
@if($title == "添加案例")
class="active"
@endif
            ><a href="{{ url('admin/case/add') }}"><i class="fa fa-circle-o"></i>添加案例</a></li>
            <li
@if($title == "案例管理")
class="active"
@endif
            ><a href="{{ url('admin/case/index') }}"><i class="fa fa-circle-o"></i>案例管理</a></li>
          </ul>
        </li>
        <li class="
@if($title == "合作伙伴招募" || $title == "案例页装修设计预约")
active
@endif
        treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>用户预约管理</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           
    
            <li
@if($title == "合作伙伴招募")
class="active"
@endif
            ><a href="{{ url('admin/caseplay') }}"><i class="fa fa-circle-o"></i>案例页装修设计预约</a></li>
          </ul>
        </li>

        <li class="
@if($title == "网页关键字" || $title == "首页导航栏目" )
active
@endif
        treeview">
          <a href="#">
            <i class="fa fa-calendar"></i> <span>网站配置</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li
@if($title == "网页关键字")
class="active"
@endif
            ><a href="{{ url('admin/config/webpage') }}"><i class="fa fa-circle-o"></i>网页关键字</a></li>
            <li
@if($title == "首页导航栏目")
class="active"
@endif
            ><a href="{{ url('admin/config/nav') }}"><i class="fa fa-circle-o"></i>首页导航栏目</a></li>
            <!-- <li
@if($title == "合作伙伴招募")
class="active"
@endif
            ><a href="{{ url('admin/franchisezm') }}"><i class="fa fa-circle-o"></i>合作伙伴招募</a></li>
            <li
@if($title == "合作伙伴招募")
class="active"
@endif
            ><a href="{{ url('admin/caseplay') }}"><i class="fa fa-circle-o"></i>案例页装修设计预约</a></li> -->
          </ul>
        </li>

        <li class="
@if($title == "楼盘动态管理" || $title == "新闻动态管理")
active
@endif
        treeview">
          <a href="#">
            <i class="fa fa-calendar"></i> <span>织金万都铭城</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li
@if($title == "织金楼盘动态管理")
class="active"
@endif
            ><a href="{{ url('admin/properties/details') }}"><i class="fa fa-circle-o"></i>织金楼盘动态管理</a>
            </li>

            <li
@if($title == "织金新闻动态管理")
class="active"
@endif
            ><a href="{{ url('admin/properties/hfnews') }}"><i class="fa fa-circle-o"></i>织金新闻动态管理</a>
            </li>
          </ul>
        </li>
@endif
        
<li class="
@if($title == "织金调查问卷" || $title == "德福调查问卷" || $title == "智能家居调查问卷")
active
@endif
        treeview">
          <a href="#">
            <i class="fa fa-calendar"></i> <span>调查问卷</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li
@if($title == "织金调查问卷")
class="active"
@endif
            ><a href="{{ url('admin/question/zhijin/index') }}"><i class="fa fa-circle-o"></i>织金调查问卷</a>
            </li>

            <li
@if($title == "德福调查问卷")
class="active"
@endif
            ><a href="{{ url('admin/question/defu/index') }}"><i class="fa fa-circle-o"></i>德福调查问卷</a>
            </li>
            <li
@if($title == "智能家居调查问卷")
class="active"
@endif
            ><a href="{{ url('admin/question/defu/smartindex') }}"><i class="fa fa-circle-o"></i>智能家居调查问卷</a>
            </li>
          </ul>
        </li>


        <li class="
@if($title == "建商支付")
active
@endif
        treeview">
          <a href="#">
            <i class="fa fa-calendar"></i> <span>建商支付</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li
@if($title == "建商支付")
class="active"
@endif
            ><a href="{{ url('admin/paymentdiy/diyindex') }}"><i class="fa fa-circle-o"></i>建商支付</a>
            </li>
          </ul>
        </li> 

        <!-- <li>
          <a href="pages/calendar.html">
            <i class="fa fa-calendar"></i> <span>Calendar</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
          </a>
        </li>
        <li>
          <a href="pages/mailbox/mailbox.html">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green">16</small>
              <small class="label pull-right bg-red">5</small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Examples</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
            <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
            <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
            <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
            <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
            <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
            <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
            <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
            <li><a href="pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Level One
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Level Two
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          </ul>
        </li>
        <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li> -->
     

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->


@yield('content')
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->


  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ asset('Admin/adminlte/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('Admin/adminlte/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('Admin/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="{{ asset('Admin/adminlte/bower_components/raphael/raphael.min.js')}}"></script>
<!-- <script src="{{ asset('Admin/adminlte/bower_components/morris.js/morris.min.js')}}"></script> -->
<!-- Sparkline -->
<script src="{{ asset('Admin/adminlte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{ asset('Admin/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{ asset('Admin/adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('Admin/adminlte/bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{ asset('Admin/adminlte/bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{ asset('Admin/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{ asset('Admin/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('Admin/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{ asset('Admin/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ asset('Admin/adminlte/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('Admin/adminlte/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="{{ asset('Admin/adminlte/dist/js/pages/dashboard.js')}}"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('Admin/adminlte/dist/js/demo.js')}}"></script>
@yield('js')
</body>
</html>
