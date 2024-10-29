@extends('Administrador.app')

@section('contenido')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Impresiones
                <small>Impresiones</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="../../index.html"><i class="fa fa-home"></i> Administrador</a></li>
                <li><a href="#">Gestión Documental</a></li>
                <li class="active">Impresiones</li>
            </ol>
        </section>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="documentos" role="tabpanel" aria-labelledby="documentos-tab">
                <div class="card panel panel-default">
                    <div class="card-header">
                        <div class="heading-title">
                            <button class="rounded-flexible-btn" id="openImpresionModalButton" data-toggle="modal"
                                data-target="#impresionModal">Nuevo Impresión</button>
                            <button class="rounded-flexible-btn" id="openImpresionModalReporte">Generar Reporte de
                                Impresiones</button>
                        </div>
                    </div>

                    <div class="p-4">
                        <table id="impresionesTable" class="table table-striped table-bordered dt-responsive nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Hoja de Ruta</th>
                                    <th>Documento</th>
                                    <th>Fecha de Impresión</th>
                                    <th>Funcionario</th>
                                    <th>Autoridad / Comunidad</th>
                                    <th>Descripcion</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $contador = 1;
                                @endphp
                                @php
                                    use Illuminate\Support\Facades\Crypt;
                                @endphp

                                @foreach ($impresiones as $impresion)
                                    @if ($impresion->estado == 1)
                                        <tr>
                                            <td>{{ $contador }}</td>
                                            <td>{{ $impresion->hoja_ruta }}</td>
                                            <td>{{ $impresion->documento->titulo }}</td>
                                            <td>{{ \Carbon\Carbon::parse($impresion->fecha_impresion)->format('d F Y') }}
                                            </td>
                                            <td
                                                title="{{ $impresion->funcionario->nombre }} {{ $impresion->funcionario->paterno }} {{ $impresion->funcionario->materno }}">
                                                {{ \Illuminate\Support\Str::limit($impresion->funcionario->nombre . ' ' . $impresion->funcionario->paterno . ' ' . $impresion->funcionario->materno, 20, '...') }}
                                            </td>

                                            <td>{{ $impresion->nombreCompleto_autoridad }}</td>
                                            <td>{{ \Illuminate\Support\Str::limit($impresion->descripcion, 30, '...') }}
                                            </td>

                                            <td>
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic mixed styles example">
                                                    <form action="{{ route('impresiones.cambioEstado', $impresion->id) }}"
                                                        method="POST" class="formbtn" title="Eliminar"
                                                        id="deleteForm-{{ $impresion->id }}">
                                                        @csrf
                                                        <button type="button" class="rounded-flexible-btn delete-btn"
                                                            onclick="confirmDelete({{ $impresion->id }})">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                    <button type="button" class="rounded-flexible-btn print-btn"
                                                        title="Imprimir"
                                                        onclick="imprimirPDF('{{ route('documentos.imprimir', ['id' => Crypt::encrypt($impresion->documento)]) }}')">
                                                        <i class="fas fa-print"></i>
                                                    </button>

                                                </div>
                                            </td>
                                        </tr>
                                        @php
                                            $contador++;
                                        @endphp
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @include('Administrador.impresiones.create')
        @include('Administrador.impresiones.reportes')
    </div>
@endsection

@push('links')
    <!-- En la sección <head> de tu documento -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.bootstrap4.css">
@endpush

@push('scripts')
    <!-- Justo antes de cerrar el <body> -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap4.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/responsive.bootstrap4.js"></script>

    <script>
        new DataTable('#impresionesTable', {
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
        function confirmDelete(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger"
                },
                buttonsStyling: false
            });

            swalWithBootstrapButtons.fire({
                title: "¿Estás seguro?",
                text: "¡No podrás revertir esto!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Sí, elimínalo!",
                cancelButtonText: "No, cancelar!",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si el usuario confirma, enviar el formulario
                    document.getElementById(`deleteForm-${id}`).submit();
                    swalWithBootstrapButtons.fire({
                        title: "¡Eliminado!",
                        text: "Tu archivo ha sido eliminado.",
                        icon: "success"
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire({
                        title: "Cancelado",
                        text: "Tu archivo imaginario está a salvo :)",
                        icon: "error"
                    });
                }
            });
        }
    </script>
    <script>
        function imprimirPDF(url) {
            // Abrir el PDF en una nueva ventana
            const win = window.open(url, '_blank');

            // Esperar a que cargue y luego imprimir
            win.onload = function() {
                win.print();
            };
        }
    </script>
    <script>
        //APERTURA DEL MODAL DE REPORTES
        document.addEventListener('DOMContentLoaded', function() {
            var reporteImpresionModal = new bootstrap.Modal(document.getElementById('reporteImpresionModal'), {
                keyboard: false
            });

            document.getElementById('openImpresionModalReporte').addEventListener('click', function() {
                reporteImpresionModal.show();
            });
        });
    </script>
@endpush

<style>
    /* Estilo para los botones de SweetAlert2 */
    .swal2-confirm,
    .swal2-cancel {
        margin: 5px;
        /* Espaciado entre los botones */
        transition: background-color 0.3s ease, transform 0.3s ease;
        /* Animación para el efecto hover */
    }

    /* Efecto hover para el botón de confirmación */
    .swal2-confirm:hover {
        background-color: #28a745;
        /* Cambia el color de fondo al pasar el mouse */
        transform: scale(1.05);
        /* Efecto de aumento */
    }

    /* Efecto hover para el botón de cancelación */
    .swal2-cancel:hover {
        background-color: #dc3545;
        /* Cambia el color de fondo al pasar el mouse */
        transform: scale(1.05);
        /* Efecto de aumento */
    }

    .rounded-flexible-btn {
        background: linear-gradient(to right, #007bff, #20c997);
        color: white;
        border: none;
        border-radius: 25px;
        padding: 10px 20px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 50px;
        min-height: 40px;
        font-size: 16px;
        text-align: center;
        transition: all 0.3s ease-in-out;
        margin: 0 5px;
        /* Espaciado horizontal entre botones */
    }

    .rounded-flexible-btn:hover {
        box-shadow: 0 0 10px 2px rgba(32, 201, 151, 0.7);
        transform: scale(1.05);
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
        padding: 10px 20px;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .nav-tabs .nav-link.active {
        color: white;
        border-radius: 10px;
    }

    .nav-tabs .nav-link:hover {
        background-color: rgba(0, 123, 255, 0.1);
    }

    .btn-group {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .btn-group .rounded-flexible-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        /* Asegura que el contenido esté centrado */
        min-width: 50px;
        /* Ancho mínimo para todos los botones */
        min-height: 40px;
        /* Altura mínima para todos los botones */
        margin: 0 5px;
        /* Espaciado horizontal entre botones */
    }

    /* Asegúrate de que el botón de eliminar sea del mismo tamaño */
    .delete-btn {
        min-height: 40px;
        /* Igualar la altura mínima */
        min-width: 50px;
        /* Igualar el ancho mínimo */
    }

    .formbtn {
        display: flex;
        /* Asegura que el formulario también esté en línea */
        align-items: center;
        margin: 0;
        /* Elimina márgenes que puedan desalinear los botones */
    }
</style>