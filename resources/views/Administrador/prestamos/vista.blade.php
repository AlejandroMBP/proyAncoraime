<div class="modal modal-custom" id="viewPrestamoModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detalles del Préstamo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="preview-info"><strong>Hoja de Ruta:</strong> <span id="hoja_ruta"></span></p>
                <p class="preview-info"><strong>Fecha de Préstamo:</strong> <span id="fecha_prestamo"></span></p>
                <p class="preview-info"><strong>Funcionario:</strong> <span id="funcionario"></span></p>
                <p class="preview-info"><strong>Fecha de Devolución:</strong> <span id="campo-fecha_devolucion"></span>
                </p>
                <p class="preview-info"><strong>Descripción:</strong> <span id="campo-descripcion"></span></p>
                <p class="preview-info"><strong>Devolución:</strong> <span id="devolucion"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<style>
    /* Estilos para el modal personalizado */
    .modal-custom .modal-title {
        color: white;
        /* Color del título */
    }

    .modal-custom .modal-content {
        background: linear-gradient(120deg, rgba(0, 153, 255, 0.7), rgba(0, 204, 204, 0.7), rgba(0, 255, 128, 0.7));
        /* Degradado suave de azul a verde turquesa */
        border-radius: 10px;
        /* Bordes redondeados en el modal */
        padding: 20px;
        /* Espaciado interno del modal */
        max-width: 500px;
        /* Ancho máximo del modal */
        margin: auto;
        /* Centra el modal en la pantalla */
    }

    .modal-custom .modal-body {
        text-align: center;
        /* Centra el texto de los párrafos */
    }

    .modal-custom .preview-info {
        background: white;
        /* Fondo blanco para los párrafos */
        border: 1px solid rgba(0, 0, 0, 0.1);
        /* Borde sutil para dar un distintivo */
        padding: 10px;
        /* Espaciado interno */
        border-radius: 5px;
        /* Bordes redondeados */
        margin: 5px 0;
        /* Espaciado entre párrafos */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        /* Sombra suave para un efecto elevado */
    }
</style>
