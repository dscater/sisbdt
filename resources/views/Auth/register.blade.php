@extends('layouts.login')
@section('content')
    @inject('mConfiguracion', 'App\Models\Configuracion')
    @php
        $configuracion = $mConfiguracion->first();
    @endphp
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Body-->
            <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
                <!--begin::Form-->
                <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                    <!--begin::Wrapper-->
                    <div class="col-12 col-md-8 col-lg-6 p-10">
                        <!--begin::Form-->
                        <form class="form w-100" action="{{ route('register.store') }}" method="post">
                            @csrf
                            <!--begin::Heading-->
                            <div class="text-center mb-11">
                                <!--begin::Title-->
                                <h1 class="text-gray-900 fw-bolder mb-3">
                                    Registrarme
                                </h1>
                                <!--end::Title-->
                                <!--begin::Subtitle-->
                                <div class="text-gray-500 fw-semibold fs-6">
                                    Ingresa tus datos en el formulario
                                </div>
                                <!--end::Subtitle=-->
                            </div>
                            <!--begin::Heading-->
                            <!--begin::Input group=-->
                            <div class="fv-row mb-8">
                                <!--begin::Email-->
                                <input type="text" placeholder="Nombres" name="nombres" value="{{old('nombres')}}" autocomplete="off"
                                    class="form-control bg-transparent" />
                                @if ($errors->has('nombres'))
                                    <span class="text-danger">{{ $errors->first('nombres') }}</span>
                                @endif
                                <!--end::Email-->
                            </div>
                            <!--end::Input group=-->
                            <!--begin::Input group=-->
                            <div class="fv-row mb-8">
                                <!--begin::Email-->
                                <input type="text" placeholder="Apellidos" name="apellidos" value="{{old('apellidos')}}" autocomplete="off"
                                    class="form-control bg-transparent" />
                                @if ($errors->has('apellidos'))
                                    <span class="text-danger">{{ $errors->first('apellidos') }}</span>
                                @endif
                                <!--end::Email-->
                            </div>
                            <!--end::Input group=-->
                            <!--begin::Input group=-->
                            <div class="fv-row mb-8">
                                <!--begin::Email-->
                                <input type="text" placeholder="Correo electrónico" name="email" value="{{old('email')}}" autocomplete="off"
                                    class="form-control bg-transparent" />
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                                <!--end::Email-->
                            </div>
                            <!--end::Input group=-->
                            <div class="fv-row mb-8">
                                <!--begin::Password-->
                                <input type="password" placeholder="Contraseña" name="password" value="{{old('password')}}" autocomplete="off"
                                    class="form-control bg-transparent" />
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                                <!--end::Password-->
                            </div>
                            <!--end::Input group=-->
                            <div class="fv-row mb-5">
                                <!--begin::Password-->
                                <input type="password" placeholder="Repite la Contraseña" name="password_confirmation" value="{{old('password_confirmation')}}"
                                    autocomplete="off" class="form-control bg-transparent" />
                                <!--end::Password-->
                            </div>
                            <!--end::Input group=-->
                            <!--begin::Submit button-->
                            <div class="d-grid mb-5">
                                <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                                    <!--begin::Indicator label-->
                                    <span class="indicator-label">Registrarme</span>
                                    <!--end::Indicator label-->
                                </button>
                            </div>
                            <!--end::Submit button-->
                            <!--begin::Register-->
                            <div class="d-grid mb-10">
                                <a href="{{ route('login') }}" class="btn btn-link">
                                    <!--begin::Indicator label-->
                                    <span class="indicator-label">Ya tengo una cuenta</span>
                                    <!--end::Indicator label-->
                                </a>
                            </div>
                            <!--end::Register-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Form-->
            </div>
            <!--end::Body-->
            <!--begin::Aside-->
            <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2"
                style="background-image: url({{ asset('/assets/template/media/misc/auth-bg.png') }})">
                <!--begin::Content-->
                <div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">
                    <!--begin::Logo-->
                    <a href="index.html" class="mb-0 mb-lg-12">
                        <img alt="Logo" src="{{ $configuracion->url_logo }}" class="h-60px h-lg-75px" />
                    </a>
                    <!--end::Logo-->
                    <!--begin::Title-->
                    <h1 class="d-none d-lg-block text-white fs-2qx fw-bolder text-center mb-7">
                        {{ $configuracion->nombre_sistema }}
                    </h1>
                    <!--end::Title-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Aside-->
        </div>
        <!--end::Authentication - Sign-in-->
    </div>
@endsection
