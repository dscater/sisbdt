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
        }
    </style>
@endsection

@section('content')
    <h4 class="text-center text-h4">
        Bienvenid@ {{ Auth::user()->full_name }}
    </h4>
    @if (Auth::user()->tipo == 'POSTULANTE')
        <div class="row">
            <div class="col-md-3 mx-auto item_btn">
                <a href="{{ route('datos_personals.index') }}" class="contenido_item">
                    Datos Personales <i class="fa fa-arrow-right"></i>
                </a>
            </div>
            <div class="col-md-3 mx-auto item_btn">
                <a href="{{ route('evaluacions.index') }}" class="contenido_item">
                    Evaluación <i class="fa fa-arrow-right"></i>
                </a>
            </div>
            <div class="col-md-3 mx-auto item_btn">
                <a href="{{ route('datos_otros.index') }}" class="contenido_item">
                    Otros datos <i class="fa fa-arrow-right"></i>
                </a>
            </div>
        </div>
    @endif
@endsection
