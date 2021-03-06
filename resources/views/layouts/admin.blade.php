<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title','Panel') | Administración</title>
    
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('css/paneladmin/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/paneladmin/font-awesome.min.css') }}">
    <!-- Tables -->
    <link rel="stylesheet" href="{{ asset('css/paneladmin/dataTables.bootstrap.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('css/paneladmin/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/paneladmin/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('css/paneladmin/_all-skins.min.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!-- Google Font -->
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    
    <!-- Site wrapper -->
    <div class="wrapper">
    
    	<!-- Cabecera de Navegación Superior -->
    	@include('layouts.partials.navtop')
    
        <!-- Menú de Navegación Izquierdo -->
      	@include('layouts.partials.navleft')
    
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            
            <!-- Cabecera Contenido Página -->
    			@yield('content-header')
    
            <!-- Main content -->
            <section class="content">
    			@yield('content')
            </section>
            <!-- /.content -->
            
        </div>
        <!-- /.content-wrapper -->
    
    	<!-- Contenido Pie Página -->
    	@include('layouts.partials.footer')	
    
    	<!-- Contenido Menú Sidebar Derecho -->
    	@include('layouts.partials.sidebar')
    
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="{{ asset('lib/jquery/paneladmin/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('lib/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('lib/jquery/paneladmin/jquery.slimscroll.min.js') }}"></script>
    <!-- Tables -->
    <script src="{{ asset('lib/jquery/paneladmin/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('lib/bootstrap/js/dataTables.bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('js/paneladmin/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/js/paneladmin/adminlte.min.js') }}"></script>
    
    <script>
      $(document).ready(function () {
        $('.sidebar-menu').tree()
      })
    </script>
</body>
</html>
