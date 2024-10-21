<form id="formReporte" method="POST" action="{{ route('reporte.pdf') }}">
    @csrf
    <div class="modal fade" id="reporteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content custom-modal">
                <div class="modal-header custom-modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Generar Reporte</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body custom-modal-body">
                    <div class="mb-3 row">
                        <div class="col-md-3">
                            <label for="fecha-desde" class="form-label">Fecha desde:</label>
                            <input type="date" id="fecha-desde" name="fecha_desde" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <label for="fecha-hasta" class="form-label">Fecha hasta:</label>
                            <input type="date" id="fecha-hasta" name="fecha_hasta" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <label for="tipoDocumento" class="form-label">Tipo de documento</label>
                            <select id="tipoDocumento" name="tipoDocumento" class="form-select" required>
                                <option value="" disabled selected>Seleccione</option>
                                @foreach ($tiposDocumentos as $tipoDocumento)
                                    <option value="{{ $tipoDocumento->id }}">
                                        {{ $tipoDocumento->descripcion }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer custom-modal-footer">
                    <button type="button" class="btn btn-secondary custom-close-btn"
                        data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary custom-save-btn"
                        formaction="{{ route('reporte.pdf') }} ">Generar PDF</button>
                    <button type="submit" class="btn btn-success custom-save-btn"
                        formaction="{{ route('reporte.excel') }}">Generar Excel</button>
                </div>
            </div>
        </div>
    </div>
</form>
