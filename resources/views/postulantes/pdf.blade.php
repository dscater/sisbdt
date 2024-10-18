<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Evaluación</title>
    <style type="text/css">
        * {
            font-family: sans-serif;
        }

        @page {
            margin-top: 0.5cm;
            margin-bottom: 0.5cm;
            margin-left: 1cm;
            margin-right: 0.5cm;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
            margin-top: 30px;
            page-break-before: avoid;
        }

        table thead tr th,
        tbody tr td {
            padding: 3px;
            word-wrap: break-word;
        }

        table thead tr th {
            font-size: 9pt;
        }

        table tbody tr td {
            font-size: 8pt;
        }


        .encabezado {
            width: 100%;
        }

        .logo img {
            position: absolute;
            width: 130px;
            top: 0px;
            left: 0px;
        }

        h2.titulo {
            width: 450px;
            margin: auto;
            margin-top: 0PX;
            margin-bottom: 15px;
            text-align: center;
            font-size: 14pt;
        }

        .texto {
            width: 250px;
            text-align: center;
            margin: auto;
            margin-top: 15px;
            font-weight: bold;
            font-size: 1.1em;
        }

        .fecha {
            width: 250px;
            text-align: center;
            margin: auto;
            margin-top: 15px;
            font-weight: normal;
            font-size: 0.85em;
        }

        .total {
            text-align: right;
            padding-right: 15px;
            font-weight: bold;
        }

        table {
            width: 100%;
        }

        table thead {
            background: rgb(236, 236, 236)
        }

        tr {
            page-break-inside: avoid !important;
        }

        .centreado {
            padding-left: 0px;
            text-align: center;
        }

        .datos {
            margin-left: 15px;
            border-top: solid 1px;
            border-collapse: collapse;
            width: 250px;
        }

        .txt {
            font-weight: bold;
            text-align: right;
            padding-right: 5px;
        }

        .txt_center {
            font-weight: bold;
            text-align: center;
        }

        .cumplimiento {
            position: absolute;
            width: 150px;
            right: 0px;
            top: 86px;
        }

        .b_top {
            border-top: solid 1px black;
        }

        .gray {
            background: rgb(202, 202, 202);
        }

        .bg-principal {
            background: #1867C0;
            color: white;
        }

        .bold {
            font-weight: bold;
        }

        .derecha {
            text-align: right;
        }

        .foto {
            width: 180px;
            padding: 0px;
            text-align: center;
        }

        .foto img {
            height: 120px;
        }

        .w-100 {
            width: 100%;
        }

        .text-center {
            text-align: center;
        }

        .t_evaluacion {
            margin-top: 0px;
        }

        .title_info {
            margin-bottom: 5px;
        }
    </style>
</head>

<body>
    @inject('configuracion', 'App\Models\Configuracion')
    <div class="encabezado">
        <div class="logo">
            <img src="{{ $configuracion->first()->logo_b64 }}">
        </div>
        <h2 class="titulo">
            {{ $configuracion->first()->nombre_sistema }}
        </h2>
        <h4 class="texto">DATOS DEL POSTULANTE</h4>
        <h4 class="fecha">Expedido: {{ date('d-m-Y') }}</h4>
    </div>
    @php
        $evaluacion = $usuario->evaluacion;
    @endphp


    <table border="1">
        <tbody>
            <tr>
                <td class="bold derecha" width="20%">Nombre(s):</td>
                <td width="35%">{{ $usuario->nombres }}</td>
                <td class="foto" rowspan="4" colspan="2">
                    @if($usuario->datos_personal)
                    <img src="{{ $usuario->datos_personal->foto_b64 }}" alt="">
                    @else
                    <img src="{{ $usuario->foto_b64 }}" alt="">
                    @endif
                </td>
            </tr>
            <tr>
                <td class="bold derecha">Apellidos:</td>
                <td>{{ $usuario->apellidos }}</td>
            </tr>
            <tr>
                <td class="bold derecha">Email:</td>
                <td>{{ $usuario->email }}</td>
            </tr>
            <tr>
                <td class="bold derecha">Documento de identificación:</td>
                <td>{{ $usuario->datos_personal ? $usuario->datos_personal->tipo_ci : '' }}</td>
            </tr>
            <tr>
                <td class="bold derecha">Nro. de documento:</td>
                <td>{{ $usuario->datos_personal ? $usuario->datos_personal->nro_ci : '' }}</td>
                <td class="bold derecha" width="20%">Fecha de Nacimiento:</td>
                <td>{{ $usuario->datos_personal ? $usuario->datos_personal->fecha_nacimiento : '' }}</td>
            </tr>
            <tr>
                <td class="bold derecha" width="20%">Lugar de Nacimiento:</td>
                <td>{{ $usuario->datos_personal ? $usuario->datos_personal->lugar_nacimiento : '' }}</td>
                <td class="bold derecha" width="20%">Genero:</td>
                <td>{{ $usuario->datos_personal ? $usuario->datos_personal->genero : '' }}</td>
            </tr>
            <tr>
                <td class="bold derecha" width="20%">Teléfono/Celular:</td>
                <td>{{ $usuario->datos_personal ? $usuario->datos_personal->fono : '' }}</td>
                <td class="bold derecha" width="20%">Dirección:</td>
                <td>{{ $usuario->datos_personal ? $usuario->datos_personal->dir : '' }}</td>
            </tr>
        </tbody>
    </table>
    @if (Auth::user()->tipo == 'ADMINISTRADOR')
        <p class="alert alert-success"><strong>Puntuación:</strong>
            {{ $usuario->evaluacion ? $usuario->evaluacion->puntuacion : 0 }}</p>
    @endif
    <h4 class="w-100 text-center">Registro de Evaluación</h4>

    @php
        $evaluacion = $usuario->evaluacion;
    @endphp

    <h5 class="title_info">Formación básica</h5>
    @if ($evaluacion && count($evaluacion->evaluacion_basicas) > 0)
        <table border="1" class="t_evaluacion">
            <thead>
                <tr>
                    <th width="5%">N°</th>
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


    <h5 class="title_info">Formación carrera</h5>


    @if ($evaluacion && count($evaluacion->evaluacion_carreras) > 0)
        <table border="1" class="t_evaluacion">
            <thead>
                <tr>
                    <th width="5%">N°</th>
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


    <h5 class="title_info">Formación postgrado</h5>
    @if ($evaluacion && count($evaluacion->evaluacion_postgrados) > 0)
        <table border="1" class="t_evaluacion">
            <thead>
                <tr>
                    <th width="5%">N°</th>
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


    <h5 class="title_info">Formación postgrado</h5>
    @if ($evaluacion && count($evaluacion->evaluacion_postgrados) > 0)
        <table border="1" class="t_evaluacion">
            <thead>
                <tr>
                    <th width="5%">N°</th>
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


    <h5 class="title_info">Cursos</h5>
    @if ($evaluacion && count($evaluacion->evaluacion_cursos) > 0)
        <table border="1" class="t_evaluacion">
            <thead>
                <tr>
                    <th width="5%">N°</th>
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


    <h5 class="title_info">Experiencia laboral</h5>
    @if ($evaluacion && count($evaluacion->evaluacion_laborals) > 0)
        <table border="1" class="t_evaluacion">
            <thead>
                <tr>
                    <th width="5%">N°</th>
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


    <h5 class="title_info">Distinciones</h5>
    @if ($evaluacion && count($evaluacion->evaluacion_distincions) > 0)
        <table border="1" class="t_evaluacion">
            <thead>
                <tr>
                    <th width="5%">N°</th>
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

    @php
        $datos_otros = $usuario->datos_otros;
    @endphp

    <h5 class="title_info">Idiomas</h5>
    @if ($datos_otros && count($datos_otros->idiomas) > 0)
        <table border="1" class="t_evaluacion">
            <thead>
                <tr>
                    <th width="5%">N°</th>
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
                        <td>{{ $item->l_idioma->nombre }}</td>
                        <td>{{ $item->nivel }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        Sin registros
    @endif


    <h5 class="title_info">Habilidades</h5>
    @if ($datos_otros && count($datos_otros->habilidads) > 0)
        <table border="1" class="t_evaluacion">
            <thead>
                <tr>
                    <th width="5%">N°</th>
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


    <h5 class="title_info">Cualidades</h5>
    @if ($datos_otros && count($datos_otros->cualidads) > 0)
        <table border="1" class="t_evaluacion">
            <thead>
                <tr>
                    <th width="5%">N°</th>
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


    <h5 class="title_info">Referencias</h5>
    @if ($datos_otros && count($datos_otros->referencias) > 0)
        <table border="1" class="t_evaluacion">
            <thead>
                <tr>
                    <th width="5%">N°</th>
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

</body>

</html>
