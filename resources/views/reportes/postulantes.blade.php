@extends('layouts.admin')

@section('page')
    Reportes > Postulantes
@endsection
@section('css')
    <style>
    </style>
@endsection

@section('content')
    <div class="row mt-5">
        <div class="card card-flush">
            <div class="card-body">
                <form action="{{route('reportes.postulantes_pdf')}}" target="_blank">
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <label>Seleccionar carrera*</label>
                            <select name="carrera" class="form-select" required>
                                <option value="todos">TODOS</option>
                                {!! $html_option_carreras !!}
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Fecha Inicio</label>
                                    <input type="date" name="fecha_ini" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label>Fecha Fin</label>
                                    <input type="date" name="fecha_fin" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6 offset-md-3">
                            <button class="btn btn-primary w-100">Generar reporte</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script></script>
@endsection
