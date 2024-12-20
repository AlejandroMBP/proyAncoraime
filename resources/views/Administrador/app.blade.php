<!DOCTYPE html>
<html lang="es">

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
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/elements/modals.css') }}">
    <!-- Custom CSS Starts -->
    <link rel="stylesheet" href="{{ asset('misEstilos/estilos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/skin/all-skins.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/general/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/sidebar/side-nav.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fonts/fonts-style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nanoscroller/nanoscroller.css') }}">
    
    <!-- Incluye el CSS de SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

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

        <!-- Back to Top Starts -->
        <a href="javascript:" id="return-to-top"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>
        <!-- Back to Top Ends -->

        @include('Administrador.layout.footer')
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="{{ asset('assets/js/jquery/slim.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap/bootstrap.min.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/js/elements/modals/velocity.min.js') }}"></script>
    <script src="{{ asset('assets/js/elements/modals/velocity.ui.min.js') }}"></script>

    <!-- Theme JS -->
    <script src="{{ asset('assets/js/nanoscroller/nanoscroller.js') }}"></script>
    <script src="{{ asset('assets/js/custom/theme.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
        $(".modal").each(function() {
            $(this).on("show.bs.modal", function() {
                var o = $(this).attr("data-easein");
                if (o) {
                    $(".modal-dialog").velocity("callout." + o);
                } else {
                    $(".modal-dialog").velocity("transition." + o);
                }
            });
        });
    </script>

    @stack('scripts')
</body>

</html>
