<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>NEHCISS</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{!! asset('theme/bootstrap/css/bootstrap.min.css') !!}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{!! asset('theme/plugins/datatables/dataTables.bootstrap.css') !!}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{!! asset('theme/dist/css/AdminLTE.min.css') !!}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{!! asset('theme/dist/css/skins/_all-skins.min.css') !!}">

    <link rel="stylesheet" href="{{ asset('css/jHTree.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="{!! asset('theme/plugins/jQuery/jquery-2.2.3.min.js') !!}"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">NEHCISS</span>
            {{--<img src="{{ asset('images/neisp-logo.png') }}" style="width:50px;height: auto;">--}}
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>NEHCISS</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            {{--<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">--}}
                {{--<span class="sr-only">Toggle navigation</span>--}}
                {{--<span class="icon-bar"></span>--}}
                {{--<span class="icon-bar"></span>--}}
                {{--<span class="icon-bar"></span>--}}
            {{--</a>--}}

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="user user-menu">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out"></i> {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <aside class="main-sidebar">
        <section class="sidebar">
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                <li><a href="/home"><i class="fa fa-home"></i> <span>Home</span></a></li>
                <li><a href="/dashboard"><i class="fa fa-dashboard"></i> <span>Lines</span></a></li>
                @if(Auth()->user()->role == "admin")
                <li><a href="/add-user"><i class="fa fa-user-plus"></i> <span>Invite Member</span></a></li>
                @endif
                <li><a href="/hierarchy"><i class="fa fa-sitemap"></i> <span>Roots</span></a></li>
                <li><a href="/profile"><i class="fa fa-money"></i> <span>Bonus</span></a></li>
            </ul>
        </section>
    </aside>

    @yield('content')

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            Designed by <a href="http://www.webitizemedia.com/">Webitize Media</a>
        </div>
        <strong>Copyright &copy; 2019.</strong> All right reserved
    </footer>
</div>
<!-- ./wrapper -->
<!-- jQuery 2.2.3 -->

<!-- Bootstrap 3.3.6 -->
<script src="{!! asset('theme/bootstrap/js/bootstrap.min.js') !!}"></script>
<!-- SlimScroll -->
<script src="{!! asset('theme/plugins/slimScroll/jquery.slimscroll.min.js') !!}"></script>
<script src="{!! asset('theme/plugins/datatables/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('theme/plugins/datatables/dataTables.bootstrap.min.js') !!}"></script>
<!-- FastClick -->
<script src="{!! asset('theme/plugins/fastclick/fastclick.js') !!}"></script>
<!-- AdminLTE App -->
<script src="{!! asset('theme/dist/js/app.min.js') !!}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{!! asset('theme/dist/js/demo.js') !!}"></script>
<script src="{{ asset('js/main.js') }}" defer></script>

<script>
    $(function () {
        $("#example1").DataTable();

    });

</script>
<script>
    $(document).on('click','#generate-pwd', function () {

        var pwd = Math.random().toString(36).slice(-8);
        console.log(pwd);
        $('#new-user-pwd').val(pwd);
    });
</script>
</body>
</html>
