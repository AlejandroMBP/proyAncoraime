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

    #pdfCanvas {
        height: auto;
        max-height: 300px;
        /* Ajusta la altura máxima según tus necesidades */
        border: 1px solid #ccc;
        border-radius: 10px;
        width: 100%;
        display: none;
        /* Ocultar el canvas por defecto */
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
    .custom-save-btn {
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

    .custom-save-btn {
        color: #20c997;
        /* Texto turquesa */
        border: 1px solid #20c997;
        /* Borde fino turquesa */
    }

    .custom-save-btn:hover {
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
<div class="modal fade" id="modalPrestamo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{ route('prestamos.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-dialog modal-lg">
            <div class="modal-content custom-modal">
                <div class="modal-header custom-modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Préstamo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body custom-modal-body">
                    <div class="mb-3">
                        <label for="documento" class="form-label">Documento</label>
                        <input type="text" id="documento" name="documento" class="form-control"
                            placeholder="Ingrese nombre del documento" required>
                        <div id="documento-list" class="list-group">
                        </div>
                    </div>
                    <div class="mb-3
                            row">
                        <div class="col-md-6">
                            <label for="fechaPrestamo" class="form-label">Fecha de Préstamo</label>
                            <input type="date" id="fechaPrestamo" name="fechaPrestamo" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="fechaDevolucion" class="form-label">Fecha de Devolución</label>
                            <input type="date" id="fechaDevolucion" name="fechaDevolucion" class="form-control"
                                required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="hojaRuta" class="form-label">Hoja de Ruta del Funcionario</label>
                            <input type="text" id="hojaRuta" name="hojaRuta" class="form-control"
                                placeholder="Ingrese hoja de ruta" required>
                        </div>
                        <div class="col-md-6">
                            <label for="Funcionario" class="form-label">Funcionario</label>
                            <input type="text" id="Funcionario" name="Funcionario" class="form-control"
                                placeholder="Ingrese nombre del funcionario" required>
                            <div id="funcionario-list" class="list-group"></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea id="descripcion" name="descripcion" class="form-control" rows="3" placeholder="Ingrese descripción"
                            required></textarea>
                    </div>
                </div>
                <div class="modal-footer custom-modal-footer">
                    <button type="button" class="btn btn-secondary custom-close-btn"
                        data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary custom-save-btn">Crear o Guardar</button>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#documento').on('input', function() {
            var query = $(this).val();
            if (query.length > 2) {
                $.ajax({
                    url: "{{ route('prestamos.buscar') }}",
                    type: 'GET',
                    data: {
                        query: query
                    },
                    success: function(data) {
                        $('#documento-list')
                            .empty(); // Limpiar la lista antes de añadir nuevos resultados
                        if (data.length > 0) {
                            $.each(data, function(index, documento) {
                                // Añadir cada documento como un enlace seleccionable
                                $('#documento-list').append(
                                    '<a href="#" class="list-group-item list-group-item-action" data-id="' +
                                    documento.id + '">' + documento.titulo +
                                    '</a>');
                            });
                        } else {
                            $('#documento-list').append(
                                '<div class="list-group-item">No se encontraron documentos</div>'
                            );
                        }
                    }
                });
            } else {
                $('#documento-list').empty(); // Limpiar la lista si hay menos de 3 caracteres
            }
        });

        // Capturar el clic en una opción de la lista
        $(document).on('click', '#documento-list a', function(e) {
            e.preventDefault(); // Evitar que el enlace haga su comportamiento por defecto

            // Obtener el título del documento seleccionado
            var documentoTitulo = $(this).text();
            var documentoId = $(this).data('id'); // ID del documento (si lo necesitas para el backend)

            // Llenar el campo de texto con el título seleccionado
            $('#documento').val(documentoTitulo);

            // Limpiar la lista de resultados después de la selección
            $('#documento-list').empty();
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Búsqueda de funcionarios
        $('#Funcionario').on('input', function() {
            var query = $(this).val();
            if (query.length > 2) {
                $.ajax({
                    url: "{{ route('prestamos.buscarFuncionario') }}", // Ruta para buscar funcionarios
                    type: 'GET',
                    data: {
                        query: query
                    },
                    success: function(data) {
                        $('#funcionario-list')
                            .empty(); // Limpiar la lista antes de añadir nuevos resultados
                        if (data.length > 0) {
                            $.each(data, function(index, funcionario) {
                                // Añadir cada funcionario como un enlace seleccionable
                                $('#funcionario-list').append(
                                    '<a href="#" class="list-group-item list-group-item-action" data-id="' +
                                    funcionario.id + '">' + funcionario.nombre +
                                    ' ' + funcionario.paterno + ' ' +
                                    funcionario.materno + '</a>');
                            });
                        } else {
                            $('#funcionario-list').append(
                                '<div class="list-group-item">No se encontraron funcionarios</div>'
                            );
                        }
                    }
                });
            } else {
                $('#funcionario-list').empty(); // Limpiar la lista si hay menos de 3 caracteres
            }
        });

        // Capturar el clic en una opción de la lista
        $(document).on('click', '#funcionario-list a', function(e) {
            e.preventDefault(); // Evitar que el enlace haga su comportamiento por defecto

            // Obtener el nombre del funcionario seleccionado
            var funcionarioNombre = $(this).text();
            var funcionarioId = $(this).data(
                'id'); // ID del funcionario (si lo necesitas para el backend)

            // Llenar el campo de texto con el nombre seleccionado
            $('#Funcionario').val(funcionarioNombre);

            // Limpiar la lista de resultados después de la selección
            $('#funcionario-list').empty();
        });
    });
</script>
