<form id="form-10">
    @if ($datos_otro && count($datos_otro->referencias) > 0)
        @foreach ($datos_otro->referencias as $key => $item)
            <div class="row fila existe" data-id="{{ $item->id }}">
                @if ($key > 0)
                    <div class="separator separator-content my-6"><i class="far fa-circle"></i></div>
                @endif
                <button type="button" class="quitar">X</button>
                <input type="hidden" name="ref_ids[]" value="{{ $item->id }}" />
                <div class="col-md-4">
                    <label>Nombre referencia*</label>
                    <input type="text" name="ref_nombre_refs[]" value="{{ $item->nombre_ref }}" class="form-control">
                    <div class="valid-feedback">
                    </div>
                    <div class="invalid-feedback">
                        Completa este campo
                    </div>
                </div>
                <div class="col-md-4">
                    <label>Celular referencia*</label>
                    <input type="text" name="ref_cel_refs[]" value="{{ $item->cel_ref }}" class="form-control">
                    <div class="valid-feedback">
                    </div>
                    <div class="invalid-feedback">
                        Completa este campo
                    </div>
                </div>
                <div class="col-md-4">
                    <label>Correo referencia*</label>
                    <input type="email" name="ref_correo_refs[]" value="{{ $item->correo_ref }}" class="form-control">
                    <div class="valid-feedback">
                    </div>
                    <div class="invalid-feedback">
                        Completa este campo
                    </div>
                </div>
                <div class="col-md-4">
                    <label>Cargo referencia*</label>
                    <input type="text" name="ref_cargo_refs[]" value="{{ $item->cargo_ref }}" class="form-control">
                    <div class="valid-feedback">
                    </div>
                    <div class="invalid-feedback">
                        Completa este campo
                    </div>
                </div>
                <div class="col-md-4">
                    <label>Relación referencia*</label>
                    <input type="text" name="ref_relacion_refs[]" value="{{ $item->cargo_ref }}" class="form-control">
                    <div class="valid-feedback">
                    </div>
                    <div class="invalid-feedback">
                        Completa este campo
                    </div>
                </div>
                <div class="col-md-4">
                    <label>Descripción*</label>
                    <input type="text" name="ref_descripcions[]" value="{{ $item->descripcion }}"
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
            <input type="hidden" name="ref_ids[]" value="0" />
            <div class="col-md-4">
                <label>Nombre referencia*</label>
                <input type="text" name="ref_nombre_refs[]" class="form-control">
                <div class="valid-feedback">
                </div>
                <div class="invalid-feedback">
                    Completa este campo
                </div>
            </div>
            <div class="col-md-4">
                <label>Celular referencia*</label>
                <input type="text" name="ref_cel_refs[]" class="form-control">
                <div class="valid-feedback">
                </div>
                <div class="invalid-feedback">
                    Completa este campo
                </div>
            </div>
            <div class="col-md-4">
                <label>Correo referencia*</label>
                <input type="email" name="ref_correo_refs[]" class="form-control">
                <div class="valid-feedback">
                </div>
                <div class="invalid-feedback">
                    Completa este campo
                </div>
            </div>
            <div class="col-md-4">
                <label>Cargo referencia*</label>
                <input type="text" name="ref_cargo_refs[]" class="form-control">
                <div class="valid-feedback">
                </div>
                <div class="invalid-feedback">
                    Completa este campo
                </div>
            </div>
            <div class="col-md-4">
                <label>Relación referencia*</label>
                <input type="text" name="ref_relacion_refs[]" class="form-control">
                <div class="valid-feedback">
                </div>
                <div class="invalid-feedback">
                    Completa este campo
                </div>
            </div>
            <div class="col-md-4">
                <label>Descripción*</label>
                <input type="text" name="ref_descripcions[]" class="form-control">
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
