<div class="font-weight-bold mb-2">LLena el formulario con la información desde la más actual a la más antigua</div>
<form id="form-4">
    @if ($evaluacion && count($evaluacion->evaluacion_cursos) > 0)
        @foreach ($evaluacion->evaluacion_cursos as $key => $item)
            <div class="row fila existe" data-id="{{ $item->id }}">
                @if ($key > 0)
                    <div class="separator separator-content my-6"><i class="far fa-circle"></i></div>
                @endif
                <button type="button" class="quitar">X</button>
                <input type="hidden" name="ecur_ids[]" value="{{ $item->id }}" />
                <div class="col-md-4">
                    <label>Nombre Curso*</label>
                    <input type="text" name="ecur_nombres[]" value="{{$item->nombre}}" class="form-control"placeholder="Nombre Curso">
                    <div class="valid-feedback">
                    </div>
                    <div class="invalid-feedback">
                        Completa este campo
                    </div>
                </div>
                <div class="col-md-4">
                    <label>Institución*</label>
                    <input type="text" name="ecur_institucions[]" value="{{$item->institucion}}" class="form-control"placeholder="Institución">
                    <div class="valid-feedback">
                    </div>
                    <div class="invalid-feedback">
                        Completa este campo
                    </div>
                </div>
                <div class="col-md-4">
                    <label>Fecha*</label>
                    <input type="date" name="ecur_fechas[]" value="{{$item->fecha}}" class="form-control">
                    <div class="valid-feedback">
                    </div>
                    <div class="invalid-feedback">
                        Completa este campo
                    </div>
                </div>
                <div class="col-md-4">
                    <label>Carga Horaria(Horas)*</label>
                    <input type="number" step="1" name="ecur_carga_horarias[]" value="{{$item->carga_horaria}}" class="form-control"placeholder="Carga Horaria(Horas)">
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
            <input type="hidden" name="ecur_ids[]" value="0" />
            <div class="col-md-4">
                <label>Nombre Curso*</label>
                <input type="text" name="ecur_nombres[]" class="form-control"placeholder="Nombre Curso">
                <div class="valid-feedback">
                </div>
                <div class="invalid-feedback">
                    Completa este campo
                </div>
            </div>
            <div class="col-md-4">
                <label>Institución*</label>
                <input type="text" name="ecur_institucions[]" class="form-control"placeholder="Institución">
                <div class="valid-feedback">
                </div>
                <div class="invalid-feedback">
                    Completa este campo
                </div>
            </div>
            <div class="col-md-4">
                <label>Fecha*</label>
                <input type="date" name="ecur_fechas[]" class="form-control">
                <div class="valid-feedback">
                </div>
                <div class="invalid-feedback">
                    Completa este campo
                </div>
            </div>
            <div class="col-md-4">
                <label>Carga Horaria(Horas)*</label>
                <input type="number" step="1" name="ecur_carga_horarias[]" class="form-control"placeholder="Carga Horaria(Horas)">
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
