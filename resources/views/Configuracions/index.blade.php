@extends('layouts.admin')
@section('page')
    Configuración
@endsection
@section('css')
    <style>
        #imagen_p {
            width: 80%;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="card card-flush">
            <div class="card-body">

                <form action="{{ route('configuracions.update', $configuracion->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="put">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-4 form-group mb-3">
                                <label for="">Nombre del Sistema</label>
                                <input type="text" class="form-control" name="nombre_sistema"
                                    value="{{ $configuracion ? $configuracion->nombre_sistema : '' }}" />
                                @if ($errors->has('nombre_sistema'))
                                    <span class="text-danger">{{ $errors->first('nombre_sistema') }}</span>
                                @endif
                            </div>
                            <div class="col-md-4 form-group mb-3">
                                <label for="">Alias</label>
                                <input type="text" class="form-control" name="alias"
                                    value="{{ $configuracion ? $configuracion->alias : '' }}" />
                                @if ($errors->has('alias'))
                                    <span class="text-danger">{{ $errors->first('alias') }}</span>
                                @endif
                            </div>
                            <div class="col-md-4 form-group mb-3">
                                <label for="">Logo</label>
                                <input type="file" class="form-control" name="logo" id="foto"
                                    onchange='cambiar()' />
                                <div class="logo_muestra w-100 text-center">
                                    <img src="{{ $configuracion->url_logo }}" id="imagen_p" class="mt-2" />
                                </div>
                                @if ($errors->has('logo'))
                                    <span class="text-danger">{{ $errors->first('logo') }}</span>
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
