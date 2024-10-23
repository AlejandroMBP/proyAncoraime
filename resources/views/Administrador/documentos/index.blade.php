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

        <!-- Pestañas -->
        {{-- <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="documentos-tab" data-toggle="tab" href="#documentos" role="tab"
                    aria-controls="documentos" aria-selected="true">Documentos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="reporte-tab" data-toggle="tab" href="#reporte" role="tab"
                    aria-controls="reporte" aria-selected="false">Reporte PDF</a>
            </li>
        </ul> --}}

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="documentos" role="tabpanel" aria-labelledby="documentos-tab">
                <div class="card panel panel-default">
                    <div class="card-header">
                        <div class="heading-title">
                            <button class="rounded-flexible-btn" id="openModalButton">Crear nuevo documento</button>
                            <button class="rounded-flexible-btn" id="openModalReporte">Generar Reporte</button>
                        </div>
                    </div>

                    <div class="p-4">
                        <table id="documentosTable" class="table table-striped table-bordered dt-responsive nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Hoja de Ruta</th>
                                    <th>Descripcion de Documento</th>
                                    <th>Fecha</th>
                                    <th>ubicacion</th>
                                    <th>tipo de documento</th>
                                    <th>Fojas</th>
                                    <th>Número Carpeta</th>

                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $contador = 1;
                                @endphp
                                @foreach ($documentos as $documento)
                                    @if ($documento->estado == 1)
                                        <tr>
                                            <td>{{ $contador }}</td>
                                            <td>{{ $documento->hoja_ruta }}</td>
                                            <td>{{ $documento->titulo }}</td>
                                            <td>{{ $documento->fecha }}</td>
                                            <td>{{ $documento->ubicacion }}</td>
                                            <td>{{ $documento->tipoDocumento->descripcion }}</td>
                                            <td>{{ $documento->cantidad_fojas }}</td>
                                            <td>{{ $documento->numero_carpeta }}</td>
                                            <td>
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic mixed styles example">
                                                    <form action="{{ route('documentos.cambioEstado', $documento->id) }}"
                                                        method="POST" class="formbtn">
                                                        @csrf
                                                        <button type="submit" class="rounded-flexible-btn delete-btn"><i
                                                                class="fas fa-trash-alt"></i></button>
                                                    </form>

                                                    <button type="button" class="rounded-flexible-btn editbutton"
                                                        data-id="{{ $documento->id }}"
                                                        data-hojaruta="{{ $documento->hoja_ruta }}"
                                                        data-titulo="{{ $documento->titulo }}"
                                                        data-fecha="{{ $documento->fecha }}"
                                                        data-categoria="{{ $documento->tipo_documento_id }}"
                                                        data-fojas="{{ $documento->cantidad_fojas }}"
                                                        data-carpeta="{{ $documento->numero_carpeta }}"
                                                        data-ubicacion="{{ $documento->ubicacion }}"
                                                        data-pdf="{{ asset('storage/' . $documento->documento_pdf) }}">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button type="button" class="rounded-flexible-btn preview-button"
                                                        data-id="{{ $documento->id }}"
                                                        data-hojaruta="{{ $documento->hoja_ruta }}"
                                                        data-titulo="{{ $documento->titulo }}"
                                                        data-fecha="{{ $documento->fecha }}"
                                                        data-ubicacion="{{ $documento->ubicacion }}"
                                                        data-pdf="{{ asset('storage/' . $documento->documento_pdf) }}">
                                                        <i class="fas fa-eye"></i>
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
            <div class="p-4 text-center" id="reporteContainer" style="display: none;">
                <div id="botonesReporte" class="btn-group" role="group" aria-label="Botones de reporte">
                    <button type="button" class="rounded-flexible-btn" id="descargarPDF">
                        <i class="fas fa-file-pdf"></i> Descargar PDF
                    </button>
                    <button type="button" class="rounded-flexible-btn" id="descargarExcel">
                        <i class="fas fa-file-excel"></i> Descargar Excel
                    </button>
                </div>
            </div>
        </div>
    </div>
    @include('Administrador.documentos.vistapreiva')
    @include('Administrador.documentos.edit')
    @include('Administrador.documentos.create')
    @include('Administrador.documentos.pdfReporte.reporte')
@endsection
@push('links')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.bootstrap5.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
@endpush
@push('scripts')
    <!-- Incluir PDF.js desde un CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/responsive.bootstrap5.js"></script>
    <script>
        new DataTable('#documentosTable', {
            language: {
                info: '',
                infoEmpty: 'No se encontro registro',
                infoFiltered: '',
                lengthMenu: 'Paginas _MENU_',
                zeroRecords: 'No se encontro registro',
                search: 'Buscar',
            }
        });
    </script>
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
            // Obtén el modal de edición
            var editModal = new bootstrap.Modal(document.getElementById('editModal'), {
                keyboard: false
            });

            // Función para cargar los datos del documento en el formulario de edición
            document.querySelectorAll('.editButton').forEach(button => {
                button.addEventListener('click', function() {
                    // Obtener los datos del documento desde atributos data
                    const documentId = this.getAttribute('data-id');
                    const hojaDeRuta = this.getAttribute('data-hojaruta');
                    const titulo = this.getAttribute('data-titulo');
                    const fecha = this.getAttribute('data-fecha');
                    const categoria = this.getAttribute('data-categoria');
                    const cantidadFojas = this.getAttribute('data-fojas');
                    const nroCarpeta = this.getAttribute('data-carpeta');
                    const ubicacion = this.getAttribute('data-ubicacion');
                    const pdfPath = this.getAttribute(
                        'data-pdf'); // Asegúrate de que este atributo esté definido en tu botón

                    // Rellenar el formulario con los valores
                    document.getElementById('editHojaDeRuta').value = hojaDeRuta;
                    document.getElementById('editTitulo').value = titulo;
                    document.getElementById('editFecha').value = fecha;
                    document.getElementById('editCategoria').value = categoria;
                    document.getElementById('editCantidadFojas').value = cantidadFojas;
                    document.getElementById('editNroCarpeta').value = nroCarpeta;
                    document.getElementById('editUbicacion').value = ubicacion;


                    const canvas = document.getElementById('pdfPreview');
                    const ctx = canvas.getContext('2d');

                    canvas.style.width = '25%';
                    canvas.style.height = 'auto';

                    pdfjsLib.getDocument(pdfPath).promise.then(pdf => {
                        pdf.getPage(1).then(page => {
                            const viewport = page.getViewport({
                                scale: 1
                            });
                            canvas.width = viewport.width;
                            canvas.height = viewport.height;

                            const renderContext = {
                                canvasContext: ctx,
                                viewport: viewport
                            };
                            page.render(renderContext);
                        });
                    });

                    // Establecer la acción del formulario de edición con la URL correcta
                    document.getElementById('editForm').action = `/documentos/update/${documentId}`;

                    // Abrir el modal de edición
                    editModal.show();
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Modal de vista previa
            var previewModal = new bootstrap.Modal(document.getElementById('previewModal'), {
                keyboard: false
            });

            document.querySelectorAll('.preview-button').forEach(button => {
                button.addEventListener('click', function() {
                    // Obtener los datos del documento
                    const hojaDeRuta = this.getAttribute('data-hojaruta');
                    const titulo = this.getAttribute('data-titulo');
                    const fecha = this.getAttribute('data-fecha');
                    const ubicacion = this.getAttribute('data-ubicacion');
                    const pdfPath = this.getAttribute('data-pdf');

                    // Rellenar el modal con los valores
                    document.getElementById('previewHojaRuta').innerText = hojaDeRuta;
                    document.getElementById('previewTitulo').innerText = titulo;
                    document.getElementById('previewFecha').innerText = fecha;
                    document.getElementById('previewUbicacion').innerText = ubicacion;

                    // Renderizar el PDF
                    const canvas = document.getElementById('pdfPreviewCanvas');
                    const ctx = canvas.getContext('2d');

                    pdfjsLib.getDocument(pdfPath).promise.then(pdf => {
                        pdf.getPage(1).then(page => {
                            const viewport = page.getViewport({
                                scale: 1
                            });
                            canvas.width = viewport.width;
                            canvas.height = viewport.height;

                            const renderContext = {
                                canvasContext: ctx,
                                viewport: viewport
                            };
                            page.render(renderContext);
                        });
                    });

                    // Abrir el modal de vista previa
                    previewModal.show();
                });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var reporteModal = new bootstrap.Modal(document.getElementById('reporteModal'), {
                keyboard: false
            });

            document.getElementById('openModalReporte').addEventListener('click', function() {
                reporteModal.show();
            });
        });
    </script>

    <script>
        //ESTE SCRIPT ES PARA EL MANEJO DE LAS ALERTAS
        document.addEventListener("DOMContentLoaded", function() {
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: '{{ session('success') }}',
                    confirmButtonText: 'OK',
                    customClass: {
                        confirmButton: 'btn btn-success'
                    },
                    buttonsStyling: false
                });
            @endif

            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: '¡Error!',
                    text: '{{ session('error') }}',
                    confirmButtonText: 'OK',
                    customClass: {
                        confirmButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                });
            @endif
        });
    </script>
@endpush
<style>
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
