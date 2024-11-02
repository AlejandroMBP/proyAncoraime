<div class="table-responsive">
    <table id="cargos-table" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
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
                        <button type="button" action class="rounded-flexible-btn btnEditar"
                            data-id="{{ $cargo->id }}" data-nombre="{{ $cargo->nombre }}"
                            data-descripcion="{{ $cargo->descripcion }}" data-toggle="modal"
                            data-target="#modalEditar"><i class="fa fa-edit"></i></button>

                        <!-- Botón que activa el envío del formulario -->
                        <button onclick="enviarFormulario({{ $cargo->id }})" type="button"
                            class="rounded-flexible-btn">
                            <i class="fa fa-power-off"></i>
                        </button>
                        <!-- Formulario oculto que se enviará como POST -->
                        <form id="form-editar-estado-{{ $cargo->id }}"
                            action="{{ url('/cargos/editarEstado', ['id' => $cargo->id]) }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>

                        <button type="button" class="rounded-flexible-btn btnEliminar" data-id="{{ $cargo->id }}"
                            data-toggle="modal" data-target="#modalEliminar"><i class="fa fa-trash"></i></button>

                        <!-- Formulario oculto para eliminar el cargo -->
                        <form action="{{ url('/cargos/eliminar', ['id' => $cargo->id]) }}" method="POST"
                            id="formEli_{{ $cargo->id }}">
                            @csrf
                            @method('POST') 
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
