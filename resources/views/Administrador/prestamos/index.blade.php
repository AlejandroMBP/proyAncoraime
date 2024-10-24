@extends('Administrador.app')

@section('contenido')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Prestamos
                <small>Prestamo</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="../../index.html"><i class="fa fa-home"></i> Administrador</a></li>
                <li><a href="#">Gestión Documental</a></li>
                <li class="active">Prestamos</li>
            </ol>
        </section>
        <button id="print-pdf" class="btn btn-primary">Imprimir PDF</button>
        <canvas id="pdf-canvas" style="display: none;"></canvas> <!-- Canvas oculto -->
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.12.313/pdf.min.js"></script>
    <script>
        document.getElementById('print-pdf').addEventListener('click', function() {
            const pdfUrl = '/storage/documentos/tRKEmarp8ohh1Zh6t8nUruosoq0wmUeLNgL0yB7k.pdf';
            renderPDF(pdfUrl);
        });

        function renderPDF(url) {
            const loadingTask = pdfjsLib.getDocument(url);
            loadingTask.promise.then(function(pdf) {
                console.log('PDF cargado');

                // Renderizar la primera página
                pdf.getPage(1).then(function(page) {
                    console.log('Página 1 cargada');

                    const scale = 1.5; // Ajusta el tamaño de la imagen
                    const viewport = page.getViewport({
                        scale: scale
                    });

                    // Preparar el canvas usando PDF.js
                    const canvas = document.getElementById('pdf-canvas');
                    const context = canvas.getContext('2d');
                    canvas.width = viewport.width;
                    canvas.height = viewport.height;

                    // Renderizar la página en el canvas
                    const renderContext = {
                        canvasContext: context,
                        viewport: viewport
                    };
                    const renderTask = page.render(renderContext);
                    return renderTask.promise;
                }).then(function() {
                    console.log('Página renderizada');
                    printCanvas(); // Imprimir después de renderizar
                });
            }, function(reason) {
                console.error('Error al cargar el PDF:', reason);
            });
        }

        function printCanvas() {
            const canvas = document.getElementById('pdf-canvas');
            const dataUrl = canvas.toDataURL(); // Convierte el canvas a imagen

            const img = new Image();
            img.src = dataUrl;
            img.onload = function() {
                const printWindow = window.open('', '_blank');
                printWindow.document.write('<html><head><title>Imprimir PDF</title></head><body>');
                printWindow.document.write('<img src="' + dataUrl +
                '" style="max-width: 100%;"/>'); // Imagen del canvas
                printWindow.document.write('</body></html>');
                printWindow.document.close();
                printWindow.print(); // Abre el diálogo de impresión
                printWindow.close(); // Cierra la ventana de impresión
            };
        }
    </script>
@endpush
