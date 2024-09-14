<form id="form-1">
    @if ($evaluacion && count($evaluacion->evaluacion_basicas) > 0)
        @foreach ($evaluacion->evaluacion_basicas as $key => $item)
            <div class="row fila existe" data-id="{{ $item->id }}">
                @if ($key > 0)
                    <div class="separator separator-content my-6"><i class="far fa-circle"></i></div>
                @endif
                <button type="button" class="quitar">X</button>
                <input type="hidden" name="fb_ids[]" value="{{ $item->id }}" />
                <div class="col-md-4">
                    <label>Nivel Escolaridad*</label>
                    <input type="text" name="fb_nivels[]" value="{{ $item->nivel }}" class="form-control">
                    <div class="valid-feedback">
                    </div>
                    <div class="invalid-feedback">
                        Completa este campo
                    </div>
                </div>
                <div class="col-md-4">
                    <label>Grado Escolaridad*</label>
                    <select name="fb_grados[]" class="form-select">
                        <option value="">- Seleccione -</option>
                        <option value="PRIMARIA" {{$item->grado == 'PRIMARIA'?'selected':''}}>PRIMARIA</option>
                        <option value="SECUNDARIA" {{$item->grado == 'SECUNDARIA'?'selected':''}}>SECUNDARIA</option>
                        <option value="BACHILLER" {{$item->grado == 'BACHILLER'?'selected':''}}>BACHILLER</option>
                    </select>
                    <div class="valid-feedback">

                    </div>
                    <div class="invalid-feedback">
                        Completa este campo
                    </div>
                </div>
                <div class="col-md-4">
                    <label>Institución*</label>
                    <input type="text" name="fb_institucions[]" value="{{ $item->institucion }}"
                        class="form-control">
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
            <input type="hidden" name="fb_ids[]" value="0" />
            <div class="col-md-4">
                <label>Nivel Escolaridad*</label>
                <input type="text" name="fb_nivels[]" class="form-control">
                <div class="valid-feedback">
                </div>
                <div class="invalid-feedback">
                    Completa este campo
                </div>
            </div>
            <div class="col-md-4">
                <label>Grado Escolaridad*</label>
                <input type="text" name="fb_grados[]" class="form-control">
                <div class="valid-feedback">

                </div>
                <div class="invalid-feedback">
                    Completa este campo
                </div>
            </div>
            <div class="col-md-4">
                <label>Institución*</label>
                <input type="text" name="fb_institucions[]" class="form-control">
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

    <div id="eliminados_forms"></div>
</form>
