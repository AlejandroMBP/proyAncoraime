<style>
    .is-valid {
        border-color: #28a745;
        /* Verde */
    }

    .is-invalid {
        border-color: #dc3545;
        /* Rojo */
    }

    .invalid-feedback {
        display: none;
    }

    input:invalid~.invalid-feedback,
    textarea:invalid~.invalid-feedback {
        display: block;
    }

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
<div class="modal fade" id="modalPrestamo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    @if ($errors->any()) style="display: block;" @endif>
    <form id="prestamoForm" action="{{ route('prestamos.store') }}" method="post" enctype="multipart/form-data">
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
                            placeholder="Ingrese nombre del documento" required value="{{ old('documento') }}">
                        <div id="documento-list" class="list-group"></div>
                        @error('documento')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="fechaPrestamo" class="form-label">Fecha de Préstamo</label>
                            <input type="date" id="fechaPrestamo" name="fechaPrestamo" class="form-control"
                                value="{{ date('Y-m-d') }}" required disabled>
                            <input type="hidden" name="fechaPrestamoHidden" value="{{ date('Y-m-d') }}">
                            @error('fechaPrestamoHidden')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="fechaDevolucion" class="form-label">Fecha de Devolución</label>
                            <input type="date" id="fechaDevolucion" name="fechaDevolucion" class="form-control"
                                required value="{{ old('fechaDevolucion') }}">
                            @error('fechaDevolucion')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="hojaRuta" class="form-label">Hoja de Ruta del Funcionario</label>
                            <input type="text" id="hojaRuta" name="hojaRuta" class="form-control"
                                placeholder="Ingrese hoja de ruta" required pattern="\d+"
                                value="{{ old('hojaRuta') }}">
                            @error('hojaRuta')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 position-relative">
                            <label for="Funcionario" class="form-label">Funcionario</label>
                            <input type="text" id="FuncionarioInput" class="form-control"
                                placeholder="Ingrese nombre del funcionario" onkeyup="filtrarFuncionarios()">
                            <input type="hidden" id="FuncionarioId" name="funcionario_id"
                                value="{{ old('funcionario_id') }}">
                            <div id="funcionario-list" class="list-group position-absolute w-100 mt-1"
                                style="z-index: 1000; display: none;">
                                <!-- Opciones de funcionarios se mostrarán aquí -->
                                @foreach ($funcionario as $funcionarios)
                                    <a href="javascript:void(0);" class="list-group-item list-group-item-action"
                                        onclick="seleccionarFuncionario('{{ $funcionarios->nombre }} {{ $funcionarios->paterno }} {{ $funcionarios->materno }}', '{{ $funcionarios->id }}')">
                                        {{ $funcionarios->nombre }} {{ $funcionarios->paterno }}
                                        {{ $funcionarios->materno }}
                                    </a>
                                @endforeach
                            </div>
                            @error('funcionario_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea id="descripcion" name="descripcion" class="form-control" rows="3" placeholder="Ingrese descripción"
                            required>{{ old('descripcion') }}</textarea>
                        @error('descripcion')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
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
{{-- SCRIP PARA LAS VALIDACIONES DE REGISTRO --}}
@if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var modal = new bootstrap.Modal(document.getElementById('modalPrestamo'));
            modal.show();
        });
    </script>
@endif
<script>
    document.addEventListener('DOMContentLoaded', function() {
        @if (session('success'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 1500
            });
        @endif
    });
</script>

{{-- FIN DE SECCION DE VALIDACION --}}
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
    document.addEventListener('DOMContentLoaded', function() {
        const input = document.getElementById('Funcionario');
        const funcionarioListItems = document.querySelectorAll('.list-group-item');

        input.addEventListener('input', function() {
            const query = this.value.toLowerCase();

            funcionarioListItems.forEach(function(item) {
                const text = item.textContent.toLowerCase();
                if (text.includes(query)) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
</script>

<script>
    function filtrarFuncionarios() {
        const input = document.getElementById('FuncionarioInput').value.toLowerCase();
        const list = document.getElementById('funcionario-list');
        const items = list.getElementsByClassName('list-group-item');

        let hasMatch = false;

        for (let i = 0; i < items.length; i++) {
            const itemText = items[i].textContent.toLowerCase();
            if (itemText.includes(input)) {
                items[i].style.display = ''; // Muestra el item
                hasMatch = true;
            } else {
                items[i].style.display = 'none'; // Oculta el item
            }
        }

        // Muestra el panel si hay coincidencias; de lo contrario, lo oculta
        list.style.display = hasMatch ? 'block' : 'none';
    }

    function seleccionarFuncionario(nombreCompleto, id) {
        // Asigna el nombre seleccionado al input de búsqueda
        document.getElementById('FuncionarioInput').value = nombreCompleto;
        // Asigna el id del funcionario al campo oculto para enviarlo con el formulario
        document.getElementById('FuncionarioId').value = id;
        // Oculta la lista de sugerencias
        document.getElementById('funcionario-list').style.display = 'none';
    }


    // Ocultar el desplegable si se hace clic fuera del área de búsqueda
    document.addEventListener('click', function(event) {
        const list = document.getElementById('funcionario-list');
        const input = document.getElementById('FuncionarioInput');
        if (!list.contains(event.target) && event.target !== input) {
            list.style.display = 'none';
        }
    });
</script>
{{-- !CUIDADO CON ESTOS SCRIPTS !!! --}}
{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        const inputFuncionario = document.getElementById('FuncionarioInput');
        const submitButton = document.querySelector('.custom-save-btn');

        function toggleSubmitButton() {
            // Habilita el botón solo si hay un ID de funcionario
            const funcionarioId = document.getElementById('FuncionarioId').value;
            submitButton.disabled = !funcionarioId;
        }

        // Verifica el campo al cargar y al escribir
        inputFuncionario.addEventListener('input', toggleSubmitButton);
        toggleSubmitButton(); // Verifica el estado al cargar la página
    });
</script> --}}

{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        const prestamoForm = document.getElementById('prestamoForm');
        const submitButton = prestamoForm.querySelector('.custom-save-btn');
        const fechaPrestamo = document.getElementById('fechaPrestamo');
        const today = new Date().toISOString().split('T')[0]; // Formato YYYY-MM-DD
        fechaPrestamo.value = today;

        // Validar los campos al cambiar
        prestamoForm.addEventListener('input', function(event) {
            const target = event.target;
            if (target.checkValidity()) {
                target.classList.remove('is-invalid');
                target.classList.add('is-valid');
            } else {
                target.classList.remove('is-valid');
                target.classList.add('is-invalid');
            }
            toggleSubmitButton();
        });

        // Función para habilitar o deshabilitar el botón de envío
        function toggleSubmitButton() {
            const allValid = [...prestamoForm.elements].every(input => input.checkValidity());
            submitButton.disabled = !allValid;
        }
    });
</script> --}}

<script>
    $(document).ready(function() {
        // Evento para limpiar el formulario al cerrar el modal
        $('#modalPrestamo').on('hidden.bs.modal', function() {
            $(this).find('form')[0].reset(); // Resetea el formulario
            $('#documento-list').empty(); // Limpia la lista de documentos
            $('#funcionario-list').hide(); // Oculta la lista de funcionarios
        });

        $('#documento').on('input', function() {
            var query = $(this).val();
            if (query.length > 0) {
                // Aquí va tu lógica para filtrar los documentos
            } else {
                $('#documento-list').empty(); // Limpia la lista si no hay entrada
            }
        });
    });
</script>
