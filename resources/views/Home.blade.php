@extends('layouts.app')

@section('css')
    <style>
        .item_btn {
            margin: 10px;
        }

        .contenido_item i {
            color: black;
        }

        .contenido_item {
            transition: all 0.8s;
            color: black;
            padding: 10px;
            cursor: pointer;
            background-color: rgb(248, 229, 229);
            border: solid 2px rgb(243, 211, 211);
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            font-size: 1.3em;
            flex-direction: column;
            overflow: hidden;
        }

        .contenido_item .content_text {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .cont_img {
            width: 100%;
            overflow: hidden;
        }

        .contenido_item img {
            width: 95%;
            margin: auto;
            transition: all 0.3s;
        }

        .contenido_item:hover {
            background-color: rgb(248, 213, 213);
        }

        .contenido_item:hover img {
            width: 96%;
        }
    </style>
@endsection

@section('content')
    <h4 class="text-center text-h4">
        Bienvenid@ {{ Auth::user()->full_name }}
    </h4>
    @if (Auth::user()->tipo == 'POSTULANTE')
        <div class="row">
            <div class="col-md-3 mx-auto item_btn offset-md-3">
                <a href="{{ route('datos_personals.index') }}" class="contenido_item">
                    <div class="cont_img">
                        <img src="{{ asset('imgs/checklist.png') }}" alt="">
                    </div>
                    <div class="content_text">
                        DATOS PERSONALES <i class="fa fa-arrow-right"></i>
                    </div>
                </a>
            </div>
            <div class="col-md-3 mx-auto item_btn">
                <a href="{{ route('evaluacions.index') }}" class="contenido_item">
                    <div class="cont_img">
                        <img src="{{ asset('imgs/icon_inscripcion.png') }}" alt="">
                    </div>
                    <div class="content_text">
                        REGISTRATE <i class="fa fa-arrow-right"></i>
                    </div>
                </a>
            </div>
        </div>
    @endif
@endsection
