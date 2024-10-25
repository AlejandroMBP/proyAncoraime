@extends('Administrador.app')

@section('contenido')
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
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalAgregar">
                        Nuevo Cargo
                    </button><br><br>
                    @if ($message = Session::get('listo'))
                        <div class="col-12 alert alert-success alert-dismissable fade show" role="alert">
                            <span>{{ $message }}</span>
                        </div>
                    @endif
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
                                @foreach ($cargos as $cargo)
                                    <tr>
                                        <td>{{ $cargo->id }}</td>
                                        <td>{{ $cargo->nombre }}</td>
                                        <td>{{ $cargo->descripcion }}</td>
                                        <td>
                                            @if ($cargo->estado == 'activo')
                                                <span class="badge badge-success shadow-success m-1">habilitado</span>
                                            @else
                                                <span class="badge badge-danger shadow-success m-1">inhabilitado</span>
                                            @endif
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm"><i
                                                    class="fa fa-pencil-square-o"></i></button>


                                            <button type="button" action class="btn btn-danger btn-sm btnEliminar"
                                                data-id="{{ $cargo->id }}" data-toggle="modal"
                                                data-target="#modalEliminar"><i class="fa fa-trash-o"></i></button>
                                            <form action="{{ url('/cargos', ['id' => $cargo->id]) }}" method="POST"
                                                id="formEli_{{ $cargo->id }}">
                                                @csrf
                                                <input type="text" name="id" value="{{ $cargo->id }}">
                                                <input type="hidden" name="_method" value="delete">
                                            </form>
                                            <button type="button" class="btn btn-secondary btn-sm"><i
                                                    class="fa fa-power-off"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Modal para agregar cargo-->
                <div class="modal fade" id="modalAgregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">AGREGAR CARGO</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ url('/cargos') }}" method="POST" class="needs-validation" novalidate>
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="nombre">Cargo</label>
                                        <input type="text" class="form-control" name="nombre" id="cargo"
                                            placeholder="cargo" required>
                                        <div class="invalid-feedback">
                                            ingresar nombre del cargo
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="descripcion">Descripción</label>
                                        <input type="text" class="form-control" name="descripcion" id="descripcion"
                                            placeholder=" descripcion">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">cancelar</button>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Fin modal para agregar cargo -->
                <!-- Modal para eliminar cargo-->
                <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">ELIMINAR CARGO</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h5>¿ Desea eliminar el cargo ?</h5>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">cancelar</button>
                                <button type="button" class="btn btn-danger btnModalEliminar">Eliminar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fin modal para eliminar cargo -->
            </div>
        </div>
    </div>
    <!-- Page Content Ends -->
@endsection
@push('scripts')
    <script>
        var idEliminar = 0;
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
            //codigo para eliminar
            $(".btnEliminar").click(function() {
                idEliminar = $(this).data('id');
                alert(id);
            })
            $(".btnModalEliminar").click(function() {
                $("#formEli_" + idEliminar).submit();
            })
        })();
    </script>
@endpush
