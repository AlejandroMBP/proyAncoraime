<header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>P</b>AD</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Perfect </b>Admin</span>
    </a>
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Tasks Section Starts -->
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">2</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">TIENES NOTIFICACIONES</li>
                        <li>
                            <!-- Inner Menu Starts -->
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <h6 class="text-danger text-center"><i class="fa fa-warning"></i> 2
                                            Documentos no devueltos aun </h6>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">Ver documentos no devueltos</a></li>
                    </ul>
                </li>
                <!-- Tasks Section Ends -->
                <!-- User Account Section Starts -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="../../assets/images/user2-160x160.jpg" class="user-image" alt="User Image">
                        <span class="d-none d-sm-block">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User Image Starts -->
                        <li class="user-header">
                            <img src="../../assets/images/user2-160x160.jpg" class="img-circle" alt="User Image">
                            <p>
                                Bienvenido
                                <small>{{ Auth::user()->name }}</small>
                            </p>
                        </li>
                        <!-- User Image Ends -->

                        <!-- Menu Footer Starts -->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Perfil</a>
                            </div>
                            {{-- <div class="pull-right">
                                <a href="#" class="btn btn-default btn-flat">Salir</a>
                            </div> --}}
                            <div class="pull-right">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-default btn-flat">salir</button>
                                </form>
                            </div>
                        </li>
                        <!-- Menu Footer Ends -->
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
