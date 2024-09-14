<form id="form-7">
    @if ($datos_otro && count($datos_otro->idiomas) > 0)
        @foreach ($datos_otro->idiomas as $key => $item)
            <div class="row fila existe" data-id="{{ $item->id }}">
                @if ($key > 0)
                    <div class="separator separator-content my-6"><i class="far fa-circle"></i></div>
                @endif
                <button type="button" class="quitar">X</button>
                <input type="hidden" name="id_ids[]" value="{{ $item->id }}" />
                <div class="col-md-6">
                    <label>Idioma*</label>
                    <input type="text" name="id_idioma[]" value="{{ $item->idioma }}" class="form-control">
                    <div class="valid-feedback">
                    </div>
                    <div class="invalid-feedback">
                        Completa este campo
                    </div>
                </div>
                <div class="col-md-6">
                    <label>Nivel*</label>
                    <input type="text" name="id_nivel[]" value="{{ $item->nivel }}" class="form-control">
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
            <input type="hidden" name="id_ids[]" value="0" />
            <div class="col-md-6">
                <label>Idioma*</label>
                <input type="text" name="id_idioma[]" class="form-control">
                <div class="valid-feedback">
                </div>
                <div class="invalid-feedback">
                    Completa este campo
                </div>
            </div>
            <div class="col-md-6">
                <label>Nivel*</label>
                <input type="text" name="id_nivel[]" class="form-control">
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
