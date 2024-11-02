<div class="table-responsive">
    <table class="table m-0 table-striped">
        <thead>
            <tr>
                <th>NR</th>
                <th>FUNCIONARIO</th>
                <th>CI</th>
                <th>CELULAR</th>
                <th>CARGO</th>
                <th>ESTADO</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            <?php $c = $funcionarios->firstItem(); ?>
            @forelse ($funcionarios as $funcionario)
                <tr>
                    <td>{{ $c++ }}</td>
                    <td>{{ $funcionario->nombre }}&nbsp; {{ $funcionario->paterno }}&nbsp;
                        {{ $funcionario->materno }} </td>
                    <td>{{ $funcionario->ci }}</td>
                    <td>{{ $funcionario->celular }}</td>
                    <td>
                        @foreach ($cargos as $cargo)
                            @if ($funcionario->cargo_id == $cargo->id)
                                {{ $cargo->nombre }}
                            @endif
                        @endforeach
                    </td>
                    <td>
                        @if ($funcionario->estado == 'activo')
                            <span class="badge badge-success shadow-success m-1">habilitado</span>
                        @else
                            <span class="badge badge-danger shadow-success m-1">inhabilitado</span>
                        @endif
                    </td>
                    <td>
                        <!-- Botón y fomulario para editar funcionario-->
                        <button type="button" action class="rounded-flexible-btn btnEditar"
                            data-id="{{ $funcionario->id }}" data-nombre="{{ $funcionario->nombre }}"
                            data-paterno="{{ $funcionario->paterno }}" data-materno="{{ $funcionario->materno }}"
                            data-ci="{{ $funcionario->ci }}"
                            data-fecha_nacimiento="{{ $funcionario->fecha_nacimiento }}"
                            data-celular="{{ $funcionario->celular }}" data-cargo_id="{{ $funcionario->cargo_id }}"
                            data-unidad="{{ $funcionario->unidad }}"
                            data-descripcion="{{ $funcionario->descripcion }}" data-toggle="modal"
                            data-target="#modalEditar"><i class="fa fa-edit"></i></button>
                        <!-- Botón y fomulario para cambiar estado-->
                        <button onclick="enviarFormulario({{ $funcionario->id }})" type="button"
                            class="rounded-flexible-btn">
                            <i class="fa fa-power-off"></i>
                        </button>
                        <form id="form-editar-estado-{{ $funcionario->id }}"
                            action="{{ url('/funcionarios/editarEstado', ['id' => $funcionario->id]) }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>
                        <!-- Boton y formulario para eliminar el funcionario -->
                        <button type="button" class="rounded-flexible-btn btnEliminar" data-id="{{ $funcionario->id }}"
                            data-toggle="modal" data-target="#modalEliminar"><i class="fa fa-trash"></i></button>
                        <form action="{{ url('/funcionarios/eliminar', ['id' => $funcionario->id]) }}" method="POST"
                            id="formEli_{{ $funcionario->id }}">
                            @csrf
                            @method('POST') 
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">No se encontraron resultados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div><br>
<div class="pagination-wrapper">
    {{ $funcionarios->links('pagination::bootstrap-5') }}
</div>
<style>
    .rounded-flexible-btn {
        background: linear-gradient(to right, #007bff, #20c997);
        /* Degradado de azul a verde turquesa */
        color: white;
        /* Color del texto */
        border: none;
        /* Sin borde */
        border-radius: 25px;
        /* Bordes redondeados */
        padding: 10px 15px;
        /* Espaciado interno */
        display: inline-flex;
        /* Permite alinear el contenido */
        align-items: center;
        /* Centra el contenido verticalmente */
        justify-content: center;
        /* Centra el contenido horizontalmente */
        min-width: 35px;
        /* Ancho mínimo */
        min-height: 20px;
        /* Alto mínimo */
        font-size: 16px;
        /* Tamaño del texto */
        text-align: center;
        /* Alineación del texto */
        transition: all 0.3s ease-in-out;
        /* Transición suave */
    }

    .rounded-flexible-btn:hover {
        box-shadow: 0 0 10px 2px rgba(32, 201, 151, 0.7);
        /* Resplandor suave en hover */
        transform: scale(1.05);
        /* Ligeramente agrandar el botón en hover */
    }

    tr th {
        text-align: center;
        border-radius: 8px;
    }

    tr td {
        text-align: center;
        border-radius: 8px;
    }

    .nav-tabs .nav-link {
        background-color: #f8f9fa;
        border-radius: 10px;
        /* color: #007bff; */
        padding: 10px 20px;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .nav-tabs .nav-link.active {
        /* background-color: #007bff; */
        color: white;
        border-radius: 10px;
    }

    .nav-tabs .nav-link:hover {
        background-color: rgba(0, 123, 255, 0.1);
        /* color: #007bff; */
    }

    .btn-group .btn {
        margin-right: 5px;
        border-radius: 8px;
        /* Bordes redondeados en los botones de acciones dentro del grupo */
    }
</style>