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
                    <div class="row">
                        <div class="col-md-8">
                            <form method="GET" action="{{ url('/cargos') }}" class="form-inline">
                                <button type="button" class="btn btn-success" data-toggle="modal"
                                    data-target="#modalAgregar"><i class="fa fa-plus"></i>
                                    Nuevo Cargo
                                </button>
                        </div>
                        <div class="col-md-4">
                            <input type="text" id="search" class="form-control" placeholder="Buscar cargo..."
                                value="{{ request('search') }}">
                        </div>
                    </div><br>
                    @if ($message = Session::get('listo'))
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                Swal.fire({
                                    icon: 'success',
                                    title: '¡Éxito!',
                                    text: '{{ $message }}',
                                    timer: 2000, // Se cerrará después de 3000 ms (3 segundos)
                                    timerProgressBar: false, // Muestra una barra de progreso mientras se cuenta el tiempo
                                    showConfirmButton: false // Oculta el botón de confirmación
                                });
                            });
                        </script>
                    @endif
                    <div id="cargos-table">
                        @include('Administrador.cargos.tablacargos')
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
                            <form action="{{ url('/cargos/agregar') }}" method="POST" class="needs-validation" novalidate>
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
                <!-- Modal para editar cargo-->
                <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">EDITAR CARGO</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ url('/cargos/editar') }}" method="POST" class="needs-validation"
                                novalidate>
                                @csrf
                                <div class="modal-body">
                                    <input type="hidden" name="id" id="idEdit">
                                    <div class="form-group">
                                        <label for="nombre">Cargo</label>
                                        <input type="text" class="form-control" name="nombre" id="nombreEdit"
                                            placeholder="nombre" required>
                                        <div class="invalid-feedback">
                                            ingresar nombre del cargo
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="descripcion">Descripción</label>
                                        <input type="text" class="form-control" name="descripcion"
                                            id="descripcionEdit" placeholder=" descripcion">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">cancelar</button>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Fin modal para editar cargo -->
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
                var forms = document.getElementsByClassName('needs-validation');
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
            });
            $(".btnModalEliminar").click(function() {
                $("#formEli_" + idEliminar).submit();
            });
            //codigo para editar
            $(".btnEditar").click(function() {
                $("#idEdit").val($(this).data('id'));
                $("#nombreEdit").val($(this).data('nombre'));
                $("#descripcionEdit").val($(this).data('descripcion'));
            });

        })();

        function enviarFormulario(cargoId) {
            document.getElementById('form-editar-estado-' + cargoId).submit();
        }
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                var query = $(this).val();
                fetchCargos(query);
            });

            function fetchCargos(query = '') {
                $.ajax({
                    url: "{{ url('/cargos') }}",
                    method: 'GET',
                    data: {
                        search: query
                    },
                    success: function(data) {
                        $('#cargos-table').html(data);
                    }
                });
            }
        });
    </script>
@endpush
