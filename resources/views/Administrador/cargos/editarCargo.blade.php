<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content custom-modal">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title" id="exampleModalLabel">EDITAR CARGO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('/cargos/editar') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="modal-body custom-modal-body">
                    <input type="hidden" name="id" id="idEdit">
                    <div class="form-group">
                        <label for="nombre">Cargo</label>
                        <input type="text" class="form-control" name="nombre" id="nombreEdit" placeholder="nombre"
                            required>
                        <div class="invalid-feedback">
                            ingresar nombre del cargo
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input type="text" class="form-control" name="descripcion" id="descripcionEdit"
                            placeholder=" descripcion">
                    </div>
                </div>
                <div class="modal-footer custom-modal-footer">
                    <button type="button" class="btn btn-secondary custom-close-btn" data-dismiss="modal">cancelar</button>
                    <button type="submit" class="btn btn-primary custom-save-btn">Guardar</button>
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