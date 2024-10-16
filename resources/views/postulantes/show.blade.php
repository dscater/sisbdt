@extends('layouts.app')

@section('css')
    <style>
    </style>
@endsection

@section('content')
    <h3 class="text-center text-h4">POSTULANTES - VER INFORMACIÓN</h3>
    <div class="row mt-5">
        <div class="col-12">
            <div class="row">
                @if (Auth::user()->tipo != 'POSTULANTE')
                    <div class="col-12">
                        <p class="alert alert-success"><strong>Puntuación:</strong>
                            {{ $usuario->evaluacion ? $usuario->evaluacion->puntuacion : 0 }}</p>
                    </div>
                @endif
                <div class="col-md-4">
                    <p><strong>Nombre(s): </strong> {{ $usuario->nombres }}</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Apellidos(s): </strong> {{ $usuario->apellidos }}</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Email: </strong> {{ $usuario->email }}</p>
                </div>
                <div class="col-md-4">
                    @if ($usuario->datos_personal)
                        <p><strong>Foto: </strong> <img src="{{ $usuario->datos_personal->url_foto }}" alt=""
                                width="100px"></p>
                    @else
                        <p><strong>Foto: </strong> <img src="{{ $usuario->url_foto }}" alt="" width="100px"></p>
                    @endif
                </div>

                <div class="col-md-4">
                    <p><strong>Documento de identificación: </strong>
                        {{ $usuario->datos_personal ? $usuario->datos_personal->tipo_ci : '' }}</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Nro. de documento: </strong>
                        {{ $usuario->datos_personal ? $usuario->datos_personal->nro_ci : '' }}</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Fecha de Nacimiento: </strong>
                        {{ $usuario->datos_personal ? $usuario->datos_personal->fecha_nacimiento : '' }}</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Lugar de Nacimiento: </strong>
                        {{ $usuario->datos_personal ? $usuario->datos_personal->lugar_nacimiento : '' }}</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Genero: </strong>
                        {{ $usuario->datos_personal ? $usuario->datos_personal->genero : '' }}</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Teléfono/Celular: </strong>
                        {{ $usuario->datos_personal ? $usuario->datos_personal->fono : '' }}</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Dirección: </strong>
                        {{ $usuario->datos_personal ? $usuario->datos_personal->dir : '' }}</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Hoja de vida: </strong>
                        @if ($usuario->datos_personal)
                            <a href="{{ $usuario->datos_personal->url_hoja_vida }}" target="_blank"
                                class="btn btn-sm btn-primary"><i class="fa fa-download"></i></a>
                        @endif
                    </p>
                </div>
                <div class="col-12">
                    <h4 class="w-100 text-center">Registro de Evaluación</h4>
                </div>
                @php
                    $evaluacion = $usuario->evaluacion;
                @endphp
                <div class="col-12">
                    <h5>Formación básica</h5>
                </div>
                <div class="col-12">
                    @if ($evaluacion && count($evaluacion->evaluacion_basicas) > 0)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Nivel escolaridad</th>
                                    <th>Grado escolaridad</th>
                                    <th>Institución</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $cont = 1;
                                @endphp
                                @foreach ($evaluacion->evaluacion_basicas as $item)
                                    <tr>
                                        <td>{{ $cont++ }}</td>
                                        <td>{{ $item->nivel }}</td>
                                        <td>{{ $item->grado }}</td>
                                        <td>{{ $item->institucion }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        Sin registros
                    @endif
                </div>
                <div class="col-12">
                    <h5>Formación carrera</h5>
                </div>
                <div class="col-12">
                    @if ($evaluacion && count($evaluacion->evaluacion_carreras) > 0)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Título profesional</th>
                                    <th>Carrera</th>
                                    <th>Institución</th>
                                    <th>Nivel profesional</th>
                                    <th>Fecha Título</th>
                                    <th>Estado</th>
                                    <th>Disciplina</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $cont = 1;
                                @endphp
                                @foreach ($evaluacion->evaluacion_carreras as $item)
                                    <tr>
                                        <td>{{ $cont++ }}</td>
                                        <td>{{ $item->titulo }}</td>
                                        <td>{{ $item->carrera }}</td>
                                        <td>{{ $item->institucion }}</td>
                                        <td>{{ $item->nivel }}</td>
                                        <td>{{ $item->fecha_titulo }}</td>
                                        <td>{{ $item->estado }}</td>
                                        <td>{{ $item->disciplina }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        Sin registros
                    @endif
                </div>
                <div class="col-12">
                    <h5>Formación postgrado</h5>
                    @if ($evaluacion && count($evaluacion->evaluacion_postgrados) > 0)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Institución</th>
                                    <th>Fecha postgrado</th>
                                    <th>Título postgrado</th>
                                    <th>Nivel académico</th>
                                    <th>Postgrado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $cont = 1;
                                @endphp
                                @foreach ($evaluacion->evaluacion_postgrados as $item)
                                    <tr>
                                        <td>{{ $cont++ }}</td>
                                        <td>{{ $item->institucion }}</td>
                                        <td>{{ $item->fecha_postgrado }}</td>
                                        <td>{{ $item->titulo }}</td>
                                        <td>{{ $item->nivel }}</td>
                                        <td>{{ $item->postgrado }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        Sin registros
                    @endif
                </div>
                <div class="col-12">
                    <h5>Formación postgrado</h5>
                    @if ($evaluacion && count($evaluacion->evaluacion_postgrados) > 0)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Institución</th>
                                    <th>Fecha postgrado</th>
                                    <th>Título postgrado</th>
                                    <th>Nivel académico</th>
                                    <th>Postgrado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $cont = 1;
                                @endphp
                                @foreach ($evaluacion->evaluacion_postgrados as $item)
                                    <tr>
                                        <td>{{ $cont++ }}</td>
                                        <td>{{ $item->institucion }}</td>
                                        <td>{{ $item->fecha_postgrado }}</td>
                                        <td>{{ $item->titulo }}</td>
                                        <td>{{ $item->nivel }}</td>
                                        <td>{{ $item->postgrado }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        Sin registros
                    @endif
                </div>
                <div class="col-12">
                    <h5>Cursos</h5>
                    @if ($evaluacion && count($evaluacion->evaluacion_cursos) > 0)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Nombre curso</th>
                                    <th>Institución</th>
                                    <th>Fecha</th>
                                    <th>Carga horaria(horas)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $cont = 1;
                                @endphp
                                @foreach ($evaluacion->evaluacion_cursos as $item)
                                    <tr>
                                        <td>{{ $cont++ }}</td>
                                        <td>{{ $item->nombre }}</td>
                                        <td>{{ $item->institucion }}</td>
                                        <td>{{ $item->fecha }}</td>
                                        <td>{{ $item->carga_horaria }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        Sin registros
                    @endif
                </div>
                <div class="col-12">
                    <h5>Experiencia laboral</h5>
                    @if ($evaluacion && count($evaluacion->evaluacion_laborals) > 0)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Cargo</th>
                                    <th>Institución/Empresa</th>
                                    <th>Fecha inicio</th>
                                    <th>Fecha final</th>
                                    <th>Descripción del cargo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $cont = 1;
                                @endphp
                                @foreach ($evaluacion->evaluacion_laborals as $item)
                                    <tr>
                                        <td>{{ $cont++ }}</td>
                                        <td>{{ $item->cargo }}</td>
                                        <td>{{ $item->institucion }}</td>
                                        <td>{{ $item->fecha_ini }}</td>
                                        <td>{{ $item->fecha_fin }}</td>
                                        <td>{{ $item->descripcion }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        Sin registros
                    @endif
                </div>
                <div class="col-12">
                    <h5>Distinciones</h5>
                    @if ($evaluacion && count($evaluacion->evaluacion_distincions) > 0)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Mérito</th>
                                    <th>Institución</th>
                                    <th>Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $cont = 1;
                                @endphp
                                @foreach ($evaluacion->evaluacion_distincions as $item)
                                    <tr>
                                        <td>{{ $cont++ }}</td>
                                        <td>{{ $item->merito }}</td>
                                        <td>{{ $item->institucion }}</td>
                                        <td>{{ $item->fecha }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        Sin registros
                    @endif
                </div>
                @php
                    $datos_otros = $usuario->datos_otros;
                @endphp
                <div class="col-12">
                    <h5>Idiomas</h5>
                    @if ($datos_otros && count($datos_otros->idiomas) > 0)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Idioma</th>
                                    <th>Nivel</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $cont = 1;
                                @endphp
                                @foreach ($datos_otros->idiomas as $item)
                                    <tr>
                                        <td>{{ $cont++ }}</td>
                                        <td>{{ $item->idioma }}</td>
                                        <td>{{ $item->nivel }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        Sin registros
                    @endif
                </div>
                <div class="col-12">
                    <h5>Habilidades</h5>
                    @if ($datos_otros && count($datos_otros->habilidads) > 0)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Habilidad/Conocimiento</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $cont = 1;
                                @endphp
                                @foreach ($datos_otros->habilidads as $item)
                                    <tr>
                                        <td>{{ $cont++ }}</td>
                                        <td>{{ $item->habilidad }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        Sin registros
                    @endif
                </div>
                <div class="col-12">
                    <h5>Cualidades</h5>
                    @if ($datos_otros && count($datos_otros->cualidads) > 0)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Cualidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $cont = 1;
                                @endphp
                                @foreach ($datos_otros->cualidads as $item)
                                    <tr>
                                        <td>{{ $cont++ }}</td>
                                        <td>{{ $item->cualidad }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        Sin registros
                    @endif
                </div>
                <div class="col-12">
                    <h5>Referencias</h5>
                    @if ($datos_otros && count($datos_otros->referencias) > 0)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Nombre referencia</th>
                                    <th>Celular referencia</th>
                                    <th>Correo referencia</th>
                                    <th>Cargo referencia</th>
                                    <th>Relación referencia</th>
                                    <th>Descripción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $cont = 1;
                                @endphp
                                @foreach ($datos_otros->referencias as $item)
                                    <tr>
                                        <td>{{ $cont++ }}</td>
                                        <td>{{ $item->nombre_ref }}</td>
                                        <td>{{ $item->cel_ref }}</td>
                                        <td>{{ $item->correo_ref }}</td>
                                        <td>{{ $item->cargo_ref }}</td>
                                        <td>{{ $item->relacion_ref }}</td>
                                        <td>{{ $item->descripcion }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        Sin registros
                    @endif
                </div>
            </div>
        </div>
        @if (Auth::user()->tipo != 'POSTULANTE')
            <div class="col-md-3">
                <a href="{{ route('postulantes') }}" class="btn btn-secondary w-100">Volver</a>
            </div>
        @else
            <div class="col-md-3">
                <a href="{{ route('evaluacions.index') }}" class="btn btn-secondary w-100">Volver</a>
            </div>
        @endif
        <div class="col-md-4">
            <a href="{{ route('usuarios.pdf', $usuario->id) }}" target="_blank"
                class="btn btn-primary btn-sm w-100 btn-block"><i class="fa fa-file-pdf"></i> Generar pdf</a>
        </div>
    </div>
@endsection

@section('scripts')
    <script></script>
@endsection
