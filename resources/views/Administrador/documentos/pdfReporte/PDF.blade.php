<!DOCTYPE html>
<html>

<head>
    <title>Reporte de Documentos</title>
    <style>
        @font-face {
            font-family: "Updock";
            src: url('{{ storage_path('fonts/Updock-Regular.ttf') }}') format('truetype');
            font-weight: 400;
            font-style: normal;
        }

        @page {
            size: A4 landscape;
            /* Cambiar a horizontal */
        }

        h1 {
            font-family: "Updock";
            font-weight: 400;
            text-align: center;
            /* Centrar el título */
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        tr th {
            background-color: silver;
        }

        th,
        td {
            padding: 10px;
            text-align: center;
        }

        /* Estilo para el contenedor del logo y texto */
        .header {
            display: flex;
            text-align: center;
            margin-bottom: 20px;
            /* Espacio debajo del encabezado */
        }

        .header img {
            width: 100px;
            /* Ajustar el tamaño del logo */
            height: auto;
            /* Mantener la proporción del logo */
            margin-right: 20px;
            /* Espacio entre el logo y el texto */
        }

        .header div {
            flex-grow: 1;
            /* Permitir que el texto ocupe el espacio restante */
        }

        .header div h2,
        .header div h3 {
            margin: 0;
            text-align: center;
            /* Eliminar margenes */
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="{{ public_path('img/imgancoraime.jpg') }}" alt="Logo"> <!-- Ruta del logo -->
        <div>
            <h2>GOBIERNO AUTÓNOMO MUNICIPAL DE ANCORAIMES</h2>
            <h3>UNIDAD DE ARCHIVOS</h3>
            <h3>DOCUMENTO DE LA DIRECCIÓN ADMINISTRATIVA FINANCIERA</h3>
        </div>
    </div>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Hoja de Ruta</th>
                <th>Descripcion</th>
                <th>Tipo Documento</th>
                <th>Cantidad de Fojas</th>
                <th>Nro Cpta</th>
                <th>Unidad de Archivos</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($documentos as $documento)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $documento->hoja_ruta }}</td>
                    <td>{{ $documento->titulo }}</td>
                    <td>{{ $documento->tipoDocumento->descripcion }}</td>
                    <td>{{ $documento->cantidad_fojas }}</td>
                    <td>{{ $documento->numero_carpeta }}</td>
                    <td>{{ $documento->ubicacion }}</td>
                    <td>{{ $documento->fecha }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
