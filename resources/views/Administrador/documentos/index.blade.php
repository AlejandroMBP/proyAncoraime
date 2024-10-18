@extends('Administrador.app')

@section('contenido')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Advanced Table
                <small>Tables</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="../../index.html"><i class="fa fa-home"></i> Administrador</a></li>
                <li><a href="#">Gestión Documental</a></li>
                <li class="active">Documentos</li>
            </ol>
        </section>

        <!-- Pestañas -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="documentos-tab" data-toggle="tab" href="#documentos" role="tab"
                    aria-controls="documentos" aria-selected="true">Documentos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="reporte-tab" data-toggle="tab" href="#reporte" role="tab"
                    aria-controls="reporte" aria-selected="false">Reporte PDF</a>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="documentos" role="tabpanel" aria-labelledby="documentos-tab">
                <div class="card panel panel-default">
                    <div class="card-header">
                        <div class="heading-title">
                            <button class="rounded-flexible-btn" id="openModalButton">Crear nuevo documento</button>
                        </div>
                    </div>
                    <div class="p-4">
                        <table id="documentosTable" class="table table-striped table-bordered dt-responsive nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Título</th>
                                    <th>Fecha</th>
                                    <th>Número Carpeta</th>
                                    <th>Categoría</th>
                                    <th>Cantidad Fojas</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Michael</td>
                                    <td>2024-10-18</td>
                                    <td>123</td>
                                    <td>Categoría A</td>
                                    <td>50</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                            <button type="button" class="rounded-flexible-btn"><i
                                                    class="fas fa-trash-alt"></i></button>
                                            <button type="button" class="rounded-flexible-btn"><i
                                                    class="fas fa-edit"></i></button>
                                            <button type="button" class="rounded-flexible-btn"><i
                                                    class="fas fa-eye"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="reporte" role="tabpanel" aria-labelledby="reporte-tab">
                <div class="card panel panel-default">
                    <div class="card-header">
                        <div class="heading-title">
                            <button class="rounded-flexible-btn " id="openModalReporte">Generar Reporte</button>
                        </div>
                    </div>
                    <div class="p-4">
                        <table id="reporteTable" class="table table-striped table-bordered dt-responsive nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre del Reporte</th>
                                    <th>Fecha de Creación</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Reporte Anual</td>
                                    <td>2024-10-01</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                            <button type="button" class="rounded-flexible-btn "><i
                                                    class="fas fa-download"></i></button>
                                            <button type="button" class="rounded-flexible-btn "><i
                                                    class="fas fa-eye"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('Administrador.documentos.create')
    @include('Administrador.documentos.pdfReporte.reporte')
@endsection
@push('links')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('assets/css/tables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/tables/buttons.dataTables.min.css') }}">
@endpush
@push('scripts')
    <!-- Incluir PDF.js desde un CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Obtén el elemento del modal
            var myModal = new bootstrap.Modal(document.getElementById('myModal'), {
                keyboard: false // Opcional: Evitar que el modal cierre con la tecla Esc
            });

            // Abrir el modal cuando sea necesario
            document.getElementById('openModalButton').addEventListener('click', function() {
                myModal.show(); // Muestra el modal
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            // Obtén el elemento del modal
            var reporteModal = new bootstrap.Modal(document.getElementById('reporteModal'), {
                keyboard: false // Opcional: Evitar que el modal cierre con la tecla Esc
            });

            // Abrir el modal cuando sea necesario
            document.getElementById('openModalReporte').addEventListener('click', function() {
                reporteModal.show(); // Muestra el modal
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
