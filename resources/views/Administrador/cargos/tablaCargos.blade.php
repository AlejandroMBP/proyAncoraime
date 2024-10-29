<div class="table-responsive">
    <table id="cargos-table" class="table m-0 table-striped">
        <thead>
            <tr>
                <th>NR</th>
                <th>CARGO</th>
                <th>ESTADO</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            <?php $c = $cargos->firstItem(); ?>
            @foreach ($cargos as $cargo)
                <tr>
                    <td>{{ $c++ }}</td>
                    <td>{{ $cargo->nombre }}</td>
                    <td>
                        @if ($cargo->estado == 'activo')
                            <span class="badge badge-success shadow-success m-1">habilitado</span>
                        @else
                            <span class="badge badge-danger shadow-success m-1">inhabilitado</span>
                        @endif
                    </td>
                    <td>
                        <button type="button" action class="btn btn-primary btn-sm btnEditar"
                            data-id="{{ $cargo->id }}" data-nombre="{{ $cargo->nombre }}"
                            data-descripcion="{{ $cargo->descripcion }}" data-toggle="modal"
                            data-target="#modalEditar"><i class="fa fa-pencil"></i></button>


                        <!-- Botón que activa el envío del formulario -->
                        <button onclick="enviarFormulario({{ $cargo->id }})" type="button"
                            class="btn btn-secondary btn-sm">
                            <i class="fa fa-power-off"></i>
                        </button>
                        <!-- Formulario oculto que se enviará como POST -->
                        <form id="form-editar-estado-{{ $cargo->id }}"
                            action="{{ url('/cargos/editarEstado', ['id' => $cargo->id]) }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>

                        <button type="button" action class="btn btn-danger btn-sm btnEliminar"
                            data-id="{{ $cargo->id }}" data-toggle="modal" data-target="#modalEliminar"><i
                                class="fa fa-trash-o"></i></button>
                        <form action="{{ url('/cargos', ['id' => $cargo->id]) }}" method="POST"
                            id="formEli_{{ $cargo->id }}">
                            @csrf
                            <input type="hidden" name="_method" value="delete">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="pagination-wrapper">
    {{ $cargos->links('pagination::bootstrap-5') }} <!-- Paginador -->
</div>
