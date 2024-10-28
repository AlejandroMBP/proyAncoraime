@extends('Administrador.app')

@section('contenido')
    <!-- Page Content Starts-->
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                LISTADO DE FUNCIONARIOS
            </h1>
            <ol class="breadcrumb">
                <li><a href="../../index.html"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Tables</a></li>
                <li class="active">Basic Table</li>
            </ol>
        </section>
        <div class="row">
            <!-- Striped Rows Section Starts -->
            <div class="col-lg-12 col-sm-12 ">
                <div class="cardbg">
                    <h6 class="title-inner text-uppercase">Striped Rows</h6>
                    <div class="row">
                        <div class=" col-md-8">
                            <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#modalAgregar"><i class="fa fa-plus"></i> Agregar Funcionario
                            </button>
                        </div>
                        <div class=" col-md-4">
                            <!-- Formulario de búsqueda -->
                            <p class="form-inline">
                                <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                                <input type="text" id="search" class="form-control mr-2"
                                    placeholder="Buscar funcionario..." value="{{ request('search') }}">
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
                                    timer: 2000, // Se cerrará después de 3 segundos
                                    timerProgressBar: false, // Muestra una barra de progreso mientras se cuenta el tiempo
                                    showConfirmButton: false // Oculta el botón de confirmación
                                });
                            });
                        </script>
                    @endif
                    <div id="funcionarios-table">
                        @include('Administrador.funcionarios.table', ['funcionarios' => $funcionarios])
                    </div>
                </div>
                <!-- Modal para agregar funcionario-->
                @include('Administrador.funcionarios.AgregarFun')
                <!-- Fin modal para agregar funcionario -->

                <!-- Modal para eliminar cargo-->
                <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">ELIMINAR FUNCIONARIO</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h5>¿ Esta seguro de eliminar este funcionario ?</h5>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">cancelar</button>
                                <button type="button" class="btn btn-danger btnModalEliminar">Eliminar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fin modal para eliminar cargo -->

                <!-- Modal para agregar funcionario-->
                @include('Administrador.funcionarios.editarFun')
                <!-- Fin modal para agregar funcionario -->
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
                $("#paternoEdit").val($(this).data('paterno'));
                $("#maternoEdit").val($(this).data('materno'));
                $("#fecha_nacimientoEdit").val($(this).data('fecha_nacimiento'));
                $("#ciEdit").val($(this).data('ci'));
                $("#celularEdit").val($(this).data('celular'));
                $("#cargo_idEdit").val($(this).data('cargo_id'));
                $("#unidadEdit").val($(this).data('unidad'));
                $("#descripcionEdit").val($(this).data('descripcion'));
            });

        })();

        function enviarFormulario(funcionarioId) {
            document.getElementById('form-editar-estado-' + funcionarioId).submit();
        }

        // paginacion 
        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            let page = $(this).attr('href').split('page=')[1];
            fetchFuncionarios(page);
        });

        function fetchFuncionarios(page) {
            $.ajax({
                url: "/funcionarios?page=" + page,
                success: function(data) {
                    $('#funcionarios-table').html(data);
                }
            });
        }
        // Captura el evento de entrada en el campo de búsqueda
        $('#search').on('keyup', function() {
            let query = $(this).val();

            $.ajax({
                url: '{{ url('/funcionarios') }}',
                method: 'GET',
                data: {
                    search: query
                },
                success: function(data) {
                    $('#funcionarios-table').html(data);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error(textStatus, errorThrown);
                }
            });
        });
    </script>
@endpush
