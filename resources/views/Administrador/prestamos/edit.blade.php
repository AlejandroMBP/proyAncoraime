<div class="modal fade" id="modaleditar" tabindex="-1" aria-labelledby="modalEditarFechaDevolucionLabel" aria-hidden="true">
    <form id="editarFechaDevolucionForm" action="" method="post">
        @csrf
        @method('PUT') <!-- Especifica que es una solicitud PUT -->
        <div class="modal-dialog modal-lg">
            <div class="modal-content custom-modal">
                <div class="modal-header custom-modal-header">
                    <h5 class="modal-title" id="modalEditarFechaDevolucionLabel">Editar Fecha de Devolución</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body custom-modal-body">
                    <div class="mb-3">
                        <label for="fechaDevolucion" class="form-label">Fecha de Devolución</label>
                        <input type="date" id="fechaDevolucion" name="fechaDevolucion" class="form-control" required>
                        <div class="invalid-feedback">La fecha de devolución es obligatoria.</div>
                    </div>
                </div>
                <div class="modal-footer custom-modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="custom-save-btn">Guardar Cambios</button>
                </div>
            </div>
        </div>
    </form>
</div>
