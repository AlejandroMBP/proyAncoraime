<!DOCTYPE html>
<html lang="es">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <title>Login | Perfect Admin - Responsive HTML5 Admin Template</title>
    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="Perfect Admin - Responsive HTML5 Admin Template">
    <meta name="author" content="perfectusinc.com">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="../../assets/css/bootstrap/bootstrap.min.css">
    <!-- Page CSS -->
    <link rel="stylesheet" href="../../assets/css/custompages/login1.css">
    <!-- Fonts CSS -->
    <link rel="stylesheet" href="../../assets/css/fonts/fonts-style.css">
</head>

<body class="bg-login">
    <div class="wrapper">
        <!-- Page Content Starts-->
        <div class="content-wrapper">
            <div class="mx-auto login">
                <a href="../../index.html"><img src="../../assets/images/logo-signin.png" class="img-circle"
                        alt="Logo Image"></a>
                <div class="card card-signin mt-4">
                    <div class="card-body">
                        <h5 class="card-title text-center">Ingresar</h5>
                        <form class="form-signin" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-label-group">
                                <input type="text" id="inputEmail" name="username" class="form-control"
                                    placeholder="Nombre de usuario" required autofocus>
                            </div>
                            <div class="form-label-group">
                                <input type="password" name="password" id="inputPassword" class="form-control"
                                    placeholder="Contraseña" required>
                            </div>
                            <div class="block mt-4">
                                <label for="remember_me" class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                                    <span class="ml-2 text-sm text-gray-600">{{ __('Recuérdame') }}</span>
                                </label>
                            </div>


                            {{-- <a href="../../index.html"
                                class="btn btn-lg btn-primary btn-block text-uppercase text-center">Sign in</a> --}}
                            <button type="submit"
                                class="btn btn-lg btn-primary btn-block text-uppercase text-center">Ingresar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Content Ends-->
    </div>

    <!-- Bootstrap JS -->
    <script src="../../assets/js/jquery/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap/bootstrap.min.js"></script>
</body>

</html>
