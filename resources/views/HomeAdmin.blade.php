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
                    <h4>Cantidad de postulantes por carrera</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Fecha inicio</label>
                                    <input type="date" id="fecha_ini1" class="form-control" />
                                </div>
                                <div class="col-md-3">
                                    <label>Fecha fin</label>
                                    <input type="date" id="fecha_fin1" class="form-control" />
                                </div>
                            </div>
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
        const fecha_ini1 = document.getElementById("fecha_ini1")
        const fecha_fin1 = document.getElementById("fecha_fin1")
        document.addEventListener('DOMContentLoaded', function() {
            fechaActual();

            // Escucha el evento "change"
            fecha_ini1.addEventListener("change", (e) => {
                e.preventDefault();
                grafico1();
            });

            // Escucha el evento "keyup"
            fecha_ini1.addEventListener("keyup", (e) => {
                e.preventDefault();
                grafico1();
            });

            // Lo mismo para "fecha_fin1"
            fecha_fin1.addEventListener("change", (e) => {
                e.preventDefault();
                grafico1();
            });

            fecha_fin1.addEventListener("keyup", (e) => {
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
                    fecha_ini: fecha_ini1.value,
                    fecha_fin: fecha_fin1.value,
                },
                dataType: "json",
                success: function(response) {

                    Highcharts.chart("container1", {
                        chart: {
                            type: "bar",
                            height: response.data.length * 30
                        },
                        title: {
                            text: "CANTIDAD DE POSTULANTES POR CARRERA",
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

                        series: [{
                            name: "Total",
                            colorByPoint: true,
                            data: response.data,
                            dataLabels: {
                                rotation: 0,
                                color: "#000000",
                                format: "{point.y:.0f}", // one decimal
                                y: 0, // 10 pixels down from the top
                                style: {
                                    fontSize: "10px",
                                    fontFamily: "Verdana, sans-serif",
                                },
                            },
                        }, ],
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
            fecha_ini1.value = fecha;
            fecha_fin1.value = fecha;
            return fecha
        }
    </script>
@endsection
