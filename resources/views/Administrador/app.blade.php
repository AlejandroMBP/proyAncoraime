<!DOCTYPE html>
<html lang="es">


<!-- Mirrored from admin.perfectuswebinsights.com/pages/tables/basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Sep 2024 20:23:09 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <title>Basic Table | Perfect Admin - Responsive HTML5 Admin Template</title>
    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="Perfect Admin - Responsive HTML5 Admin Template">
    <meta name="author" content="perfectusinc.com">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="{{ asset('../../assets/css/bootstrap/bootstrap.min.css') }}">
    <!-- Custom CSS Starts -->
    <link rel="stylesheet" href="{{ asset('../../assets/css/skin/all-skins.css') }}">
    <link rel="stylesheet" href="{{ asset('../../assets/css/general/style.css') }}">
    <link rel="stylesheet" href="{{ asset('../../assets/css/sidebar/side-nav.css') }}">
    <link rel="stylesheet" href="{{ asset('../../assets/css/fonts/fonts-style.css') }}">
    <link rel="stylesheet" href="{{ asset('../../assets/css/nanoscroller/nanoscroller.css') }}">
    <!-- Incluye el CSS de SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Incluye el JS de SweetAlert2 -->

    @stack('links')
</head>

<body class="sidebar-mini fixed skin-blue">
    <div class="wrapper">
        <!-- Header Section Starts -->
        @include('Administrador.layout.header')
        <!-- Header Section Ends -->

        <!-- Sidebar Section Starts -->
        @include('Administrador.layout.side')
        <!-- Sidebar Section Ends -->

        <!-- Page Content Starts-->
        @yield('contenido')
        <!-- Page Content Ends -->


        @include('Administrador.layout.footer')


    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="{{ asset('../../assets/js/jquery/slim.min.js') }}"></script>
    <!-- Popper.JS -->
    <script src="{{ asset('../../assets/js/jquery/popper.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('../../assets/js/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('../../assets/js/bootstrap/bootstrap.min.js') }}"></script>
    <!-- Theme JS -->
    <script src="{{ asset('../../assets/js/nanoscroller/nanoscroller.js') }}"></script>
    <script src="{{ asset('../../assets/js/custom/theme.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('scripts')
</body>

</html>
