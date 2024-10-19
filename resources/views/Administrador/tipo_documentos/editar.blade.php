<div class="modal fade" id="TipoDocModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form id="editForm" action="" method="POST">
        @csrf
        @method('PUT') <!-- Usamos el método PUT para la actualización -->
        <div class="modal-dialog modal-lg">
            <div class="modal-content custom-modal">
                <div class="modal-header custom-modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Tipo Documento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body custom-modal-body">
                    <div class="mb-3">
                        <label for="editDescripcion" class="form-label">Descripción</label>
                        <input type="text" id="editDescripcion" name="descripcion" class="form-control"
                            placeholder="Ingrese la descripción" required>
                    </div>
                </div>
                <div class="modal-footer custom-modal-footer">
                    <button type="button" class="btn btn-secondary custom-close-btn"
                        data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary custom-save-btn">Actualizar</button>
                </div>
            </div>
        </div>
    </form>
</div>
