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
            <?php $c = 1; ?>
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
                        <button type="button" action class="btn btn-primary btn-sm btnEditar"
                            data-id="{{ $funcionario->id }}" data-nombre="{{ $funcionario->nombre }}"
                            data-paterno="{{ $funcionario->paterno }}" data-materno="{{ $funcionario->materno }}"
                            data-ci="{{ $funcionario->ci }}"
                            data-fecha_nacimiento="{{ $funcionario->fecha_nacimiento }}"
                            data-celular="{{ $funcionario->celular }}" data-cargo_id="{{ $funcionario->cargo_id }}"
                            data-unidad="{{ $funcionario->unidad }}"
                            data-descripcion="{{ $funcionario->descripcion }}" data-toggle="modal"
                            data-target="#modalEditar"><i class="fa fa-pencil"></i></button>

                        <!-- Botón que activa el envío del formulario -->
                        <button onclick="enviarFormulario({{ $funcionario->id }})" type="button"
                            class="btn btn-secondary btn-sm">
                            <i class="fa fa-power-off"></i>
                        </button>
                        <!-- Formulario oculto que se enviará como POST -->
                        <form id="form-editar-estado-{{ $funcionario->id }}"
                            action="{{ url('/funcionarios/editarEstado', ['id' => $funcionario->id]) }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>

                        <button type="button" action class="btn btn-danger btn-sm btnEliminar"
                            data-id="{{ $funcionario->id }}" data-toggle="modal" data-target="#modalEliminar"><i
                                class="fa fa-trash-o"></i></button>
                        <form action="{{ url('/funcionarios', ['id' => $funcionario->id]) }}" method="POST"
                            id="formEli_{{ $funcionario->id }}">
                            @csrf
                            <input type="hidden" name="_method" value="delete">
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
