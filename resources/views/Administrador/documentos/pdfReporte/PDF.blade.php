<!DOCTYPE html>
<html>

<head>
    <title>Reporte de Documentos</title>
    <style>
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
    <p>Fecha desde: {{ request('fecha_desde') }}</p>
    <p>Fecha hasta: {{ request('fecha_hasta') }}</p>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Hoja de Ruta</th>
                <th>Título</th>
                <th>Fecha</th>
                <th>Tipo de Documento</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($documentos as $documento)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $documento->hoja_ruta }}</td>
                    <td>{{ $documento->titulo }}</td>
                    <td>{{ $documento->fecha }}</td>
                    <td>{{ $documento->tipoDocumento->descripcion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
