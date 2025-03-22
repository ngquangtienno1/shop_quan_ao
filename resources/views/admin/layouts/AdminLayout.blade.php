<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/dason/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 21 Mar 2025 10:58:14 GMT -->

<head>
    <base href="{{ env('APP_URL') }}">
    <meta charset="utf-8" />
    <title>Trang chủ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="theme-admin/dason/assets/images/favicon.ico">

    <!-- plugin css -->
    <link href="theme-admin/dason/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css"
        rel="stylesheet" type="text/css" />

    <!-- preloader css -->
    <link rel="stylesheet" href="theme-admin/dason/assets/css/preloader.min.css" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="theme-admin/dason/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="theme-admin/dason/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="theme-admin/dason/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />




</head>

<body data-topbar="dark">



    @include('admin.layouts.blocks.header')


    <!-- Begin page -->
    <div id="layout-wrapper">


        @include('admin.layouts.blocks.sidebar')



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        @yield('content')

        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    @include('admin.layouts.blocks.footer')



    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
<script src="theme-admin/dason/assets/libs/jquery/jquery.min.js"></script>
<script src="theme-admin/dason/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="theme-admin/dason/assets/libs/metismenu/metisMenu.min.js"></script>
<script src="theme-admin/dason/assets/libs/simplebar/simplebar.min.js"></script>
<script src="theme-admin/dason/assets/libs/node-waves/waves.min.js"></script>
<script src="theme-admin/dason/assets/libs/feather-icons/feather.min.js"></script>
<!-- pace js -->
<script src="theme-admin/dason/assets/libs/pace-js/pace.min.js"></script>
<script src="theme-admin/dason/assets/js/pages/pass-addon.init.js"></script>

<script src="theme-admin/dason/assets/js/pages/feather-icon.init.js"></script>


<!-- apexcharts -->
<script src="theme-admin/dason/assets/libs/apexcharts/apexcharts.min.js"></script>

<!-- Plugins js-->
<script src="theme-admin/dason/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="theme-admin/dason/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js">
</script>

<script src="theme-admin/dason/assets/js/pages/allchart.js"></script>
<!-- dashboard init -->
<script src="theme-admin/dason/assets/js/pages/dashboard.init.js"></script>

<script src="theme-admin/dason/assets/js/app.js"></script>

</body>


<!-- Mirrored from themesbrand.com/dason/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 21 Mar 2025 10:58:44 GMT -->

</html>
