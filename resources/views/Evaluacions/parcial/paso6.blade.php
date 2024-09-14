<form id="form-6">
    @if ($evaluacion && count($evaluacion->evaluacion_distincions) > 0)
        @foreach ($evaluacion->evaluacion_distincions as $key => $item)
            <div class="row fila existe" data-id="{{ $item->id }}">
                @if ($key > 0)
                    <div class="separator separator-content my-6"><i class="far fa-circle"></i></div>
                @endif
                <button type="button" class="quitar">X</button>
                <input type="hidden" name="ed_ids[]" value="{{ $item->id }}" />
                <div class="col-md-4">
                    <label>Mérito*</label>
                    <input type="text" name="ed_meritos[]" value="{{ $item->merito }}" class="form-control">
                    <div class="valid-feedback">
                    </div>
                    <div class="invalid-feedback">
                        Completa este campo
                    </div>
                </div>
                <div class="col-md-4">
                    <label>Institución*</label>
                    <input type="text" name="ed_institucions[]" value="{{ $item->institucion }}"
                        class="form-control">
                    <div class="valid-feedback">
                    </div>
                    <div class="invalid-feedback">
                        Completa este campo
                    </div>
                </div>
                <div class="col-md-4">
                    <label>Fecha*</label>
                    <input type="date" name="ed_fechas[]" value="{{ $item->fecha }}" class="form-control">
                    <div class="valid-feedback">
                    </div>
                    <div class="invalid-feedback">
                        Completa este campo
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="row fila">
            <input type="hidden" name="ed_ids[]" value="0" />
            <div class="col-md-4">
                <label>Mérito*</label>
                <input type="text" name="ed_meritos[]" class="form-control">
                <div class="valid-feedback">
                </div>
                <div class="invalid-feedback">
                    Completa este campo
                </div>
            </div>
            <div class="col-md-4">
                <label>Institución*</label>
                <input type="text" name="ed_institucions[]" class="form-control">
                <div class="valid-feedback">
                </div>
                <div class="invalid-feedback">
                    Completa este campo
                </div>
            </div>
            <div class="col-md-4">
                <label>Fecha*</label>
                <input type="date" name="ed_fechas[]" class="form-control">
                <div class="valid-feedback">
                </div>
                <div class="invalid-feedback">
                    Completa este campo
                </div>
            </div>
        </div>
    @endif
    <div class="row mt-3">
        <div class="col-12 text-center">
            <button type="button" class="btn btn-success mx-auto btn-sm btnAgregar"><i class="fa fa-plus"></i>
                Agregar</button>
        </div>
    </div>
</form>
