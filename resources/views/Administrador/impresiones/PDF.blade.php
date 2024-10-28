<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Reporte de Impresiones</title>
    <style>
        @page {
            size: A4 landscape;
            /* Cambiar a horizontal */
        }

        h1 {
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
            background-color: rgb(89, 149, 240);
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
    <p>Desde: {{ $fechaDesde }} Hasta: {{ $fechaHasta }}</p>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Hola de Ruta</th>
                <th>Documento</th>
                <th>Autoridad</th>
                <th>Descripcion</th>
                <th>Fecha de Impresión</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($impresiones as $impresion)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $impresion->hoja_ruta }}</td>
                    <td>{{ $impresion->documento->titulo }}</td>
                    <td>{{ $impresion->nombreCompleto_autoridad }}</td>
                    <td>{{ $impresion->descripcion }}</td>
                    <td>{{ \Carbon\Carbon::parse($impresion->fecha_impresion)->format('d/m/Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
