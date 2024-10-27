<!-- Modal para crear nueva impresión -->
<div class="modal fade" id="impresionModal" tabindex="-1" role="dialog" aria-labelledby="impresionModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content custom-modal">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title" id="impresionModalLabel">Nueva Impresión</h5>
                <button type="button" class="close custom-close-btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('impresiones.store') }}" method="POST" class="was-validated">
                @csrf
                <div class="modal-body custom-modal-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="Documento" class="form-label">Documento</label>
                            <input type="text" id="Documento" class="form-control" placeholder="Buscar Documento..."
                                autocomplete="off" name="Documento" required>
                            @error('Documento')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <select id="documentoSelect" name="Documento" class="form-control mt-2" size="5"
                                required></select>
                        </div>
                        <div class="col-md-6">
                            <label for="funcionario" class="form-label">Funcionario</label>
                            <input type="text" id="funcionario" class="form-control"
                                placeholder="Buscar Funcionario..." autocomplete="off" name="funcionario" required>
                            @error('funcionario')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <select id="funcionarioSelect" name="funcionario" class="form-control mt-2" size="5"
                                required></select>
                        </div>
                    </div>
                    <div class="md-3 row">
                        <div class="col-md-6">
                            <label for="autoridad">Autoridad / Comunidad</label>
                            <input type="text" class="form-control" id="autoridad" name="autoridad" required>
                            @error('autoridad')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="hojaRuta">Hoja de Ruta</label>
                            <input type="text" class="form-control" id="hojaRuta" name="hojaRuta" required>
                            @error('hojaRuta')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="Descripcion">Descripción</label>
                        <input type="text" class="form-control" id="Descripcion" name="Descripcion" required>
                        @error('Descripcion')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="fecha_entrega">Fecha Entrega</label>
                        <input type="date" class="form-control" id="fecha_entrega" name="fecha_entrega"
                            value="{{ date('Y-m-d') }}" readonly>
                    </div>
                </div>
                <div class="modal-footer custom-modal-footer">
                    <button type="button" class="btn custom-close-btn" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn custom-save-btn">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
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

@push('scripts')
    <script>
        $(document).ready(function() {
            // Ocultar selects al cargar la página
            $('#documentoSelect').hide();
            $('#funcionarioSelect').hide();

            // Búsqueda en tiempo real para el campo Documento
            $('#Documento').on('input', function() {
                const query = $(this).val();
                if (query) {
                    $('#documentoSelect').show(); // Mostrar el select cuando se escribe
                    $.ajax({
                        url: "/impresiones/buscar-documento",
                        method: 'GET',
                        data: {
                            query: query
                        },
                        success: function(response) {
                            $('#documentoSelect').empty();
                            response.forEach(doc => {
                                $('#documentoSelect').append(
                                    `<option value="${doc.id}">${doc.titulo}</option>`
                                );
                            });
                        }
                    });
                } else {
                    $('#documentoSelect').hide(); // Ocultar si el campo está vacío
                }
            });

            // Búsqueda en tiempo real para el campo Funcionario
            $('#funcionario').on('input', function() {
                const query = $(this).val();
                if (query) {
                    $('#funcionarioSelect').show(); // Mostrar el select cuando se escribe
                    $.ajax({
                        url: "{{ route('impresiones.bFun') }}",
                        method: 'GET',
                        data: {
                            query: query
                        },
                        success: function(response) {
                            $('#funcionarioSelect').empty();
                            response.forEach(fun => {
                                const fullName =
                                    `${fun.nombre} ${fun.paterno} ${fun.materno}`;
                                $('#funcionarioSelect').append(
                                    `<option value="${fun.id}">${fullName}</option>`
                                );
                            });
                        }
                    });
                } else {
                    $('#funcionarioSelect').hide(); // Ocultar si el campo está vacío
                }
            });

            // Ocultar select cuando el campo Documento pierde el foco
            $('#Documento').on('blur', function() {
                setTimeout(function() {
                    $('#documentoSelect').hide();
                }, 100); // Retraso para permitir seleccionar la opción antes de ocultar
            });

            // Ocultar select cuando el campo Funcionario pierde el foco
            $('#funcionario').on('blur', function() {
                setTimeout(function() {
                    $('#funcionarioSelect').hide();
                }, 100); // Retraso para permitir seleccionar la opción antes de ocultar
            });

            // Al seleccionar una opción, actualiza el valor del input y oculta el select
            $('#documentoSelect').on('change', function() {
                $('#Documento').val($('#documentoSelect option:selected').text());
                $('#documentoSelect').hide();
            });

            $('#funcionarioSelect').on('change', function() {
                $('#funcionario').val($('#funcionarioSelect option:selected').text());
                $('#funcionarioSelect').hide();
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#impresionModal form').on('submit', function(e) {
                e.preventDefault(); // Evita el envío normal del formulario

                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function(response) {
                        // Si la respuesta es exitosa, muestra SweetAlert
                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: "Impresión registrada correctamente",
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            // Redirige a la página de impresiones después de mostrar la alerta
                            window.location.href = response.redirect;
                        });
                    },
                    error: function(xhr) {
                        // Maneja los errores de validación aquí
                        if (xhr.status === 422) { // Código de error para validaciones fallidas
                            let errors = xhr.responseJSON.errors;
                            // Limpia los mensajes de error previos
                            $('.text-danger').remove();

                            // Muestra los errores debajo de los campos correspondientes
                            $.each(errors, function(key, value) {
                                let input = $(`[name="${key}"]`);
                                input.after(
                                    `<div class="text-danger">${value[0]}</div>`);
                            });
                            // Abre el modal si no está abierto
                            $('#impresionModal').modal('show');
                        }
                    }
                });
            });
        });
    </script>
@endpush
