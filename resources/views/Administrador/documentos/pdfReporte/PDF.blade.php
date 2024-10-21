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

        h1 {
            font-family: "Updock";
            font-weight: 400;
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

        th,
        td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>

<body>
    <h1>Reporte de Documentos</h1>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Fecha</th>
                <th>Tipo Documento</th>
                <th>cantidad de fojas</th>
                <th>numero de carpeta</th>
                <th>Ubicacion</th>
                <th>fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($documentos as $documento)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $documento->fecha }}</td>
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
