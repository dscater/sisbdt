@extends('layouts.admin')
@section('page')
    Parametrización
@endsection
@section('content')
    <div class="row">
        <div class="card card-flush">
            <div class="card-body">

                <form action="{{ route('parametrizacions.store') }}" method="post">
                    @csrf
                    <div class="col-12">
                        <div class="row">
                            <h5>Formación básica</h5>
                            <div class="col-md-4 form-group mb-3">
                                <label for="">Primaria</label>
                                <input type="number" class="form-control" name="primaria"
                                    value="{{ $parametrizacion ? $parametrizacion->primaria : 0 }}" />
                                @if ($errors->has('primaria'))
                                    <span class="text-danger">{{ $errors->first('primaria') }}</span>
                                @endif
                            </div>
                            <div class="col-md-4 form-group mb-3">
                                <label for="">Secundaria</label>
                                <input type="number" class="form-control" name="secundaria"
                                    value="{{ $parametrizacion ? $parametrizacion->secundaria : 0 }}" />
                                @if ($errors->has('secundaria'))
                                    <span class="text-danger">{{ $errors->first('secundaria') }}</span>
                                @endif
                            </div>
                            <div class="col-md-4 form-group mb-3">
                                <label for="">Bachiller</label>
                                <input type="number" class="form-control" name="bachiller"
                                    value="{{ $parametrizacion ? $parametrizacion->bachiller : 0 }}" />
                                @if ($errors->has('bachiller'))
                                    <span class="text-danger">{{ $errors->first('bachiller') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-0">
                            <div class="separator separator-content my-14"></div>
                            <h5>Formación Carrera</h5>
                            <div class="col-md-4 form-group mb-3">
                                <label for="">Títulado</label>
                                <input type="number" class="form-control" name="titulado"
                                    value="{{ $parametrizacion ? $parametrizacion->titulado : 0 }}" />
                                @if ($errors->has('titulado'))
                                    <span class="text-danger">{{ $errors->first('titulado') }}</span>
                                @endif
                            </div>
                            <div class="col-md-4 form-group mb-3">
                                <label for="">Egresado</label>
                                <input type="number" class="form-control" name="egresado"
                                    value="{{ $parametrizacion ? $parametrizacion->egresado : 0 }}" />
                                @if ($errors->has('egresado'))
                                    <span class="text-danger">{{ $errors->first('egresado') }}</span>
                                @endif
                            </div>
                            <div class="col-md-4 form-group mb-3">
                                <label for="">En curso</label>
                                <input type="number" class="form-control" name="en_curso"
                                    value="{{ $parametrizacion ? $parametrizacion->en_curso : 0 }}" />
                                @if ($errors->has('en_curso'))
                                    <span class="text-danger">{{ $errors->first('en_curso') }}</span>
                                @endif
                            </div>
                            <div class="col-md-4 form-group mb-3">
                                <label for="">Técnico Superior</label>
                                <input type="number" class="form-control" name="tecnico_superior"
                                    value="{{ $parametrizacion ? $parametrizacion->tecnico_superior : 0 }}" />
                                @if ($errors->has('tecnico_superior'))
                                    <span class="text-danger">{{ $errors->first('tecnico_superior') }}</span>
                                @endif
                            </div>
                            <div class="col-md-4 form-group mb-3">
                                <label for="">Técnico medio</label>
                                <input type="number" class="form-control" name="tecnico_medio"
                                    value="{{ $parametrizacion ? $parametrizacion->tecnico_medio : 0 }}" />
                                @if ($errors->has('tecnico_medio'))
                                    <span class="text-danger">{{ $errors->first('tecnico_medio') }}</span>
                                @endif
                            </div>
                            <div class="col-md-4 form-group mb-3">
                                <label for="">Disciplina Ingeniería</label>
                                <input type="number" class="form-control" name="disciplina_ingenieria"
                                    value="{{ $parametrizacion ? $parametrizacion->disciplina_ingenieria : 0 }}" />
                                @if ($errors->has('disciplina_ingenieria'))
                                    <span class="text-danger">{{ $errors->first('disciplina_ingenieria') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-0">
                            <div class="separator separator-content my-14"></div>
                            <h5>Formación Postgrado</h5>
                            <div class="col-md-4 form-group mb-3">
                                <label for="">Doctorado</label>
                                <input type="number" class="form-control" name="doctorado"
                                    value="{{ $parametrizacion ? $parametrizacion->doctorado : 0 }}" />
                                @if ($errors->has('doctorado'))
                                    <span class="text-danger">{{ $errors->first('doctorado') }}</span>
                                @endif
                            </div>
                            <div class="col-md-4 form-group mb-3">
                                <label for="">Maestría</label>
                                <input type="number" class="form-control" name="maestria"
                                    value="{{ $parametrizacion ? $parametrizacion->maestria : 0 }}" />
                                @if ($errors->has('maestria'))
                                    <span class="text-danger">{{ $errors->first('maestria') }}</span>
                                @endif
                            </div>
                            <div class="col-md-4 form-group mb-3">
                                <label for="">Especialidad</label>
                                <input type="number" class="form-control" name="especialidad"
                                    value="{{ $parametrizacion ? $parametrizacion->especialidad : 0 }}" />
                                @if ($errors->has('especialidad'))
                                    <span class="text-danger">{{ $errors->first('especialidad') }}</span>
                                @endif
                            </div>
                            <div class="col-md-4 form-group mb-3">
                                <label for="">Diplomado</label>
                                <input type="number" class="form-control" name="diplomado"
                                    value="{{ $parametrizacion ? $parametrizacion->diplomado : 0 }}" />
                                @if ($errors->has('diplomado'))
                                    <span class="text-danger">{{ $errors->first('diplomado') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-0">
                            <div class="separator separator-content my-14"></div>
                            <h5>Cursos</h5>
                            <div class="col-md-4 form-group mb-3">
                                <label for="">Por carga horaria</label>
                                <input type="number" class="form-control" name="c_carga_horaria"
                                    value="{{ $parametrizacion ? $parametrizacion->c_carga_horaria : 0 }}" />
                                @if ($errors->has('c_carga_horaria'))
                                    <span class="text-danger">{{ $errors->first('c_carga_horaria') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-0">
                            <div class="separator separator-content my-14"></div>
                            <h5>Experiencia Laboral</h5>
                            <div class="col-md-4 form-group mb-3">
                                <label for="">Por cada mes</label>
                                <input type="number" class="form-control" name="p_cada_mes"
                                    value="{{ $parametrizacion ? $parametrizacion->p_cada_mes : 0 }}" />
                                @if ($errors->has('p_cada_mes'))
                                    <span class="text-danger">{{ $errors->first('p_cada_mes') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-0">
                            <div class="separator separator-content my-14"></div>
                            <h5>Distinciones</h5>
                            <div class="col-md-4 form-group mb-3">
                                <label for="">Por cada reconocimiento</label>
                                <input type="number" class="form-control" name="p_cada_reconocimiento"
                                    value="{{ $parametrizacion ? $parametrizacion->p_cada_reconocimiento : 0 }}" />
                                @if ($errors->has('p_cada_reconocimiento'))
                                    <span class="text-danger">{{ $errors->first('p_cada_reconocimiento') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">
                            Guardar cambios
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
