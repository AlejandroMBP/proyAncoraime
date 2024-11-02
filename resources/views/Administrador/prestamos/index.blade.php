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
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="documentos" role="tabpanel" aria-labelledby="documentos-tab">
                <div class="card panel panel-default">
                    <div class="card-header">
                        <div class="heading-title">
                            <button class="rounded-flexible-btn" id="openModalPrestamo">Nuevo Prestamo</button>
                            <button class="rounded-flexible-btn" id="openModalReportePrestamo">Generar Reporte</button>
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
                                            <td id="fecha-devolucion-{{ $documento->id }}">
                                                {{ $documento->fecha_devolucion }}</td>


                                            <td>{{ $documento->funcionario->nombre }}
                                                {{ $documento->funcionario->paterno }}
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
                                                    <form action="{{ route('prestamos.cambioEstado', $documento->id) }}"
                                                        method="POST" class="formbtn"
                                                        onsubmit="return confirmDelete(event)">
                                                        @csrf
                                                        <button type="submit" class="rounded-flexible-btn delete-btn"><i
                                                                class="fas fa-trash-alt"></i></button>
                                                    </form>

                                                    <button type="button" class="rounded-flexible-btn editbutton"
                                                        data-id="{{ $documento->id }}"
                                                        data-fecha = "{{ $documento->fecha_devolucion }}">

                                                        <i class="fas fa-edit"></i>
                                                    </button>

                                                    <button type="button" class="rounded-flexible-btn preview-button ver"
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

    <!-- Modal para editar devolución -->
    <div class="modal fade" id="editDevolucionModal" tabindex="-1" aria-labelledby="editDevolucionLabel"
        aria-hidden="true">
        <div class="modal-dialog "> <!-- Añadido modal-lg -->
            <div class="modal-content custom-modal"> <!-- Aplicando la clase custom-modal -->
                <form id="editDevolucionForm">
                    <div class="modal-header custom-modal-header"> <!-- Aplicando la clase custom-modal-header -->
                        <h5 class="modal-title" id="editDevolucionLabel">Editar Fecha de Devolución</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body custom-modal-body"> <!-- Aplicando la clase custom-modal-body -->
                        <input type="hidden" id="documento_id" name="documento_id">
                        <div class="mb-3">
                            <label for="fecha_devolucion" class="form-label">Fecha de Devolución</label>
                            <input type="date" class="form-control" id="fecha_devolucion" name="fecha_devolucion">
                            @error('fecha_devolucion')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer custom-modal-footer"> <!-- Aplicando la clase custom-modal-footer -->
                        <button type="button" class="btn btn-secondary custom-close-btn"
                            data-bs-dismiss="modal">Cerrar</button> <!-- Aplicando la clase custom-close-btn -->
                        <button type="submit" class="custom-save-btn-lin">Guardar cambios</button>
                        <!-- Aplicando la clase custom-save-btn -->
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('Administrador.prestamos.reporte')
    @include('Administrador.prestamos.create')
    @include('Administrador.prestamos.vista')
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
    {{-- Inicializar DataTable solo una vez --}}
    <script>
        $(document).ready(function() {
            //
            var table = new DataTable('#prestamo-table', {
                language: {
                    info: 'Páginas _PAGE_ de _PAGES_',
                    infoEmpty: 'No hay registros',
                    infoFiltered: '()',
                    lengthMenu: 'Páginas _MENU_',
                    zeroRecords: 'No hay registros',
                    search: 'Buscar',
                }
            });
        });
    </script>
    {{-- script de apertura de modal de creacion --}}
    <script>
        //
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
    {{-- SCRIPT PARA MODIFICAR POR AJAX EL BOTON DE DEVOLUCION --}}
    <script>
        //
        function updateDevolucion(id, isChecked) {
            const url = "{{ url('/prestamos') }}/" + id;

            const data = {
                _method: 'PUT',
                _token: '{{ csrf_token() }}',
                devolucion: isChecked ? 'si' : 'no'
            };
            fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
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
    {{-- FUNCION Y EDIT PARA LA FECHA DE DEVOLUCION --}}
    <script>
        //
        document.addEventListener("DOMContentLoaded", function() {
            // Captura de todos los botones de edición
            const editButtons = document.querySelectorAll(".editButton");

            editButtons.forEach(button => {
                button.addEventListener("click", function() {
                    // Obtener el ID y fecha de devolución desde el botón
                    const documentoId = button.getAttribute("data-id");
                    const fechaDevolucion = button.getAttribute("data-fecha");


                    // Asignar los valores al formulario en el modal
                    document.getElementById("documento_id").value = documentoId;
                    document.getElementById("fecha_devolucion").value = fechaDevolucion;
                    console.log("Fecha de devolución:", fechaDevolucion);

                    // Abrir el modal
                    const modal = new bootstrap.Modal(document.getElementById(
                        'editDevolucionModal'));
                    modal.show();


                });
            });

            // Manejo del envío del formulario
            document.getElementById("editDevolucionForm").addEventListener("submit", function(e) {
                e.preventDefault(); // Prevenir el envío por defecto del formulario

                const documentoId = document.getElementById("documento_id").value;
                const url = `/prestamos/edit/${documentoId}`; // URL específica para la actualización
                const formData = new FormData(this);

                fetch(url, {
                        method: 'POST', // Enviar como POST para que Laravel lo interprete correctamente
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}' // Protege la solicitud con CSRF
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Mensaje de éxito utilizando SweetAlert2
                            Swal.fire({
                                icon: 'success',
                                title: '¡Guardado exitoso!',
                                text: 'La fecha de devolución ha sido actualizada.',
                                confirmButtonText: 'Aceptar'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // Recargar la página después de cerrar el diálogo
                                    location.reload();
                                }
                            });

                            // Actualizar el contenido de la tabla sin recargar
                            const fechaDevolucionCell = document.querySelector(
                                `#fecha-devolucion-${documentoId}`);
                            if (fechaDevolucionCell) {
                                fechaDevolucionCell.textContent = document.getElementById(
                                    "fecha_devolucion").value; // Actualiza la celda con la nueva fecha
                            }

                            // Cierra el modal
                            const modal = bootstrap.Modal.getInstance(document.getElementById(
                                'editDevolucionModal'));
                            modal.hide();
                        } else {
                            // Mensaje de error utilizando SweetAlert2
                            Swal.fire({
                                icon: "error",
                                title: "Error al actualizar la fecha",
                                text: data.message || "Ocurrió un error inesperado.",
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        // Mensaje de error genérico utilizando SweetAlert2
                        Swal.fire({
                            icon: "error",
                            title: "Ocurrió un error",
                            text: "No se pudo actualizar la fecha de devolución. Por favor, inténtalo de nuevo.",
                        });
                    });
            });
        });
    </script>
    {{-- MODAL DE LA VISTA PREVIA DE LOS DATOS DE CADA REGISTRO --}}
    <script>
        //
        document.addEventListener('DOMContentLoaded', function() {
            // Selecciona todos los botones "ver"
            const botonesVer = document.querySelectorAll('.preview-button');

            botonesVer.forEach(button => {
                button.addEventListener('click', function() {
                    const documentoId = this.getAttribute('data-id');
                    console.log('ID del documento:',
                        documentoId); // Verifica que se obtenga el ID correctamente

                    // Hacer una solicitud AJAX para obtener los detalles del préstamo
                    fetch(`/prestamos/show/${documentoId}`) // Cambia la ruta según tu configuración
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Error en la respuesta del servidor');
                            }
                            return response.json();
                        })
                        .then(data => {
                            console.log('Datos del préstamo:',
                                data); // Verifica que se obtengan los datos correctamente

                            // Rellenar el modal con los datos del préstamo
                            document.getElementById('hoja_ruta').innerText = data.hoja_ruta;

                            document.getElementById('fecha_prestamo').innerText = data
                                .fecha_prestamo;
                            document.getElementById('campo-fecha_devolucion').innerText = data
                                .fecha_devolucion;
                            document.getElementById('funcionario').innerText =
                                `${data.funcionario.nombre} ${data.funcionario.paterno} ${data.funcionario.materno}`;

                            document.getElementById('campo-descripcion').innerText = data
                                .descripcion || 'N/A';
                            // console.log(data.fecha_devolucion);
                            document.getElementById('devolucion').innerText = data
                                .devolucion === 'si' ? 'Devolución realizada' :
                                'No devolvió'; // Ajusta según tu lógica


                            // Mostrar el modal utilizando Bootstrap 5
                            const modal = new bootstrap.Modal(document.getElementById(
                                'viewPrestamoModal'));
                            modal.show();
                        })
                        .catch(error => {
                            console.error('Error al obtener los detalles del préstamo:', error);
                        });
                });
            });
        });
    </script>
    {{-- APERTURA DEL MODAL DE REPORTES --}}
    <script>
        //APERTURA DEL MODAL DE REPORTES
        document.addEventListener('DOMContentLoaded', function() {
            var reportePrestamoModal = new bootstrap.Modal(document.getElementById('reportePrestamoModal'), {
                keyboard: false
            });

            document.getElementById('openModalReportePrestamo').addEventListener('click', function() {
                reportePrestamoModal.show();
            });
        });
    </script>
    {{-- cuestion para cambio de estado --}}
    <script>
        function confirmDelete(event) {
            event.preventDefault(); // Previene el envío del formulario inmediato

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
                confirmButtonText: "Sí, eliminarlo!",
                cancelButtonText: "No, cancelar!",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si se confirma, se envía el formulario
                    event.target.submit(); // Aquí se envía el formulario
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire({
                        title: "Cancelado",
                        text: "Tu archivo está a salvo :)",
                        icon: "error"
                    });
                }
            });

            return false; // Para asegurarnos de que no se envía el formulario hasta que se confirme
        }
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
<style>
    .modal-lg {
        max-width: 1000px;
        /* Ajusta este valor según tus necesidades */
    }

    .custom-modal {
        background: linear-gradient(135deg, #007bff, #20c997);
        border-radius: 15px;
        /* Bordes redondeados */
        color: white;
        /* Texto blanco */
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        /* Sombra suave */
        border: none;
        /* Sin bordes */
    }

    .custom-modal-header {
        border-bottom: none;
        /* Sin borde inferior */
    }

    .custom-modal-body {
        background-color: white;
        /* Fondo blanco para buen contraste con el texto */
        color: #333;
        /* Texto oscuro */
        padding: 20px;
        /* Espaciado interno */
        border-radius: 0 0 15px 15px;
        /* Redondeado inferior para el cuerpo del modal */
    }

    .custom-modal-footer {
        background-color: transparent;
        /* Fondo transparente para un look minimalista */
        border-top: none;
        /* Sin borde superior */
    }

    .form-select {
        height: calc(2.25rem + 2px);
        /* Altura ajustada para que coincida con otros campos */
        padding: .375rem .75rem;
        /* Espaciado interno */
        font-size: 1rem;
        /* Tamaño de fuente */
        background: transparent;
        /* Fondo transparente */
        border: 1px solid rgba(0, 0, 0, 0.1);
        /* Borde sutil */
        border-radius: 5px;
        /* Bordes redondeados */
        background-image: linear-gradient(to bottom right, rgba(0, 123, 255, 0.3), rgba(0, 255, 255, 0.3));
        /* Degradado azul a turquesa */
        color: #000;
        /* Color del texto */
        transition: border-color 1s ease, background-color 1s ease;
        /* Transición suave para el color del borde y el fondo */
    }

    .form-select:focus {
        background: transparent;
        /* Mantener fondo transparente en foco */
        border-color: rgba(0, 123, 255, 0.8);
        /* Cambiar el color del borde en foco */
        outline: none;
        /* Sin contorno en el foco */
    }

    .form-select:hover {
        transition: 0.5s;
        background-color: rgba(0, 123, 255, 0.2);
        /* Cambiar el fondo al pasar el cursor */
        border-color: rgba(0, 255, 255, 0.6);
        /* Cambiar el color del borde al pasar el cursor */
    }

    .form-label {
        margin-bottom: .5rem;
        /* Espaciado entre la etiqueta y el campo */
    }

    .row {
        margin-bottom: 1rem;
        /* Espaciado entre filas */
    }

    .custom-close-btn,
    .custom-save-btn-lin {
        background-color: white;
        /* Botón blanco minimalista */
        border: 1px solid #007bff;
        /* Borde fino azul */
        border-radius: 50px;
        /* Botón redondeado */
        padding: 10px 20px;
        transition: all 0.3s ease;
        /* Transición suave */
    }

    .custom-close-btn:hover {
        background-color: rgb(0, 194, 253);
        /* Cambiar a azul en hover */
        color: white;
        /* Texto blanco en hover */
        box-shadow: 0 0 15px rgb(25, 243, 177);
        /* Resplandor turquesa suave */
    }

    .custom-save-btn-lin {
        color: #20c997;
        /* Texto turquesa */
        border: 1px solid #20c997;
        /* Borde fino turquesa */
    }

    .custom-save-btn-lin:hover {
        background-color: #20c997;
        /* Cambiar a turquesa en hover */
        color: white;
        /* Texto blanco en hover */
        box-shadow: 0 0 10px rgba(0, 123, 255, 0.3);
        /* Resplandor azul suave */
    }

    /* Estilos minimalistas del modal */
    .custom-modal {
        background: linear-gradient(135deg, #007bff, #20c997);
        /* Degradado azul a turquesa */
        border-radius: 15px;
        /* Bordes redondeados */
        color: white;
        /* Texto blanco */
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        /* Sombra suave */
        border: none;
        /* Sin bordes */
    }

    /* Estilo para el encabezado del modal */
    .custom-modal-header {
        border-bottom: none;
        /* Sin borde inferior */
    }

    /* Estilo para el cuerpo del modal */
    .custom-modal-body {
        background-color: white;
        /* Fondo blanco para buen contraste con el texto */
        color: #333;
        /* Texto oscuro */
        padding: 20px;
        border-radius: 0 0 15px 15px;
        /* Redondeado inferior para el cuerpo del modal */
    }

    /* Estilo para el pie del modal */
    .custom-modal-footer {
        background-color: transparent;
        /* Fondo transparente para un look minimalista */
        border-top: none;
        /* Sin borde superior */
    }

    /* Estilo para el botón de "Cerrar" */
    .custom-close-btn {
        background-color: white;
        /* Botón blanco minimalista */
        color: #007bff;
        /* Texto azul */
        border: 1px solid #007bff;
        /* Borde fino azul */
        border-radius: 50px;
        /* Botón redondeado */
        padding: 10px 20px;
        transition: all 0.3s ease;
        /* Transición suave */
    }

    .custom-close-btn:hover {
        transition: 0.8s;
        background-color: rgb(0, 194, 253);
        /* Cambiar a azul en hover  #007bff*/
        color: white;
        /* Texto blanco en hover */
        box-shadow: 0 0 15px rgb(25, 243, 177);
        /* Resplandor turquesa suave */

    }

    /* Estilo para el botón de "Guardar cambios" */
    .custom-save-btn {
        background-color: white;
        /* Botón blanco minimalista */
        color: #20c997;
        /* Texto turquesa */
        border: 1px solid #20c997;
        /* Borde fino turquesa */
        border-radius: 50px;
        /* Botón redondeado */
        padding: 10px 20px;
        transition: all 0.3s ease;
    }

    .custom-save-btn:hover {
        background-color: #20c997;
        /* Cambiar a turquesa en hover */
        color: white;
        /* Texto blanco en hover */
        box-shadow: 0 0 10px rgba(0, 123, 255, 0.3);
        /* Resplandor azul suave */
    }

    /* Ajuste general para los botones */
    .custom-modal-footer .btn {
        border-radius: 50px;
        /* Bordes redondeados */
    }
</style>