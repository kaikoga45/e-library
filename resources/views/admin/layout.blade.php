<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>ELibrary - @yield('title')</title>

    <!-- Site favicon -->
    <!-- <link rel="shortcut icon" href="images/favicon.ico"> -->

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('vendors/styles/style.css')}}">

    <!-- CDN -->
    <link rel="stylesheet" type="text/css" href="{{asset('src/plugins/datatables/media/css/jquery.dataTables.css')}}">
    <link rel="stylesheet" type="text/css"
        href="{{asset('src/plugins/datatables/media/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" type="text/css"
        href="{{asset('src/plugins/datatables/media/css/responsive.dataTables.css')}}">

    <!-- switchery css -->
    <link rel="stylesheet" type="text/css" href="{{asset('src/plugins/switchery/dist/switchery.css')}}">
    <!-- bootstrap-tagsinput css -->
    <link rel="stylesheet" type="text/css"
        href="{{asset('src/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}">
    <!-- bootstrap-touchspin css -->
    <link rel="stylesheet" type="text/css"
        href="{{asset('src/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css')}}">
</head>

<body>
    <div class="pre-loader"></div>
    <div class="header clearfix">
        <div class="header-right">
            <div class="brand-logo">
                <a href="index.php">
                    <img src="vendors/images/logo.png" alt="" class="mobile-logo">
                </a>
            </div>
            <div class="menu-icon">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="user-info-dropdown">
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        <span class="user-icon"><i class="fa fa-user-o"></i></span>
                        <span class="user-name">Selamat datang, Admin</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Log
                            Out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="left-side-bar">
        <div class="brand-logo">
            <a href="index.php">
                <img src="vendors/images/logo.png" alt="">
            </a>
        </div>
        <div class="menu-block customscroll">
            <div class="sidebar-menu">
                <ul id="accordion-menu">
                    <li>
                        <a href="/" class="dropdown-toggle no-arrow">
                            <span class="fa fa-dashboard"></span><span class="mtext">Dashboard</span>
                        </a>
                    </li>
                    <hr>
                    <li>
                        <a href="/book" class="dropdown-toggle no-arrow">
                            <span class="fa fa-book"></span><span class="mtext">Buku</span>
                        </a>
                    </li>
                    <li>
                        <a href="/user" class="dropdown-toggle no-arrow">
                            <span class="fa fa-user-o"></span><span class="mtext">Anggota</span>
                        </a>
                    </li>
                    <hr>
                    <li>
                        <a href="/borrowing" class=" dropdown-toggle no-arrow">
                            <span class="fa fa-exchange"></span><span class="mtext">Peminjam</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @yield('content')
    <!-- Script -->
    <script src="{{asset('vendors/scripts/script.js')}}"></script>
    <script src="{{asset('src/plugins/highcharts-6.0.7/code/highcharts.js')}}"></script>
    <script src="{{asset('src/plugins/highcharts-6.0.7/code/highcharts-more.js')}}"></script>
    <!-- CDN -->
    <script src="{{asset('src/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('src/plugins/datatables/media/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{asset('src/plugins/datatables/media/js/dataTables.responsive.js')}}"></script>
    <script src="{{asset('src/plugins/datatables/media/js/responsive.bootstrap4.js')}}"></script>
    <!-- buttons for Export datatable -->
    <script src="{{asset('src/plugins/datatables/media/js/button/dataTables.buttons.js')}}"></script>
    <script src="{{asset('src/plugins/datatables/media/js/button/buttons.bootstrap4.js')}}"></script>
    <script src="{{asset('src/plugins/datatables/media/js/button/buttons.print.js')}}"></script>
    <script src="{{asset('src/plugins/datatables/media/js/button/buttons.html5.js')}}"></script>
    <script src="{{asset('src/plugins/datatables/media/js/button/buttons.flash.js')}}"></script>
    <script src="{{asset('src/plugins/datatables/media/js/button/pdfmake.min.js')}}"></script>
    <script src="{{asset('src/plugins/datatables/media/js/button/vfs_fonts.js')}}"></script>

    <!-- switchery js -->
    <script src="{{asset('src/plugins/switchery/dist/switchery.js')}}"></script>
    <!-- bootstrap-tagsinput js -->
    <script src="{{asset('src/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.js')}}"></script>
    <!-- bootstrap-touchspin js -->
    <script src="{{asset('src/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js')}}"></script>

    @yield('code')
</body>

</html>