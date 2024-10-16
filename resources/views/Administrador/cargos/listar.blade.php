@extends('Administrador.app')

@section('contenido')

    <body class="sidebar-mini fixed skin-blue">
        <div class="wrapper">
            <!-- Page Content Starts-->
            <div class="content-wrapper">
                <section class="content-header">
                    <h1>
                        LISTADO DE CARGOS
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="../../index.html"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Tables</a></li>
                        <li class="active">Basic Table</li>
                    </ol>
                </section>
                <div class="row">
                    <!-- Striped Rows Section Starts -->
                    <div class="col-lg-12 col-sm-12">
                        <div class="cardbg">
                            <h6 class="title-inner text-uppercase">Striped Rows</h6>
                            <p>The .table-striped class adds zebra-stripes to a table:</p>
                            <div class="table-responsive">
                                <table class="table m-0 table-striped">
                                    <thead>
                                        <tr>
                                            <th>NR</th>
                                            <th>CARGO</th>
                                            <th>DESCRIPCIÓN</th>
                                            <th>ESTADO</th>
                                            <th>ACCIONES</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $c = 0; ?>
                                        @foreach ($cargos as $cargo)
                                            <tr>
                                                <td>{{ $c = $c + 1 }}</td>
                                                <td>{{ $cargo->nombre }}</td>
                                                <td>{{ $cargo->descripcion }}</td>
                                                <td>
                                                    @if ($cargo->estado == 'activo')
                                                        <span
                                                            class="badge badge-success shadow-success m-1">habilitado</span>
                                                    @else
                                                        <span
                                                            class="badge badge-danger shadow-success m-1">inhabilitado</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-sm"><i
                                                            class="fa fa-pencil-square-o"></i></button>
                                                    <button type="button" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-trash-o"></i></button>
                                                    <button type="button" class="btn btn-secondary btn-sm"><i
                                                            class="fa fa-power-off"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Striped Rows Section Ends -->
                </div>
            </div>
            <!-- Page Content Ends -->

            <!-- Back to Top Starts -->
            <a href="javascript:" id="return-to-top"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>
            <!-- Back to Top Ends -->
        </div>
    </body>
@endsection
