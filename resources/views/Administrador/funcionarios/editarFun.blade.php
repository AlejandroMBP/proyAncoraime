<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">EDITAR FUNCIONARIO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('/funcionarios/editar') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" id="idEdit">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="nombre">Nombres</label>
                            <input type="text" class="form-control" name="nombre" id="nombreEdit"
                                placeholder="nombre" required>
                            <div class="invalid-feedback">
                                Ingresar nombre
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="paterno">paterno</label>
                            <input type="text" class="form-control" name="paterno" id="paternoEdit"
                                placeholder="paterno" required>
                            <div class="invalid-feedback">
                                Ingresar apellido
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="materno">Materno</label>
                            <input type="text" class="form-control" name="materno" id="maternoEdit"
                                placeholder="materno" required>
                            <div class="invalid-feedback">
                                Ingresar apellido
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="ci">CI</label>
                            <input type="text" class="form-control" name="ci" id="ciEdit"
                                placeholder="cedula de identidad" required>
                            <div class="invalid-feedback">
                                Ingresa su cédula de indentidad
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="fecha_nacimiento">Fecha de nacimiento</label>
                            <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimientoEdit" required>
                            <div class="invalid-feedback">
                                Ingresar fecha de nacimiento
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="celular">Celular</label>
                            <input type="text" class="form-control" name="celular" id="celularEdit"
                                placeholder="Ingrese el celular" required>
                            <div class="invalid-feedback">
                                Ingresar numero de celular
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cargo_id">Cargo</label>
                            <select id="cargo_idEdit" name="cargo_id" class="form-control" required>
                                @foreach ($cargos as $cargo)
                                        <option value="{{ $cargo->id }}">{{ $cargo->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="unidad">Unidad o Direccion donde trabaja el funcionario</label>
                        <input type="text" class="form-control" name="unidad" id="unidadEdit" placeholder="......."
                            required>
                        <div class="invalid-feedback">
                            Ingresar la unidad o direccion que pertenece
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input type="text" name="descripcion" id="descripcionEdit" class="form-control" >
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
