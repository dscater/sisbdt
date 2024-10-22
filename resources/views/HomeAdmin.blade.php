@extends('layouts.admin')

@section('page')
    Dashboard
@endsection

@section('css')
    <style link="{{ asset('assets/Highcharts-11.4.7/code/css/highcharts.css') }}"></style>
@endsection

@section('content')
    <div class="row">
        <div class="card card-flush">
            <div class="card-body">
                <div class="row">
                    <h4>Evaluación por carrera</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Carrera</label>
                                    <select name="carrera" id="carrera" class="form-select select2">
                                        {!! $html_option_carreras !!}
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label>Seleccionar año</label>
                                    <select name="anio" id="anio" class="form-select">
                                        @foreach ($anios as $value)
                                            <option value="{{ $value }}" {{ $value == date('Y') ? 'selected' : '' }}>
                                                {{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label>Seleccionar mes</label>
                                    <select name="mes" id="mes" class="form-select">
                                        @foreach ($meses as $key => $value)
                                            <option value="{{ $key }}" {{ $key == date('m') ? 'selected' : '' }}>
                                                {{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- <div class="row">
                                <div class="col-md-3">
                                    <label>Fecha inicio</label>
                                    <input type="date" id="fecha_ini1" class="form-control" />
                                </div>
                                <div class="col-md-3">
                                    <label>Fecha fin</label>
                                    <input type="date" id="fecha_fin1" class="form-control" />
                                </div>
                            </div> --}}
                        </div>
                        <div class="col-md-12" id="container1"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/Highcharts-11.4.7/code/highcharts.js') }}"></script>
    <script>
        const carrera = document.getElementById("carrera")
        const anio = document.getElementById("anio")
        const mes = document.getElementById("mes")
        document.addEventListener('DOMContentLoaded', function() {
            fechaActual();

            $('.select2').chosen();

            // Escucha el evento "change"
            $("#carrera").on('change', function(event) {
                event.preventDefault();
                grafico1();
            });

            carrera.addEventListener("change", (e) => {
                e.preventDefault();
                grafico1();
            });

            // Escucha el evento "change"
            anio.addEventListener("change", (e) => {
                e.preventDefault();
                grafico1();
            });

            // Escucha el evento "change"
            mes.addEventListener("change", (e) => {
                e.preventDefault();
                grafico1();
            });

            grafico1();
        });

        function grafico1() {
            $.ajax({
                type: "GET",
                url: "{{ route('cantidadEstudiantesCarrera') }}",
                data: {
                    carrera_id: carrera.value,
                    anio: anio.value,
                    mes: mes.value,
                },
                dataType: "json",
                success: function(response) {

                    Highcharts.chart("container1", {
                        chart: {
                            type: "column",
                        },
                        title: {
                            text: "PUNTUACIÓN ESTUDIANTES",
                        },
                        subtitle: {
                            text: "",
                        },
                        xAxis: {
                            type: "category",
                            // crosshair: true,
                            labels: {
                                rotation: 0,
                                style: {
                                    fontSize: "10px",
                                    fontFamily: "Verdana, sans-serif",
                                },
                            },
                        },
                        yAxis: {
                            min: 0,
                            title: {
                                text: "TOTAL CANTIDAD",
                            },
                        },
                        legend: {
                            enabled: true,
                        },
                        plotOptions: {
                            series: {
                                borderWidth: 0,
                                dataLabels: {
                                    enabled: true,
                                    format: "{point.y:.0f}",
                                },
                            },
                        },
                        tooltip: {
                            headerFormat: '<span style="font-size:10px"><b>{point.key}</b></span><table>',
                            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                '<td style="padding:0"><b>{point.y:.0f}</b></td></tr>',
                            footerFormat: "</table>",
                            shared: true,
                            useHTML: true,
                        },

                        series: response.series,
                    });
                },
                error: function(err) {
                    console.log(err)
                }
            });
        }


        function fechaActual() {
            let date = new Date()

            let day = date.getDate()
            let month = date.getMonth() + 1
            let year = date.getFullYear()

            let fecha = '';
            if (month < 10) {
                fecha = `${year}-0${month}-${day}`;
            } else {
                fecha = `${year}-${month}-${day}`;
            }
            // fecha_ini1.value = fecha;
            // fecha_fin1.value = fecha;
            return fecha
        }
    </script>
@endsection
