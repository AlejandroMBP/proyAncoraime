<div class="modal fade" id="modalAgregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">AGREGAR FUNCIONARIO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('/funcionarios/agregar') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="nombre">Nombres</label>
                            <input type="text" class="form-control" name="nombre" id="nombre"
                                placeholder="nombre" required>
                            <div class="invalid-feedback">
                                Ingresar nombre
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="paterno">paterno</label>
                            <input type="text" class="form-control" name="paterno" id="paterno"
                                placeholder="paterno" required>
                            <div class="invalid-feedback">
                                Ingresar apellido
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="materno">Materno</label>
                            <input type="text" class="form-control" name="materno" id="materno"
                                placeholder="materno" required>
                            <div class="invalid-feedback">
                                Ingresar apellido
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="ci">CI</label>
                            <input type="text" class="form-control" id="ci" placeholder="cedula de identidad"
                                name="ci" required>
                            <div class="invalid-feedback">
                                Ingresa su cédula de indentidad
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="fecha_nacimiento">Fecha de nacimiento</label>
                            <input type="date" class="form-control" id="fecha_nacimiento"
                                placeholder="Ingrese fecha de nacimiento" name="fecha_nacimiento" required>
                            <div class="invalid-feedback">
                                Ingresar fecha de nacimiento
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="celular">Celular</label>
                            <input type="text" class="form-control" id="celular" placeholder="Ingrese el celular"
                                name="celular" required>
                            <div class="invalid-feedback">
                                Ingresar numero de celular
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cargo_id">Cargo</label>
                            <select id="cargo_id" name="cargo_id" class="form-control" required>
                                <option value="" selected disabled>Seleccione un cargo</option>
                                @foreach ($cargos as $cargo)
                                    @if ($cargo->estado == 'activo')
                                        <option value="{{ $cargo->id }}">{{ $cargo->nombre }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="unidad">Unidad o Direccion donde trabaja el funcionario</label>
                        <input type="text" class="form-control" id="unidad" placeholder="......." name="unidad"
                            required>
                        <div class="invalid-feedback">
                            Ingresar la unidad o direccion que pertenece
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input type="text" name="descripcion" class="form-control" id="descripcion" placeholder="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
