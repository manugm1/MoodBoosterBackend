<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MoodBooster - @section('tituloPagina') Portada @show</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    {!! Html::style('assets/bootstrap/css/bootstrap.min.css') !!}
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    {!! Html::style('assets/dist/css/AdminLTE.min.css') !!}
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    {!! Html::style('assets/dist/css/skins/_all-skins.min.css') !!}
    <!-- iCheck -->
    {!! Html::style('assets/plugins/iCheck/flat/blue.css') !!}
    <!-- Date Picker -->
    {!! Html::style('assets/plugins/datepicker/datepicker3.css') !!}
    <!-- DataTables -->
    {!! Html::style('assets/plugins/datatables/dataTables.bootstrap.css') !!}
    <!-- Daterange picker -->
    {!! Html::style('assets/plugins/daterangepicker/daterangepicker-bs3.css') !!}
    <!-- bootstrap wysihtml5 - text editor -->
    {!! Html::style('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') !!}

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        hr.soften {
            height: 1px;
            background-image: -webkit-linear-gradient(left, rgba(0,0,0,0), #3c8dbc, rgba(0,0,0,0));
            background-image:    -moz-linear-gradient(left, rgba(0,0,0,0), #3c8dbc, rgba(0,0,0,0));
            background-image:     -ms-linear-gradient(left, rgba(0,0,0,0), #3c8dbc, rgba(0,0,0,0));
            background-image:      -o-linear-gradient(left, rgba(0,0,0,0), #3c8dbc, rgba(0,0,0,0));
            border: 0;
        }
    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="{!! URL::to('/') !!}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>M</b>B</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">{!! Html::image('assets/img/logo.png', 'Logo de moodbooster', array( 'width' => 45, 'height' => 45 )) !!}</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="hidden-xs">{{Auth::user()->nombre. " - " . Auth::user()->email}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                    <a href="{{route('logout')}}" class="btn btn-default btn-flat">Cerrar Sesión</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->

    @include('menu')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @section('cabeceraContenido')
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Portada
                    <small>Panel de control</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Inicio </a></li>
                    <li class="active">Portada</li>
                </ol>
            </section>
        @show

        @section('contenido')
        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-4 col-xs-7" style="cursor: pointer;" onclick="location.href='estadoanimo/create'">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>Estado</h3>
                            <p>Insertar</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-happy"></i>
                        </div>
                        <a href="{!! URL::to('estadoanimo/create') !!}" class="small-box-footer">Ir <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-4 col-xs-7" style="cursor: pointer;" onclick="location.href='recomendacion/create'">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>Recomendación</h3>
                            <p>Insertar</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-music-note"></i>
                        </div>
                        <a href="{!! URL::to('recomendacion/create') !!}" class="small-box-footer">Ir <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-4 col-xs-7" style="cursor: pointer;" onclick="location.href='usuario/create'">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>Usuario</h3>
                            <p>Insertar</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{!! URL::to('usuario/create') !!}" class="small-box-footer">Ir <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->
            </div><!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <hr class="soften">
                </div>
            </div>
            <div class="row">
                <!--<div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-yellow">
                        <span class="info-box-icon"><i class="ion ion-ios-people-outline"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Usuarios Registrados</span>
                            <span class="info-box-number">41,410</span>
                        </div><!-- /.info-box-content -->
                <!--</div><!-- /.info-box
            </div>-->
            </div>
            <!-- Main row -->
            <div class="row">

                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class="col-lg-5 connectedSortable">




                </section><!-- right col -->
            </div><!-- /.row (main row) -->

        </section><!-- /.content -->
        @show
    </div><!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version 1.1</b>
        </div>
        <strong>MoodBooster - <?=date('Y')?> </strong>
    </footer>
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div><!-- ./wrapper -->

{!! Html::script('assets/plugins/jQuery/jQuery-2.1.4.min.js') !!}
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>

@section('footerExtra')

@show
<!-- Bootstrap 3.3.5 -->
{!! Html::script('assets/bootstrap/js/bootstrap.min.js') !!}
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
{!! Html::script('assets/plugins/morris/morris.min.js') !!}
<!-- Sparkline -->
{!! Html::script('assets/plugins/sparkline/jquery.sparkline.min.js') !!}
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
{!! Html::script('assets/plugins/daterangepicker/daterangepicker.js') !!}
<!-- datepicker -->
<!-- datatables -->
{!! Html::script('assets/plugins/datatables/jquery.dataTables.min.js') !!}
{!! Html::script('assets/plugins/datatables/dataTables.bootstrap.min.js') !!}

{!! Html::script('assets/plugins/datepicker/bootstrap-datepicker.js') !!}
<!-- Bootstrap WYSIHTML5 -->
{!! Html::script('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') !!}
<!-- Slimscroll -->
{!! Html::script('assets/plugins/slimScroll/jquery.slimscroll.min.js') !!}
<!-- FastClick -->
{!! Html::script('assets/plugins/fastclick/fastclick.min.js') !!}
<!-- AdminLTE App -->
{!! Html::script('assets/dist/js/app.min.js') !!}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{!! Html::script('assets/dist/js/pages/dashboard.js') !!}
<!-- AdminLTE for demo purposes -->
{!! Html::script('assets/dist/js/demo.js') !!}


</body>
</html>
