<!DOCTYPE html>
<html>

<head>
    <title>Reporte de Préstamos</title>
    <style>
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
    <p>Desde: {{ $fechaDesde }} | Hasta: {{ $fechaHasta }}</p>

    <table width="100%" border="1" cellspacing="0" cellpadding="5">
        <thead>
            <tr>
                <th>Hoja de Ruta</th>
                <th>Fecha de Préstamo</th>
                <th>Funcionario</th>
                <th>Cargo</th>
                <th>Fecha de Devolución</th>
                <th>Descripción</th>
                <th>Devolvio ?</th>
                {{-- <th>estado</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($prestamos as $prestamo)
                <tr>
                    <td>{{ $prestamo->hoja_ruta }}</td>
                    <td>{{ $prestamo->fecha_prestamo }}</td>
                    <td>{{ $prestamo->funcionario->nombre }} {{ $prestamo->funcionario->paterno }}
                        {{ $prestamo->funcionario->materno }}</td>
                    <td>{{ $prestamo->funcionario->cargo->nombre }}</td>
                    <td>{{ $prestamo->fecha_devolucion }}</td>
                    <td>{{ $prestamo->descripcion }}</td>
                    <td>{{ $prestamo->devolucion }}</td>
                    {{-- <td>{{ $prestamo->estado }}</td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
