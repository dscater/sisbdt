@extends('layouts.app')
@section('css')
    <style>
        .foto_user {
            display: block;
            width: 120px;
            margin: auto;
        }
    </style>
@endsection
@section('content')
    <h3 class="text-center text-h4">PERFIL</h3>
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('perfil_foto') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="">Foto*</label>
                        <input type="file" class="form-control" name="foto" id="foto"
                            accept=".jpg,.jpeg,.png,.webp" onchange="cambiar()" required />
                        @if ($user && $user->url_foto)
                            <img src="{{ $user->url_foto }}" id="imagen_p" alt="Foto" class="foto_user">
                        @endif
                        @if ($errors->has('foto'))
                            <span class="text-danger">{{ $errors->first('foto') }}</span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3 mx-auto">
                        <button type="submit" class="btn btn-primary w-100">
                            Guardar cambios
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <form action="{{ route('perfil_password') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-12 mb-3">
                            <label for="">Contraseña antigua*</label>
                            <input type="password" class="form-control" name="oldPassword" id="oldPassword" required />
                            @if ($errors->has('oldPassword'))
                                <span class="text-danger">{{ $errors->first('oldPassword') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-12 mb-3">
                            <label for="">Nueva Contraseña*</label>
                            <input type="password" class="form-control" min="6" name="password" id="password" required />
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-12 mb-3">
                            <label for="">Repite la contraseña*</label>
                            <input type="password" class="form-control" min="6" name="password_confirmation"
                                id="password_confirmation" required />
                            @if ($errors->has('password_confirmation'))
                                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3 mx-auto">
                        <button type="submit" class="btn btn-primary w-100">
                            Guardar cambios
                        </button>
                    </div>
                </div>
            </form>
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
