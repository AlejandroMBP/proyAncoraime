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
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{ route('documentos.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="modal-dialog modal-lg">
            <div class="modal-content custom-modal">
                <div class="modal-header custom-modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Documento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body custom-modal-body">
                    <div class="mb-3">
                        <label for="hojaDeRuta" class="form-label">Hoja de ruta</label>
                        <input type="text" id="hojaDeRuta" name="hojaDeRuta" class="form-control"
                            placeholder="Ingrese hoja de ruta" required>

                    </div>
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Descripcion del Documento</label>
                        <input type="text" id="titulo" name="titulo" class="form-control"
                            placeholder="Ingrese título" required>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-8">
                            <label for="documentoPDF" class="form-label">Documento PDF</label>
                            <input type="file" id="documentoPDF" name="documentoPDF" class="form-control"
                                accept="application/pdf" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Vista previa del PDF</label>
                            <canvas id="pdfCanvas"
                                style="border: 1px solid #ccc; border-radius: 10px; width: 100%; display: none;"></canvas>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-3">
                            <label for="fecha" class="form-label">Fecha Inicio de Tramite</label>
                            <input type="date" id="fecha" name="fecha" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <label for="categoria" class="form-label">Tipo de documento</label>
                            <select id="categoria" name="categoria" class="form-select" required>
                                <option value="" disabled selected>Seleccione una categoría</option>
                                @foreach ($tiposDocumentos as $tipoDocumento)
                                    @if ($tipoDocumento->estado == 1)
                                        <option value="{{ $tipoDocumento->id }}">
                                            {{ $tipoDocumento->descripcion }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="cantidadFojas" class="form-label">Cantidad de fojas</label>
                            <input type="number" id="cantidadFojas" name="cantidadFojas" class="form-control"
                                placeholder="Cantidad" required>
                        </div>
                        <div class="col-md-3">
                            <label for="nroCarpeta" class="form-label">Nro. Carpeta</label>
                            <input type="number" id="nroCarpeta" name="nroCarpeta" class="form-control"
                                placeholder="Nro. Carpeta" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="ubicacion" class="form-label">Ubicación del Documento</label>
                        <input type="text" id="ubicacion" name="ubicacion" class="form-control"
                            placeholder="Ingrese ubicación" required>
                    </div>
                </div>
                <div class="modal-footer custom-modal-footer">
                    <button type="button" class="btn btn-secondary custom-close-btn"
                        data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary custom-save-btn">Guardar cambios</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    //SCRIP create
    const fileInput = document.getElementById('documentoPDF');
    const canvas = document.getElementById('pdfCanvas');
    const ctx = canvas.getContext('2d');

    fileInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file && file.type === 'application/pdf') {
            const fileURL = URL.createObjectURL(file);

            canvas.style.display = 'block';
            pdfjsLib.getDocument(fileURL).promise.then(pdf => {
                pdf.getPage(1).then(page => {
                    const viewport = page.getViewport({
                        scale: 1
                    });
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    const renderContext = {
                        canvasContext: ctx,
                        viewport: viewport
                    };
                    page.render(renderContext);
                });
            }).catch(err => {
                console.error('Error al cargar el PDF:', err);
            });
        } else {
            alert('Por favor seleccione un archivo PDF válido.');
            canvas.style.display = 'none';
        }
    });
</script>
