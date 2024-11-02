<div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="previewModalLabel">Vista Previa del Documento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="preview-info"><strong>Hoja de Ruta:</strong> <span id="previewHojaRuta"></span></p>
                <p class="preview-info"><strong>Título:</strong> <span id="previewTitulo"></span></p>
                <p class="preview-info"><strong>Fecha:</strong> <span id="previewFecha"></span></p>
                <p class="preview-info"><strong>Ubicación:</strong> <span id="previewUbicacion"></span></p>
                <div class="canvas-container">
                    <canvas id="pdfPreviewCanvas"></canvas>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="custom-close-btn" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="previewModalLabel">Vista Previa del Documento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="preview-info"><strong>Hoja de Ruta:</strong> <span id="previewHojaRuta"></span></p>
                <p class="preview-info"><strong>Título:</strong> <span id="previewTitulo"></span></p>
                <p class="preview-info"><strong>Fecha:</strong> <span id="previewFecha"></span></p>
                <p class="preview-info"><strong>Ubicación:</strong> <span id="previewUbicacion"></span></p>
                <div class="canvas-container">
                    <canvas id="pdfPreviewCanvas"></canvas>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="custom-close-btn" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<style>
    .modal-title {
        color: white;
    }

    .modal-content {
        background: linear-gradient(120deg, rgba(0, 153, 255, 0.2), rgba(0, 204, 204, 0.2), rgba(0, 255, 128, 0.2));
        /* Degradado suave de azul a verde turquesa, más sutil */
        border-radius: 10px;
        /* Bordes redondeados en el modal */
        padding: 20px;
        /* Espaciado interno del modal */
    }

    .modal-body {
        text-align: center;
        /* Centra el texto de los párrafos */
    }

    .preview-info {
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

    .canvas-container {
        display: flex;
        /* Usar flexbox */
        justify-content: center;
        /* Centrar el canvas */
        margin: 20px 0;
        /* Espaciado alrededor del canvas */
    }

    #pdfPreviewCanvas {
        width: 80%;
        /* Ajusta el tamaño del canvas al 25% */
        height: auto;
        /* Mantiene la relación de aspecto */
        border: 2px solid rgba(0, 204, 204, 0.5);
        /* Borde suave en el canvas */
        border-radius: 10px;
        /* Bordes redondeados */
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        /* Sombra suave para dar profundidad */
    }
</style>