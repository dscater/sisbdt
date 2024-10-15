<div class="font-weight-bold mb-2">LLena el formulario con la información desde la más actual a la más antigua</div>
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
                    <select name="id_idioma[]" class="form-select">
                        <option value="">- Seleccione -</option>
                        @foreach ($lista_idiomas as $value)
                            <option value="{{ $value->id }}" {{ $item->idioma == $value->id ? 'selected' : '' }}>
                                {{ $value->nombre }}
                            </option>
                        @endforeach
                    </select>
                    <div class="valid-feedback">
                    </div>
                    <div class="invalid-feedback">
                        Completa este campo
                    </div>
                </div>
                <div class="col-md-6">
                    <label>Nivel*</label>
                    <select name="id_nivel[]" class="form-select">
                        <option value="">- Seleccione -</option>
                        <option value="BÁSICO" {{ $item->nivel == 'BÁSICO' ? 'selected' : '' }}>BÁSICO</option>
                        <option value="MEDIO" {{ $item->nivel == 'MEDIO' ? 'selected' : '' }}>MEDIO</option>
                        <option value="AVANZADO" {{ $item->nivel == 'AVANZADO' ? 'selected' : '' }}>AVANZADO</option>
                    </select>
                    <div class="valid-feedback">
                    </div>
                    <div class="invalid-feedback">
                        Completa este campo
                    </div>
                </div>
                <div class="col-md-6">
                    <label>Certificado*</label>
                    <select name="id_certificado[]" class="form-select">
                        <option value="">- Seleccione -</option>
                        <option value="CON CERTIFICADO" {{ $item->certificado == 'CON CERTIFICADO' ? 'selected' : '' }}>CON
                            CERTIFICADO</option>
                        <option value="SIN CERTIFICADO" {{ $item->certificado == 'SIN CERTIFICADO' ? 'selected' : '' }}>SIN
                            CERTIFICADO</option>
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
            <input type="hidden" name="id_ids[]" value="0" />
            <div class="col-md-6">
                <label>Idioma*</label>
                <select name="id_idioma[]" class="form-select">
                    <option value="">- Seleccione -</option>
                    {!! $html_option_idiomas !!}
                </select>
                <div class="valid-feedback">
                </div>
                <div class="invalid-feedback">
                    Completa este campo
                </div>
            </div>
            <div class="col-md-6">
                <label>Nivel*</label>
                <select name="id_nivel[]" class="form-select">
                    <option value="">- Seleccione -</option>
                    <option value="BÁSICO">BÁSICO</option>
                    <option value="MEDIO">MEDIO</option>
                    <option value="AVANZADO">AVANZADO</option>
                </select>
                <div class="valid-feedback">
                </div>
                <div class="invalid-feedback">
                    Completa este campo
                </div>
            </div>
            <div class="col-md-6">
                <label>Certificado*</label>
                <select name="id_certificado[]" class="form-select">
                    <option value="">- Seleccione -</option>
                    <option value="CON CERTIFICADO">CON
                        CERTIFICADO</option>
                    <option value="SIN CERTIFICADO">SIN
                        CERTIFICADO</option>
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
