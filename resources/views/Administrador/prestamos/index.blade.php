@extends('Administrador.app')

@section('contenido')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Prestamos Documentos Originales
                <small>Prestamo</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="../../index.html"><i class="fa fa-home"></i> Administrador</a></li>
                <li><a href="#">Gestión Documental</a></li>
                <li class="active">Prestamos</li>
            </ol>
        </section>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Mensaje de error general -->
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Errores de validación específicos -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="documentos" role="tabpanel" aria-labelledby="documentos-tab">
                <div class="card panel panel-default">
                    <div class="card-header">
                        <div class="heading-title">
                            <button class="rounded-flexible-btn" id="openModalPrestamo">Nuevo Prestamo</button>
                            <button class="rounded-flexible-btn" id="openModalReporte">Generar Reporte</button>
                        </div>
                    </div>

                    <div class="p-4">
                        <table id="prestamo-table" class="table table-striped table-bordered dt-responsive nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Hoja de Ruta</th>
                                    <th>Documento</th>
                                    <th>Fecha de prestamo</th>
                                    <th>Fecha de devolucion</th>
                                    <th>Funcionario</th>
                                    <th>Devuelto?</th>
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
                                            <td>{{ $contador }}</td> <!-- Mostrar el contador -->
                                            <td>{{ $documento->hoja_ruta }}</td>
                                            <td>{{ $documento->documento->titulo }}</td> <!-- Título del documento -->
                                            <td>{{ $documento->fecha_prestamo }}</td> <!-- Fecha de préstamo -->
                                            <td>{{ $documento->fecha_devolucion }}</td>
                                            <td>{{ $documento->funcionario->nombre }} {{ $documento->funcionario->paterno }}
                                                {{ $documento->funcionario->materno }}</td>
                                            <!-- Nombre completo del funcionario -->
                                            <td>
                                                <form action="{{ route('prestamos.update', $documento->id) }}"
                                                    method="POST" class="d-inline" id="form-{{ $documento->id }}">
                                                    @csrf
                                                    @method('PUT') <!-- Indica que es una solicitud PUT -->
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch"
                                                            id="flexSwitchCheck{{ $documento->id }}" name="devolucion"
                                                            {{ $documento->devolucion == 'si' ? 'checked' : '' }}
                                                            onchange="updateDevolucion({{ $documento->id }}, this.checked);">
                                                    </div>
                                                </form>
                                            </td>

                                            <!-- Mostrar si ha sido devuelto -->
                                            <td>
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic mixed styles example">
                                                    <form action="" method="POST" class="formbtn">
                                                        @csrf
                                                        @method('DELETE') <!-- Método DELETE para la eliminación -->
                                                        <button type="submit" class="rounded-flexible-btn delete-btn"><i
                                                                class="fas fa-trash-alt"></i></button>
                                                    </form>

                                                    <button type="button" class="rounded-flexible-btn editbutton"
                                                        data-id="{{ $documento->id }}"
                                                        data-fecha="{{ $documento->fecha_devolucion }}">
                                                        <i class="fas fa-edit"></i>
                                                    </button>

                                                    <button id="editbutton" type="button"
                                                        class="rounded-flexible-btn preview-button"
                                                        data-id="{{ $documento->id }}">
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
                </div>
            </div>
        </div>
    </div>
    @include('Administrador.prestamos.create')
    @include('Administrador.prestamos.edit')
@endsection
@push('links')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.bootstrap5.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
@endpush
@push('scripts')
    {{-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script> da conflictos con el scroll --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/responsive.bootstrap5.js"></script>
    <script>
        //script del datatables
        new DataTable('#prestamo-table', {
            language: {
                info: 'Paginas _PAGE_ of _PAGES_',
                infoEmpty: 'No hay registros',
                infoFiltered: '()',
                lengthMenu: 'Paginas  _MENU_',
                zeroRecords: 'No hay registros',
                search: 'Buscar',
            }
        });
        //script de apertura de modal de creacion
        document.addEventListener('DOMContentLoaded', function() {
            // Obtén el elemento del modal
            var modalPrestamo = new bootstrap.Modal(document.getElementById('modalPrestamo'), {
                keyboard: false // Opcional: Evitar que el modal cierre con la tecla Esc
            });

            // Abrir el modal cuando sea necesario
            document.getElementById('openModalPrestamo').addEventListener('click', function() {
                modalPrestamo.show(); // Muestra el modal
            });
        });
    </script>
    <script>
        function updateDevolucion(id, isChecked) {
            // Crear la URL para la solicitud AJAX
            const url = "{{ url('/prestamos') }}/" + id;

            // Crear el dato a enviar
            const data = {
                _method: 'PUT', // Necesario para indicar que es una actualización
                _token: '{{ csrf_token() }}', // Agrega el token CSRF
                devolucion: isChecked ? 'si' : 'no' // Cambia el valor según el estado del switch
            };

            // Realiza la solicitud AJAX
            fetch(url, {
                    method: 'POST', // Se usa POST porque Laravel usa un método oculto para PUT
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}', // Asegúrate de incluir el token CSRF
                    },
                    body: JSON.stringify(data)
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error en la actualización');
                    }
                    return response.json();
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var modaleditar = new bootstrap.Modal(document.getElementById('modaleditar'), {
                keyboard: false
            });

            // Selecciona todos los botones de editar
            var editButtons = document.querySelectorAll('.editbutton');
            editButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var documentoId = this.getAttribute('data-id');
                    var fechaDevolucion = this.getAttribute(
                    'data-fecha'); // Asegúrate de que el formato sea YYYY-MM-DD
                    console.log("Fecha recuperada:",
                    fechaDevolucion); // Debugging: Verificar valor de fecha

                    // Configura la acción del formulario para la ID del documento
                    var form = document.getElementById('editarFechaDevolucionForm');
                    form.action = '/prestamos/edit/' + documentoId;

                    // Asignar el valor al campo de fecha y asegurar formato correcto
                    document.getElementById('fechaDevolucion').value = fechaDevolucion || '';

                    // Muestra el modal
                    modaleditar.show();
                });
            });
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
