@extends('Administrador.app')

@section('contenido')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Impresiones
                <small>Impresiones</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="../../index.html"><i class="fa fa-home"></i> Administrador</a></li>
                <li><a href="#">Gestión Documental</a></li>
                <li class="active">Impresiones</li>
            </ol>
        </section>

        <div class="alert alert-warning">
            <strong>Advertencia:</strong> Este documento es confidencial. No se permite la descarga o distribución sin
            autorización.
        </div>

        <div id="pdf-container"></div>

        <button onclick="printPDF()">Imprimir PDF</button>
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
    <script>
        const url = 'storage/documentos/tRKEmarp8ohh1Zh6t8nUruosoq0wmUeLNgL0yB7k.pdf'; // Cambia esta URL a tu documento

        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js';

        const pagePromises = [];

        const loadingTask = pdfjsLib.getDocument(url);
        loadingTask.promise.then(pdf => {
            const pdfContainer = document.getElementById('pdf-container');
            for (let pageNumber = 1; pageNumber <= pdf.numPages; pageNumber++) {
                pagePromises.push(pdf.getPage(pageNumber).then(page => {
                    const scale = 1.5;
                    const viewport = page.getViewport({
                        scale
                    });
                    const canvas = document.createElement('canvas');
                    const context = canvas.getContext('2d');
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    const renderContext = {
                        canvasContext: context,
                        viewport: viewport
                    };
                    return page.render(renderContext).promise.then(() => {
                        pdfContainer.appendChild(canvas);
                    });
                }));
            }
        });



        // function printPDF() {
        //     const pdfUrl = 'storage/documentos/tRKEmarp8ohh1Zh6t8nUruosoq0wmUeLNgL0yB7k.pdf'; // URL del PDF

        //     // Crear una nueva ventana para el PDF
        //     const printWindow = window.open('', '_blank');

        //     // Escribir el HTML básico en la nueva ventana
        //     printWindow.document.write('<html><head><title>Imprimir PDF</title></head><body>');
        //     printWindow.document.write('<embed src="' + pdfUrl + '" type="application/pdf" width="100%" height="100%"/>');
        //     printWindow.document.write('</body></html>');
        //     printWindow.document.close(); // Cierra el documento para permitir que el contenido se procese

        //     // Llama al diálogo de impresión después de que la ventana se haya cargado
        //     printWindow.onload = function() {
        //         printWindow.print(); // Llama al diálogo de impresión
        //         setTimeout(() => {
        //             printWindow.close(); // Cierra la ventana después de un retraso
        //         }, 3000); // Espera 3 segundos antes de cerrar la ventana
        //     };
        // }

        // function printPDF() {
        //     const pdfUrl = 'storage/documentos/tRKEmarp8ohh1Zh6t8nUruosoq0wmUeLNgL0yB7k.pdf'; // URL del PDF

        //     // Crear una nueva ventana para el PDF
        //     const printWindow = window.open('', '_blank');

        //     // Inicializa PDF.js
        //     pdfjsLib.getDocument(pdfUrl).promise.then(pdf => {
        //         const totalPages = pdf.numPages;
        //         const totalOddPages = Math.ceil(totalPages / 2); // Total de páginas impares
        //         let pdfContent =
        //             '<html><head><title>Imprimir PDF</title></head><body style="margin: 0; padding: 0;">';
        //         pdfContent +=
        //         `<h3>Imprimiendo ${totalOddPages} páginas impares</h3>`; // Mensaje con el total de páginas

        //         // Renderizar solo las páginas impares
        //         const renderPages = [];
        //         for (let pageNumber = 1; pageNumber <= totalPages; pageNumber += 2) { // Incrementar de 2 en 2
        //             renderPages.push(pdf.getPage(pageNumber).then(page => {
        //                 const scale = 1.5; // Escala para ajustar el tamaño
        //                 const viewport = page.getViewport({
        //                     scale
        //                 });
        //                 const canvas = document.createElement('canvas');
        //                 const context = canvas.getContext('2d');
        //                 canvas.height = viewport.height;
        //                 canvas.width = viewport.width;

        //                 return page.render({
        //                     canvasContext: context,
        //                     viewport
        //                 }).promise.then(() => {
        //                     // Asegúrate de que el canvas no esté vacío
        //                     const imgData = canvas.toDataURL();
        //                     pdfContent +=
        //                         `<img src="${imgData}" style="display: block; margin: 0; page-break-after: always;"/>`;
        //                 });
        //             }));
        //         }

        //         // Espera a que se rendericen todas las páginas
        //         Promise.all(renderPages).then(() => {
        //             pdfContent += '</body></html>';
        //             printWindow.document.write(pdfContent);
        //             printWindow.document
        //         .close(); // Cierra el documento para permitir que el contenido se procese

        //             // Llama al diálogo de impresión después de que la ventana se haya cargado
        //             printWindow.onload = function() {
        //                 printWindow.print(); // Llama al diálogo de impresión
        //                 printWindow.close(); // Cierra la ventana después de imprimir
        //             };
        //         });
        //     }).catch(error => {
        //         console.error('Error al cargar el PDF:', error);
        //         alert("No se pudo cargar el PDF.");
        //     });
        // }

        function printPDF() {
            const pdfUrl = 'storage/documentos/tRKEmarp8ohh1Zh6t8nUruosoq0wmUeLNgL0yB7k.pdf'; // URL del PDF

            // Crear una nueva ventana para el PDF
            const printWindow = window.open('', '_blank');

            // Escribir el HTML básico en la nueva ventana
            printWindow.document.write('<html><head><title>Imprimir PDF</title></head><body>');
            printWindow.document.write('<embed src="' + pdfUrl +
                '" type="application/pdf" width="100%" height="100%" style="border: none;"/>');
            printWindow.document.write('</body></html>');
            printWindow.document.close(); // Cierra el documento para permitir que el contenido se procese

            // Llama al diálogo de impresión después de que la ventana se haya cargado
            printWindow.onload = function() {
                printWindow.focus(); // Asegúrate de que la ventana tenga el foco
                printWindow.print(); // Llama al diálogo de impresión
                printWindow.onafterprint = function() {
                    printWindow.close(); // Cierra la ventana después de imprimir
                };
            };
        }






        // Deshabilitar el clic derecho
        document.addEventListener('contextmenu', function(e) {
            e.preventDefault();
        });

        // Deshabilitar el uso de teclas Ctrl + S y Ctrl + P
        document.addEventListener('keydown', function(e) {
            if (e.ctrlKey && (e.key === 's' || e.key === 'p')) {
                e.preventDefault();
            }
        });
    </script>
@endpush
