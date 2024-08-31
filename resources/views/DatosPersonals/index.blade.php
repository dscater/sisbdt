@extends('layouts.app')
@section('css')
    <style>
        #imagen_p {
            width: 80%;
        }

        .foto_datos_personal {
            width: 120px;
        }
    </style>
@endsection
@section('content')
    <h3 class="text-center text-h4">DATOS PERSONALES</h3>
    <div class="row">
        <form action="{{ route('datos_personals.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-12">
                <div class="row">
                    <div class="col-md-4 form-group mb-3">
                        <label for="">Documento de identificación*</label>
                        <select name="tipo_ci" id="tipo_ci" class="form-select" required>
                            <option value="">- Seleccione -</option>
                            <option value="CÉDULA DE IDENTIDAD">CÉDULA DE IDENTIDAD</option>
                            <option value="EXTRANJERO">EXTRANJERO</option>
                        </select>
                        @if ($errors->has('tipo_ci'))
                            <span class="text-danger">{{ $errors->first('tipo_ci') }}</span>
                        @endif
                    </div>
                    <div class="col-md-4 form-group mb-3">
                        <label for="">Nro. de documento*</label>
                        <input type="text" class="form-control" name="nro_ci"
                            value="{{ $datos_personal ? $datos_personal->nro_ci : '' }}" required />
                        @if ($errors->has('nro_ci'))
                            <span class="text-danger">{{ $errors->first('nro_ci') }}</span>
                        @endif
                    </div>
                    <div class="col-md-4 form-group mb-3">
                        <label for="">Fecha de nacimiento*</label>
                        <input type="date" class="form-control" name="fecha_nacimiento"
                            value="{{ $datos_personal ? $datos_personal->fecha_nacimiento : '' }}" required />
                        @if ($errors->has('fecha_nacimiento'))
                            <span class="text-danger">{{ $errors->first('fecha_nacimiento') }}</span>
                        @endif
                    </div>
                    <div class="col-md-4 form-group mb-3">
                        <label for="">Lugar de Nacimiento*</label>
                        <input type="text" class="form-control" name="lugar_nacimiento"
                            value="{{ $datos_personal ? $datos_personal->lugar_nacimiento : '' }}" required />
                        @if ($errors->has('lugar_nacimiento'))
                            <span class="text-danger">{{ $errors->first('lugar_nacimiento') }}</span>
                        @endif
                    </div>
                    <div class="col-md-4 form-group mb-3">
                        <label for="">Genero*</label>
                        <select name="genero" id="genero" class="form-select" required>
                            <option value="">- Seleccione -</option>
                            <option value="MASCULINO">MASCULINO</option>
                            <option value="FEMENINO">FEMENINO</option>
                        </select>
                        @if ($errors->has('genero'))
                            <span class="text-danger">{{ $errors->first('genero') }}</span>
                        @endif
                    </div>
                    <div class="col-md-4 form-group mb-3">
                        <label for="">Foto*</label>
                        <input type="file" class="form-control" name="foto" id="foto"
                            accept=".jpg,.jpeg,.png,.webp" required />
                        @if ($datos_personal && $datos_personal->url_foto)
                            <img src="{{ $datos_personal->url_foto }}" alt="Foto" class="foto_datos_personal">
                        @endif
                        @if ($errors->has('foto'))
                            <span class="text-danger">{{ $errors->first('foto') }}</span>
                        @endif
                    </div>
                    <div class="col-md-4 form-group mb-3">
                        <label for="">Teléfono/Celular*</label>
                        <input type="text" class="form-control" name="fono"
                            value="{{ $datos_personal ? $datos_personal->fono : '' }}" required />
                        @if ($errors->has('fono'))
                            <span class="text-danger">{{ $errors->first('fono') }}</span>
                        @endif
                    </div>
                    <div class="col-md-4 form-group mb-3">
                        <label for="">Dirección*</label>
                        <input type="text" class="form-control" name="dir"
                            value="{{ $datos_personal ? $datos_personal->dir : '' }}" required />
                        @if ($errors->has('dir'))
                            <span class="text-danger">{{ $errors->first('dir') }}</span>
                        @endif
                    </div>
                    <div class="col-md-4 form-group mb-3">
                        <label for="">Cargar Hoja de Vida(PDF)*</label>
                        <input type="file" class="form-control" name="hoja_vida" id="hoja_vida" accept=".pdf"
                            required />
                        @if ($datos_personal && $datos_personal->url_hoja_vida)
                            <a href="{{$datos_personal->url_hoja_vida}}" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-download"></i> Hoja de Vida</a>
                        @endif
                        @if ($errors->has('hoja_vida'))
                            <span class="text-danger">{{ $errors->first('hoja_vida') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 mb-3 mx-auto">
                    <button type="submit" class="btn btn-primary w-100">
                        Guardar cambios
                    </button>
                </div>
                <div class="col-md-3 mb-3 mx-auto">
                    <a href="{{ route('inicio') }}" class="btn btn-secondary w-100">
                        Volver
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('body').on('change', '#foto', function(e) {
                addImage(e);
            });

        });

        function addImage(e) {
            var file = e.target.files[0],
                imageType = /image.*/;

            if (!file.type.match(imageType))
                return;

            var reader = new FileReader();
            reader.onload = fileOnload;
            reader.readAsDataURL(file);
        }

        function fileOnload(e) {
            $('#cancelar').show();
            $('#guardar_img').show();
            var result = e.target.result;
            $('#imagen_p').attr("src", result);
        }

        function cambiar() {
            var pdrs = document.getElementById('foto').files[0].name;
            // document.getElementById('info').innerHTML = pdrs;
        }
    </script>
@endsection
