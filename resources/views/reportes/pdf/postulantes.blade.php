<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Postulantes</title>
    <style type="text/css">
        * {
            font-family: sans-serif;
        }

        @page {
            margin-top: 1.5cm;
            margin-bottom: 0.3cm;
            margin-left: 0.3cm;
            margin-right: 0.3cm;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
            margin-top: 20px;
            page-break-before: avoid;
        }

        table thead tr th,
        tbody tr td {
            padding: 3px;
            word-wrap: break-word;
        }

        table thead tr th {
            font-size: 7pt;
        }

        table tbody tr td {
            font-size: 6pt;
        }


        .encabezado {
            width: 100%;
        }

        .logo img {
            position: absolute;
            width: 180px;
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

        .txt_rojo {}

        .img_celda img {
            width: 45px;
        }

        .listado {
            padding: 0px;
        }

        .listado ol {
            padding-left: 17px;
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
            {{ $configuracion->first()->razon_social }}
        </h2>
        <h4 class="texto">LISTA DE POSTULANTES</h4>
        <h4 class="fecha">Expedido: {{ date('d-m-Y') }}</h4>
    </div>
    <table border="1">
        <thead class="bg-principal">
            <tr>
                <th width="3%">N°</th>
                <th width="5%">FOTO</th>
                <th>APELLIDOS</th>
                <th>NOMBRE(S)</th>
                <th>EMAIL</th>
                <th>DOCUMENTO</th>
                <th width="5%">NRO. DOC.</th>
                <th width="5%">FECHA DE NACIMIENTO</th>
                <th>LUGAR NAC.</th>
                <th>GENERO</th>
                <th>TELÉFONO</th>
                <th>DIRECCIÓN</th>
                <th>CARRERA(S)</th>
                <th width="5%">FECHA DE REGISTRO</th>
            </tr>
        </thead>
        <tbody>
            @php
                $cont = 1;
            @endphp
            @foreach ($usuarios as $user)
                <tr>
                    <td class="centreado">{{ $cont++ }}</td>
                    <td class="img_celda centreado">
                        <img src="{{ $user->datos_personal ? $user->datos_personal->foto_b64 : $user->foto_b64 }}"
                            alt="Foto">

                    </td>
                    <td class="">{{ $user->apellidos }}</td>
                    <td class="">{{ $user->nombres }}</td>
                    <td class="">{{ $user->email }}</td>
                    <td class="">{{ $user->datos_personal ? $user->datos_personal->tipo_ci : '' }}</td>
                    <td class="">{{ $user->datos_personal ? $user->datos_personal->nro_ci : '' }}</td>
                    <td class="">{{ $user->datos_personal ? $user->datos_personal->fecha_nacimiento : '' }}</td>
                    <td class="">{{ $user->datos_personal ? $user->datos_personal->lugar_nacimiento : '' }}</td>
                    <td class="">{{ $user->datos_personal ? $user->datos_personal->genero : '' }}</td>
                    <td class="">{{ $user->datos_personal ? $user->datos_personal->fono : '' }}</td>
                    <td class="">{{ $user->datos_personal ? $user->datos_personal->dir : '' }}</td>
                    <td class="listado">
                        @php
                            $carreras = [];
                            if ($user->evaluacion) {
                                $carreras = App\Models\EvaluacionCarrera::where(
                                    'evaluacion_id',
                                    $user->evaluacion->id,
                                )->get();
                            }
                        @endphp
                        <ol>
                            @foreach ($carreras as $value)
                                <li>{{ $value->carrera }}</li>
                            @endforeach
                        </ol>
                    </td>
                    <td class="centreado">
                        {{ $user->evaluacion ? $user->evaluacion->fecha_registro_t : $user->fecha_registro_t }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
