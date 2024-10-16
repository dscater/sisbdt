<div class="font-weight-bold mb-2">LLena el formulario con la información desde la más actual a la más antigua</div>
<form id="form-3">
    @if ($evaluacion && count($evaluacion->evaluacion_postgrados) > 0)
        @foreach ($evaluacion->evaluacion_postgrados as $key => $item)
            <div class="row fila existe" data-id="{{ $item->id }}">
                @if ($key > 0)
                    <div class="separator separator-content my-6"><i class="far fa-circle"></i></div>
                @endif
                <button type="button" class="quitar">X</button>
                <input type="hidden" name="fp_ids[]" value="{{ $item->id }}" />
                <div class="col-md-4">
                    <label>Institución*</label>
                    <input type="text" name="fp_institucions[]" value="{{ $item->institucion }}"
                        class="form-control"placeholder="Institución">
                    <div class="valid-feedback">
                    </div>
                    <div class="invalid-feedback">
                        Completa este campo
                    </div>
                </div>
                <div class="col-md-4">
                    <label>Fecha postgrado*</label>
                    <input type="date" name="fp_fecha_postgrados[]" value="{{ $item->fecha_postgrado }}"
                        class="form-control">
                    <div class="valid-feedback">
                    </div>
                    <div class="invalid-feedback">
                        Completa este campo
                    </div>
                </div>
                <div class="col-md-4">
                    <label>Título postgrado*</label>
                    <input type="text" name="fp_titulos[]" value="{{ $item->titulo }}" class="form-control"placeholder="Título postgrado">
                    <div class="valid-feedback">
                    </div>
                    <div class="invalid-feedback">
                        Completa este campo
                    </div>
                </div>
                <div class="col-md-4">
                    <label>Nivel académico*</label>
                    <input type="text" name="fp_nivels[]" value="{{ $item->nivel }}" class="form-control"placeholder="Nivel académico">
                    <div class="valid-feedback">
                    </div>
                    <div class="invalid-feedback">
                        Completa este campo
                    </div>
                </div>
                <div class="col-md-4">
                    <label>Postgrado*</label>
                    <select name="fp_postgrados[]" class="form-select">
                        <option value="">- Seleccione -</option>
                        <option value="DOCTORADO" {{ $item->postgrado == 'DOCTORADO' ? 'selected' : '' }}>DOCTORADO</option>
                        <option value="MAESTRÍA" {{ $item->postgrado == 'MAESTRÍA' ? 'selected' : '' }}>MAESTRÍA</option>
                        <option value="ESPECIALIDAD" {{ $item->postgrado == 'ESPECIALIDAD' ? 'selected' : '' }}>ESPECIALIDAD
                        </option>
                        <option value="DIPLOMADO" {{ $item->postgrado == 'DIPLOMADO' ? 'selected' : '' }}>DIPLOMADO</option>
                    </select>
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
            <input type="hidden" name="fp_ids[]" value="0" />
            <div class="col-md-4">
                <label>Institución*</label>
                <input type="text" name="fp_institucions[]" class="form-control"placeholder="Institución">
                <div class="valid-feedback">
                </div>
                <div class="invalid-feedback">
                    Completa este campo
                </div>
            </div>
            <div class="col-md-4">
                <label>Fecha postgrado*</label>
                <input type="date" name="fp_fecha_postgrados[]" class="form-control">
                <div class="valid-feedback">
                </div>
                <div class="invalid-feedback">
                    Completa este campo
                </div>
            </div>
            <div class="col-md-4">
                <label>Título postgrado*</label>
                <input type="text" name="fp_titulos[]" class="form-control"placeholder="Título postgrado">
                <div class="valid-feedback">
                </div>
                <div class="invalid-feedback">
                    Completa este campo
                </div>
            </div>
            <div class="col-md-4">
                <label>Nivel académico*</label>
                <input type="text" name="fp_nivels[]" class="form-control"placeholder="Nivel académico">
                <div class="valid-feedback">
                </div>
                <div class="invalid-feedback">
                    Completa este campo
                </div>
            </div>
            <div class="col-md-4">
                <label>Postgrado*</label>
                <select name="fp_postgrados[]" class="form-select">
                    <option value="">- Seleccione -</option>
                    <option value="DOCTORADO">DOCTORADO</option>
                    <option value="MAESTRÍA">MAESTRÍA</option>
                    <option value="ESPECIALIDAD">ESPECIALIDAD</option>
                    <option value="DIPLOMADO">DIPLOMADO</option>
                </select>
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
