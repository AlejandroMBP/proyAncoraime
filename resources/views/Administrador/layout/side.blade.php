<aside class="main-sidebar">
    <div class="nano">
        <div class="nano-content">
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MENÚ PÁGINA</li>
                <li class="{{ Request::is('metricas*') ? 'active' : '' }}">
                    <a href="{{ route('metricas.index') }}">
                        <i class="fa fa-home"></i> <span>INICIO</span>
                    </a>
                </li>
                <li class="treeview {{ Request::is('personal*') ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa fa-user"></i> <span>ADMIN USUARIOS</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ Request::is('personal') ? 'active' : '' }}">
                            <a href="{{ route('usuario.index') }}">
                                <i class="fa fa-users"></i> USUARIOS
                            </a>
                        </li>
                        <li>
                            <a href="../../index.html">
                                <i class="fa fa-address-book"></i> ROLES
                            </a>
                        </li>
                        <li>
                            <a href="../../index2.html">
                                <i class="fa fa-address-card"></i> PERMISOS
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="treeview {{ Request::is('cargos*') || Request::is('funcionarios*') ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa fa-institution"></i> <span>ALCALDIA ANCORAIMES</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ Request::is('cargos') ? 'active' : '' }}">
                            <a href="{{ url('/cargos') }}">
                                <i class="fa fa-circle"></i> CARGOS
                            </a>
                        </li>
                        <li class="{{ Request::is('funcionarios') ? 'active' : '' }}">
                            <a href="{{ url('/funcionarios') }}">
                                <i class="fa fa-users"></i> FUNCIONARIOS
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="treeview {{ Request::is('tipoDoc*') || Request::is('documentos*') || Request::is('prestamos*') || Request::is('impresiones*') ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa fa-folder-open"></i> <span>GESTIÓN DOCUMENTAL</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ Request::is('tipoDoc') ? 'active' : '' }}">
                            <a href="{{ route('tipoDoc.index') }}">
                                <i class="fa fa-book"></i> TIPOS DE DOCUMENTO
                            </a>
                        </li>
                        <li class="{{ Request::is('documentos') ? 'active' : '' }}">
                            <a href="{{ route('documentos.index') }}">
                                <i class="fa fa-file"></i> DOCUMENTOS
                            </a>
                        </li>
                        <li class="{{ Request::is('prestamos') ? 'active' : '' }}">
                            <a href="{{ route('prestamos.index') }}">
                                <i class="fa fa-address-book"></i> PRESTAMOS
                            </a>
                        </li>
                        <li class="{{ Request::is('impresiones') ? 'active' : '' }}">
                            <a href="{{ route('impresiones.index') }}">
                                <i class="fa fa-print"></i> IMPRESIONES
                            </a>
                        </li>
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
