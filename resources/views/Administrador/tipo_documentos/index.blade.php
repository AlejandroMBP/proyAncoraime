@extends('Administrador.app')

@section('contenido')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Documentos
                <small>Registro</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="../../index.html"><i class="fa fa-home"></i> Administrador</a></li>
                <li><a href="#">Gestión Documental</a></li>
                <li class="active">Documentos</li>
            </ol>
        </section>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="documentos" role="tabpanel" aria-labelledby="documentos-tab">
                <div class="card panel panel-default">
                    <div class="card-header">
                        <div class="heading-title">
                            <button class="rounded-flexible-btn" id="openModaltipoDocumento">Nuevo Tipo Documento</button>
                        </div>
                    </div>
                    <div class="p-4">
                        <table id="tipodocumentosTable" class="table table-striped table-bordered dt-responsive nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tipo de Documento</th>
                                    <th>Registrado por</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tipoDocumento as $tdoc)
                                    @if ($tdoc->estado == 1)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $tdoc->descripcion }}</td>
                                            <td>{{ $tdoc->usuario->name }}</td>
                                            <td>
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic mixed styles example">
                                                    <button type="button" class="rounded-flexible-btn"
                                                        data-id="{{ $tdoc->id }}"
                                                        data-descripcion="{{ $tdoc->descripcion }}" id="editTipoDocBtn"><i
                                                            class="fas fa-edit"></i></button>
                                                </div>
                                                <form action="{{ route('tipoDoc.cambioEstado', $tdoc->id) }}" method="POST"
                                                    class="changeEstadoForm" style="display:inline;">
                                                    @csrf
                                                    <button type="button" class="rounded-flexible-btn changeEstadoBtn"
                                                        onclick="confirmCambioEstado(this);">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('Administrador.tipo_documentos.editar')
    @include('Administrador.tipo_documentos.create')
@endsection
@push('links')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.bootstrap5.css">
@endpush
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/responsive.bootstrap5.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        new DataTable('#tipodocumentosTable', {
            responsive: true,
            language: {
                info: '',
                infoEmpty: 'No se encontro registro',
                infoFiltered: '',
                lengthMenu: 'Paginas  _MENU_',
                zeroRecords: 'No se encontro registro',
                search: 'Buscar',
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var TipoDocModalCreate = new bootstrap.Modal(document.getElementById('TipoDocModalCreate'), {
                keyboard: false
            });
            document.getElementById('openModaltipoDocumento').addEventListener('click', function() {
                TipoDocModalCreate.show();
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            var TipoDocModalEdit = new bootstrap.Modal(document.getElementById('TipoDocModalEdit'), {
                keyboard: false
            });
            document.querySelectorAll('#editTipoDocBtn').forEach(function(button) {
                button.addEventListener('click', function() {
                    var id = this.getAttribute('data-id');
                    var descripcion = this.getAttribute('data-descripcion');
                    document.getElementById('editDescripcion').value = descripcion;
                    document.getElementById('editForm').action = 'tipoDoc/editar/' + id;
                    TipoDocModalEdit.show();
                });
            });
        });

        function confirmCambioEstado(button) {
            const form = button.closest('.changeEstadoForm');

            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, Eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Realiza la solicitud AJAX en lugar de enviar el formulario directamente
                    $.ajax({
                        url: form.action,
                        type: 'POST',
                        data: $(form).serialize(),
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    position: "center",
                                    icon: "success",
                                    title: response.message,
                                    showConfirmButton: false,
                                    timer: 1500
                                }).then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Oops...",
                                    text: response.message,
                                });
                            }
                        },
                        error: function(xhr) {
                            Swal.fire({
                                icon: "error",
                                title: "Oops...",
                                text: "Something went wrong!",
                            });
                        }
                    });
                }
            });
        }
        $('#createTipoDocForm').submit(function(event) {
            event.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            location.reload();
                        });
                    }
                },
                error: function(xhr) {
                    // Manejo de errores
                    if (xhr.status === 422) {
                        // Muestra errores de validación
                        let errors = xhr.responseJSON.errors;
                        if (errors.descripcion) {
                            $('#descripcionError').text(errors.descripcion[
                                0]); // Mostrar error debajo del campo
                        }
                    } else {

                        const errorMsg = 'Ocurrió un error, por favor intente nuevamente.';
                        $('#ajaxError').text(errorMsg).show();
                        setTimeout(() => {
                            $('#ajaxError').hide();
                        }, 5000);
                    }
                }
            });
        });
        $('#editForm').submit(function(event) {
            event.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            location.reload();
                        });
                    }
                },
                error: function(xhr) {
                    // Manejo de errores
                    if (xhr.status === 422) {
                        // Muestra errores de validación
                        let errors = xhr.responseJSON.errors;
                        if (errors.descripcion) {
                            $('#descripcionError').text(errors.descripcion[
                                0]); // Mostrar error debajo del campo
                        }
                    } else {

                        const errorMsg = 'Ocurrió un error, por favor intente nuevamente.';
                        $('#ajaxError').text(errorMsg).show();
                        setTimeout(() => {
                            $('#ajaxError').hide();
                        }, 5000);
                    }
                }
            });
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
        padding: 10px 20px;
        /* Espaciado interno */
        display: inline-flex;
        /* Permite alinear el contenido */
        align-items: center;
        /* Centra el contenido verticalmente */
        justify-content: center;
        /* Centra el contenido horizontalmente */
        min-width: 50px;
        /* Ancho mínimo */
        min-height: 40px;
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