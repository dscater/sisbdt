<div class="font-weight-bold mb-2">LLena el formulario con la información desde la más actual a la más antigua</div>
<form id="form-8">
    @if ($datos_otro && count($datos_otro->habilidads) > 0)
        @foreach ($datos_otro->habilidads as $key => $item)
            <div class="row fila existe" data-id="{{ $item->id }}">
                @if ($key > 0)
                    <div class="separator separator-content my-6"><i class="far fa-circle"></i></div>
                @endif
                <button type="button" class="quitar">X</button>
                <input type="hidden" name="hab_ids[]" value="{{ $item->id }}" />
                <div class="col-md-12">
                    <label>Habilidad/Conocimiento*</label>
                    <textarea name="hab_habilidads[]" class="form-control">{{ $item->habilidad }}</textarea>
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
            <input type="hidden" name="hab_ids[]" value="0" />
            <div class="col-md-12">
                <label>Habilidad/Conocimiento*</label>
                <textarea type="text" name="hab_habilidads[]" class="form-control"></textarea>
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
