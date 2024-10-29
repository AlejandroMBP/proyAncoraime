<form id="formReportereporte" method="POST" action="{{ route('impresiones.reporte') }}" target="_blank">
    @csrf
    <div class="modal fade" id="reporteImpresionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <label for="tituloDocumento" class="form-label">Tipo de documento</label>
                            <select id="tituloDocumento" name="tituloDocumento" class="form-select">
                                <option value="" selected>Seleccione</option>
                                @foreach ($documentos as $doc)
                                    <option value="{{ $doc->id }}">
                                        {{ $doc->titulo }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>
                <div class="modal-footer custom-modal-footer">
                    <button type="button" class="btn btn-secondary custom-close-btn"
                        data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="custom-save-btn"
                        formaction="{{ route('impresiones.reporte') }} ">Generar
                        PDF</button>
                </div>
            </div>
        </div>
    </div>
</form>
