<aside class="main-sidebar">
    <div class="nano">
        <div class="nano-content">
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MENÚ PAGINA</li>
                <li class="{{ Request::is('metricas*') ? 'active' : '' }}">
                    <a href="{{ route('metricas.index') }}">
                        <i class="fa fa-home"></i> <span>INICIO </span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-user-o"></i> <span>ADMIN USUARIOS</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="../../index2.html"><i class="fa fa-users"></i> USUARIOS</a></li>
                        <li><a href="../../index.html"><i class="fa fa-address-book-o"></i>ROLES </a></li>
                        <li><a href="../../index2.html"><i class="fa fa-address-card-o"></i> PERMISOS</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-institution"></i> <span>ALCALDIA ANCORAIMES</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('/cargos') }}"><i class="fa fa-circle-o"></i> CARGOS </a></li>
                        <li><a href="../../index2.html"><i class="fa fa-users"></i> FUNCIONARIOS </a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-folder-open-o"></i> <span>GESTION DOCUMENTAL</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="../../index.html"><i class="fa fa-book"></i>TIPOS DE DOCUMENTO</a></li>
                        <li><a href="../../index.html"><i class="fa fa-file-o"></i>DOCUMENTOS</a></li>
                        <li><a href="../../index2.html"><i class="fa fa-address-book-o"></i>PRESTAMOS</a></li>
                        <li><a href="../../index2.html"><i class="fa fa-print"></i>IMPRESIONES</a></li>
                    </ul>
                </li>
                <li>
                    <a href="../calendar.html">
                        <i class="fa fa-sign-out"></i> <span>SALIR</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>
