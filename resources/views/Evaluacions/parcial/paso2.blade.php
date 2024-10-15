<div class="font-weight-bold mb-2">LLena el formulario con la información desde la más actual a la más antigua</div>
<form id="form-2">
    @if ($evaluacion && count($evaluacion->evaluacion_carreras) > 0)
        @foreach ($evaluacion->evaluacion_carreras as $key => $item)
            <div class="row fila existe" data-id="{{ $item->id }}">
                @if ($key > 0)
                    <div class="separator separator-content my-6"><i class="far fa-circle"></i></div>
                @endif
                <button type="button" class="quitar">X</button>
                <input type="hidden" name="ec_ids[]" value="{{ $item->id }}" />
                <div class="col-md-4">
                    <label>Título profesional*</label>
                    <input type="text" name="ec_titulos[]" value="{{ $item->titulo }}" class="form-control">
                    <div class="valid-feedback">
                    </div>
                    <div class="invalid-feedback">
                        Completa este campo
                    </div>
                </div>
                <div class="col-md-4">
                    <label>Carrera*</label>
                    <select name="ec_carreras[]" class="form-select">
                        @foreach ($array_carreras as $carrera)
                            @if ($carrera['grupo'] == 'si')
                                <optgroup label="{{ $carrera['label'] }}">
                                    @foreach ($carrera['datos'] as $dato)
                                        <option value="{{ $dato['value'] }}"
                                            {{ $item->carrera == mb_strtoupper($dato['value']) ? 'selected' : '' }}>
                                            {{ mb_strtoupper($dato['value']) }}
                                        </option>;
                                    @endforeach
                                </optgroup>
                            @else
                                <option value="{{ $carrera['value'] }}"
                                    {{ $item->carrera == mb_strtoupper($carrera['value']) ? 'selected' : '' }}>{{ mb_strtoupper($carrera['label']) }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                    <div class="valid-feedback">
                    </div>
                    <div class="invalid-feedback">
                        Completa este campo
                    </div>
                </div>
                <div class="col-md-4">
                    <label>Institución*</label>
                    <input type="text" name="ec_institucions[]" value="{{ $item->institucion }}"
                        class="form-control">
                    <div class="valid-feedback">
                    </div>
                    <div class="invalid-feedback">
                        Completa este campo
                    </div>
                </div>
                <div class="col-md-4">
                    <label>Nivel profesional*</label>
                    <select name="ec_nivels[]" class="form-select">
                        <option value="">- Seleccione -</option>
                        <option value="TÉCNICO MEDIO" {{ $item->nivel == 'TÉCNICO MEDIO' ? 'selected' : '' }}>TÉCNICO MEDIO</option>
                        <option value="TÉCNICO SUPERIOR" {{ $item->nivel == 'TÉCNICO SUPERIOR' ? 'selected' : '' }}>TÉCNICO SUPERIOR
                        </option>
                        <option value="LICENCIATURA" {{ $item->nivel == 'LICENCIATURA' ? 'selected' : '' }}>LICENCIATURA</option>
                    </select>
                    <div class="valid-feedback">
                    </div>
                    <div class="invalid-feedback">
                        Completa este campo
                    </div>
                </div>
                <div class="col-md-4">
                    <label>Fecha de título*</label>
                    <input type="date" name="ec_fecha_titulos[]" value="{{ $item->fecha_titulo }}"
                        class="form-control">
                    <div class="valid-feedback">
                    </div>
                    <div class="invalid-feedback">
                        Completa este campo
                    </div>
                </div>
                <div class="col-md-4">
                    <label>Estado*</label>
                    <select name="ec_estados[]" class="form-select">
                        <option value="">- Seleccione -</option>
                        <option value="EN CURSO" {{ $item->estado == 'EN CURSO' ? 'selected' : '' }}>EN CURSO</option>
                        <option value="EGRESADO" {{ $item->estado == 'EGRESADO' ? 'selected' : '' }}>EGRESADO</option>
                        <option value="TITULADO" {{ $item->estado == 'TITULADO' ? 'selected' : '' }}>TITULADO</option>
                    </select>
                    <div class="valid-feedback">
                    </div>
                    <div class="invalid-feedback">
                        Completa este campo
                    </div>
                </div>
                <div class="col-md-4">
                    <label>Número de título*</label>
                    <select name="ec_disciplinas[]" class="form-select">
                        <option value="">- Seleccione -</option>
                        <option value="INGENIERIA" {{ $item->disciplina == 'INGENIERIA' ? 'selected' : '' }}>INGENIERIA
                        </option>
                        <option value="LICENCIATURA" {{ $item->disciplina == 'LICENCIATURA' ? 'selected' : '' }}>
                            LICENCIATURA</option>
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
            <input type="hidden" name="ec_ids[]" value="0" />
            <div class="col-md-4">
                <label>Título profesional*</label>
                <input type="text" name="ec_titulos[]" class="form-control">
                <div class="valid-feedback">
                </div>
                <div class="invalid-feedback">
                    Completa este campo
                </div>
            </div>
            <div class="col-md-4">
                <label>Carrera*</label>
                <select name="ec_carreras[]" class="form-select">
                    {!! $html_option_carreras !!}
                </select>
                <div class="valid-feedback">
                </div>
                <div class="invalid-feedback">
                    Completa este campo
                </div>
            </div>
            <div class="col-md-4">
                <label>Institución*</label>
                <input type="text" name="ec_institucions[]" class="form-control">
                <div class="valid-feedback">
                </div>
                <div class="invalid-feedback">
                    Completa este campo
                </div>
            </div>
            <div class="col-md-4">
                <label>Nivel profesional*</label>
                <select name="ec_nivels[]" class="form-select">
                    <option value="">- Seleccione -</option>
                    <option value="TÉCNICO MEDIO">TÉCNICO MEDIO</option>
                    <option value="TÉCNICO SUPERIOR">TÉCNICO SUPERIOR
                    </option>
                    <option value="LICENCIATURA">LICENCIATURA</option>
                </select>
                <div class="valid-feedback">
                </div>
                <div class="invalid-feedback">
                    Completa este campo
                </div>
            </div>
            <div class="col-md-4">
                <label>Fecha de título*</label>
                <input type="date" name="ec_fecha_titulos[]" class="form-control">
                <div class="valid-feedback">
                </div>
                <div class="invalid-feedback">
                    Completa este campo
                </div>
            </div>
            <div class="col-md-4">
                <label>Estado*</label>
                <select name="ec_estados[]" class="form-select">
                    <option value="">- Seleccione -</option>
                    <option value="EN CURSO">EN CURSO</option>
                    <option value="EGRESADO">EGRESADO</option>
                    <option value="TITULADO">TITULADO</option>
                </select>
                <div class="valid-feedback">
                </div>
                <div class="invalid-feedback">
                    Completa este campo
                </div>
            </div>
            <div class="col-md-4">
                <label>Número de título*</label>
                <select name="ec_disciplinas[]" class="form-select">
                    <option value="">- Seleccione -</option>
                    <option value="INGENIERIA">INGENIERIA</option>
                    <option value="LICENCIATURA">LICENCIATURA</option>
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
                Agregar otra carrera</button>
        </div>
    </div>
</form>
