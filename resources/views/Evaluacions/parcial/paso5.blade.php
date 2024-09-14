<form id="form-5">
    @if ($evaluacion && count($evaluacion->evaluacion_laborals) > 0)
        @foreach ($evaluacion->evaluacion_laborals as $key => $item)
            <div class="row fila existe" data-id="{{ $item->id }}">
                @if ($key > 0)
                    <div class="separator separator-content my-6"><i class="far fa-circle"></i></div>
                @endif
                <button type="button" class="quitar">X</button>
                <input type="hidden" name="el_ids[]" value="{{ $item->id }}" />
                <div class="col-md-4">
                    <label>Cargo*</label>
                    <input type="text" name="el_cargos[]" value={{ $item->cargo }} class="form-control">
                    <div class="valid-feedback">
                    </div>
                    <div class="invalid-feedback">
                        Completa este campo
                    </div>
                </div>
                <div class="col-md-4">
                    <label>Institución/Empresa*</label>
                    <input type="text" name="el_institucions[]" value={{ $item->institucion }} class="form-control">
                    <div class="valid-feedback">
                    </div>
                    <div class="invalid-feedback">
                        Completa este campo
                    </div>
                </div>
                <div class="col-md-4">
                    <label>Fecha Inicio*</label>
                    <input type="date" name="el_fecha_inis[]" value={{ $item->fecha_ini }} class="form-control">
                    <div class="valid-feedback">
                    </div>
                    <div class="invalid-feedback">
                        Completa este campo
                    </div>
                </div>
                <div class="col-md-4">
                    <label>Fecha Final*</label>
                    <input type="date" name="el_fecha_fins[]" value={{ $item->fecha_fin }} class="form-control">
                    <div class="valid-feedback">
                    </div>
                    <div class="invalid-feedback">
                        Completa este campo
                    </div>
                </div>
                <div class="col-md-4">
                    <label>Descripción del cargo*</label>
                    <input type="text" name="el_descripcions[]" value={{ $item->descripcion }} class="form-control">
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
            <input type="hidden" name="el_ids[]" value="0" />
            <div class="col-md-4">
                <label>Cargo*</label>
                <input type="text" name="el_cargos[]" class="form-control">
                <div class="valid-feedback">
                </div>
                <div class="invalid-feedback">
                    Completa este campo
                </div>
            </div>
            <div class="col-md-4">
                <label>Institución/Empresa*</label>
                <input type="text" name="el_institucions[]" class="form-control">
                <div class="valid-feedback">
                </div>
                <div class="invalid-feedback">
                    Completa este campo
                </div>
            </div>
            <div class="col-md-4">
                <label>Fecha Inicio*</label>
                <input type="date" name="el_fecha_inis[]" class="form-control">
                <div class="valid-feedback">
                </div>
                <div class="invalid-feedback">
                    Completa este campo
                </div>
            </div>
            <div class="col-md-4">
                <label>Fecha Final*</label>
                <input type="date" name="el_fecha_fins[]" class="form-control">
                <div class="valid-feedback">
                </div>
                <div class="invalid-feedback">
                    Completa este campo
                </div>
            </div>
            <div class="col-md-4">
                <label>Descripción del cargo*</label>
                <input type="text" name="el_descripcions[]" class="form-control">
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
