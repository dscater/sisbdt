<div class="font-weight-bold mb-2">LLena el formulario con la información desde la más actual a la más antigua</div>
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
                    <select name="fb_nivels[]" class="form-select" required>
                        <option value="">- Seleccione -</option>
                        <option value="PRIMERO" {{ $item->nivel == 'PRIMERO' ? 'selected' : '' }}>PRIMARIA</option>
                        <option value="SEGUNDO" {{ $item->nivel == 'SEGUNDO' ? 'selected' : '' }}>SEGUNDO</option>
                        <option value="TERCERO" {{ $item->nivel == 'TERCERO' ? 'selected' : '' }}>TERCERO</option>
                        <option value="CUARTO" {{ $item->nivel == 'CUARTO' ? 'selected' : '' }}>CUARTO</option>
                        <option value="QUINTO" {{ $item->nivel == 'QUINTO' ? 'selected' : '' }}>QUINTO</option>
                        <option value="SEXTO" {{ $item->nivel == 'SEXTO' ? 'selected' : '' }}>SEXTO</option>
                        <option value="SÉPTIMO" {{ $item->nivel == 'SÉPTIMO' ? 'selected' : '' }}>SÉPTIMO</option>
                        <option value="OCTAVO" {{ $item->nivel == 'OCTAVO' ? 'selected' : '' }}>OCTAVO</option>
                        <option value="PRIMERO MEDIO" {{ $item->nivel == 'PRIMERO MEDIO' ? 'selected' : '' }}>PRIMERO
                            MEDIO</option>
                        <option value="SEGUNDO MEDIO" {{ $item->nivel == 'SEGUNDO MEDIO' ? 'selected' : '' }}>SEGUNDO
                            MEDIO</option>
                        <option value="TERCERO MEDIO" {{ $item->nivel == 'TERCERO MEDIO' ? 'selected' : '' }}>TERCERO
                            MEDIO</option>
                        <option value="CUARTO MEDIO" {{ $item->nivel == 'CUARTO MEDIO' ? 'selected' : '' }}>CUARTO
                            MEDIO</option>
                        <option value="PRIMERO DE SECUNDARIA"
                            {{ $item->nivel == 'PRIMERO DE SECUNDARIA' ? 'selected' : '' }}>PRIMERO DE SECUNDARIA
                        </option>
                        <option value="SEGUNDO DE SECUNDARIA"
                            {{ $item->nivel == 'SEGUNDO DE SECUNDARIA' ? 'selected' : '' }}>SEGUNDO DE SECUNDARIA
                        </option>
                        <option value="TERCERO DE SECUNDARIA"
                            {{ $item->nivel == 'TERCERO DE SECUNDARIA' ? 'selected' : '' }}>TERCERO DE SECUNDARIA
                        </option>
                        <option value="CUARTO DE SECUNDARIA"
                            {{ $item->nivel == 'CUARTO DE SECUNDARIA' ? 'selected' : '' }}>CUARTO DE SECUNDARIA
                        </option>
                        <option value="QUINTO DE SECUNDARIA"
                            {{ $item->nivel == 'QUINTO DE SECUNDARIA' ? 'selected' : '' }}>QUINTO DE SECUNDARIA
                        </option>
                        <option value="SEXTO DE SECUNDARIA"
                            {{ $item->nivel == 'SEXTO DE SECUNDARIA' ? 'selected' : '' }}>SEXTO DE SECUNDARIA</option>
                    </select>
                    <div class="valid-feedback">
                    </div>
                    <div class="invalid-feedback">
                        Completa este campo
                    </div>
                </div>
                <div class="col-md-4">
                    <label>Grado Escolaridad*</label>
                    <select name="fb_grados[]" class="form-select" required>
                        <option value="">- Seleccione -</option>
                        <option value="PRIMARIA" {{ $item->grado == 'PRIMARIA' ? 'selected' : '' }}>PRIMARIA</option>
                        <option value="SECUNDARIA" {{ $item->grado == 'SECUNDARIA' ? 'selected' : '' }}>SECUNDARIA
                        </option>
                        <option value="BACHILLER" {{ $item->grado == 'BACHILLER' ? 'selected' : '' }}>BACHILLER
                        </option>
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
                        placeholder="Institución" class="form-control">
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
                <select name="fb_nivels[]" class="form-select">
                    <option value="">- Seleccione -</option>
                    <option value="PRIMERO">PRIMARIA</option>
                    <option value="SEGUNDO">SEGUNDO</option>
                    <option value="TERCERO">TERCERO</option>
                    <option value="CUARTO">CUARTO</option>
                    <option value="QUINTO">QUINTO</option>
                    <option value="SEXTO">SEXTO</option>
                    <option value="SÉPTIMO">SÉPTIMO</option>
                    <option value="OCTAVO">OCTAVO</option>
                    <option value="PRIMERO MEDIO">PRIMERO MEDIO</option>
                    <option value="SEGUNDO MEDIO">SEGUNDO MEDIO</option>
                    <option value="TERCERO MEDIO">TERCERO MEDIO</option>
                    <option value="CUARTO MEDIO">CUARTO MEDIO</option>
                    <option value="PRIMERO DE SECUNDARIA">PRIMERO DE SECUNDARIA</option>
                    <option value="SEGUNDO DE SECUNDARIA">SEGUNDO DE SECUNDARIA</option>
                    <option value="TERCERO DE SECUNDARIA">TERCERO DE SECUNDARIA</option>
                    <option value="CUARTO DE SECUNDARIA">CUARTO DE SECUNDARIA</option>
                    <option value="QUINTO DE SECUNDARIA">QUINTO DE SECUNDARIA</option>
                    <option value="SEXTO DE SECUNDARIA">SEXTO DE SECUNDARIA</option>
                </select>
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
                    <option value="PRIMARIA">PRIMARIA</option>
                    <option value="SECUNDARIA">SECUNDARIA</option>
                    <option value="BACHILLER">BACHILLER</option>
                </select>
                <div class="valid-feedback">
                </div>
                <div class="invalid-feedback">
                    Completa este campo
                </div>
            </div>
            <div class="col-md-4">
                <label>Institución*</label>
                <input type="text" name="fb_institucions[]" class="form-control" placeholder="Institución">
                <div class="valid-feedback">

                </div>
                <div class="invalid-feedback">
                    Completa este campo
                </div>
            </div>
        </div>
    @endif
    {{-- <div class="row mt-3">
        <div class="col-12 text-center">
            <button type="button" class="btn btn-success mx-auto btn-sm btnAgregar"><i class="fa fa-plus"></i>
                Agregar</button>
        </div>
    </div> --}}

    <div id="eliminados_forms"></div>
</form>
