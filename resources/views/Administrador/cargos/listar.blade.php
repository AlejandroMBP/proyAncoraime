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
                    <div class="row">
                        <div class="col-md-8">
                            <form method="GET" action="{{ url('/cargos') }}" class="form-inline">
                                <button type="button" class="rounded-flexible-btn" data-toggle="modal"
                                    data-target="#modalAgregar">
                                    Nuevo Cargo
                                </button>
                        </div>
                        <div class="col-md-4">
                            <p class="form-inline">
                                <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                                <input type="text" id="search" class="form-control mr-2"
                                    placeholder="Buscar cargo..." value="{{ request('search') }}">
                            </p>
                        </div>
                    </div>
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
                @include('Administrador.cargos.agregarCargo')
                <!-- Fin modal para agregar cargo -->

                <!-- Modal de confirmación de eliminacion-->
                <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog"
                    aria-labelledby="modalEliminarLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalEliminarLabel">Confirmar Eliminación</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ¿Estás seguro de que deseas eliminar este cargo?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-danger" id="confirmarEliminar">Eliminar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fin modal para eliminar cargo  de eliminacion-->

                <!-- Modal para editar cargo-->
                @include('Administrador.cargos.editarCargo')
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
            $(document).ready(function() {
                $(".btnEliminar").click(function() {
                    var idEliminar = $(this).data('id');

                    $('#confirmarEliminar').off('click').on('click', function() {
                        $('#formEli_' + idEliminar).submit();
                    });
                });
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
<style>
    .rounded-flexible-btn {
        background: linear-gradient(to right, #007bff, #20c997);
        /* Degradado de azul a verde turquesa */
        color: white;
        /* Color del texto */
        border: none;
        /* Sin borde */
        border-radius: 25px;
        /* Bordes redondeados */
        padding: 10px 15px;
        /* Espaciado interno */
        display: inline-flex;
        /* Permite alinear el contenido */
        align-items: center;
        /* Centra el contenido verticalmente */
        justify-content: center;
        /* Centra el contenido horizontalmente */
        min-width: 35px;
        /* Ancho mínimo */
        min-height: 20px;
        /* Alto mínimo */
        font-size: 16px;
        /* Tamaño del texto */
        text-align: center;
        /* Alineación del texto */
        transition: all 0.3s ease-in-out;
        /* Transición suave */
    }

    .rounded-flexible-btn:hover {
        box-shadow: 0 0 10px 2px rgba(32, 201, 151, 0.7);
        /* Resplandor suave en hover */
        transform: scale(1.05);
        /* Ligeramente agrandar el botón en hover */
    }

    tr th {
        text-align: center;
        border-radius: 8px;
    }

    tr td {
        text-align: center;
        border-radius: 8px;
    }

    .nav-tabs .nav-link {
        background-color: #f8f9fa;
        border-radius: 10px;
        /* color: #007bff; */
        padding: 10px 20px;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .nav-tabs .nav-link.active {
        /* background-color: #007bff; */
        color: white;
        border-radius: 10px;
    }

    .nav-tabs .nav-link:hover {
        background-color: rgba(0, 123, 255, 0.1);
        /* color: #007bff; */
    }

    .btn-group .btn {
        margin-right: 5px;
        border-radius: 8px;
        /* Bordes redondeados en los botones de acciones dentro del grupo */
    }
</style>