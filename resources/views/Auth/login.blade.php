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
                        <form class="form w-100" novalidate="novalidate" method="post" action="{{ route('login.store') }}">
                            @csrf
                            <!--begin::Heading-->
                            <div class="text-center mb-11">
                                <!--begin::Title-->
                                <h1 class="text-gray-900 fw-bolder mb-3">
                                    Iniciar Sesión
                                </h1>
                                <!--end::Title-->
                                <!--begin::Subtitle-->
                                <div class="text-gray-500 fw-semibold fs-6">
                                    Ingresa tu correo y contraseña
                                </div>
                                <!--end::Subtitle=-->
                            </div>
                            <!--begin::Heading-->
                            <!--begin::Input group=-->
                            <div class="fv-row mb-8">
                                <!--begin::Email-->
                                <input type="text" placeholder="Correo electrónico" name="email"
                                    value="{{ old('email') }}" autocomplete="off" class="form-control bg-transparent" autofocus/>
                                <!--end::Email-->
                            </div>
                            <!--end::Input group=-->
                            <div class="fv-row mb-3">
                                <!--begin::Password-->
                                <input type="password" placeholder="Contraseña" name="password" autocomplete="off"
                                    class="form-control bg-transparent" />
                                <!--end::Password-->
                            </div>
                            <!--end::Input group=-->
                            @if ($errors->has('email'))
                                <div class="fv-row mb-3">
                                    <div class="alert alert-danger">
                                        <span class="text-red d-block">
                                            {{ $errors->first('email') }}
                                        </span>
                                    </div>
                                </div>
                            @endif
                            <!--begin::Submit button-->
                            <div class="d-grid mb-5">
                                <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                                    <!--begin::Indicator label-->
                                    <span class="indicator-label">Iniciar sesión</span>
                                    <!--end::Indicator label-->
                                </button>
                            </div>
                            <!--end::Submit button-->
                            <!--begin::Register-->
                            <div class="d-grid mb-10">
                                <a href="{{ route('register') }}" id="kt_sign_in_submit" class="btn btn-danger">
                                    <!--begin::Indicator label-->
                                    <span class="indicator-label">Registrarme</span>
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
                        <img alt="Logo" src="{{ asset('imgs/' . $configuracion->logo) }}" class="h-60px h-lg-75px" />
                    </a>
                    <!--end::Logo-->
                    <!--begin::Image-->
                    <!-- <img
                                        class="d-none d-lg-block mx-auto w-275px w-md-50 w-xl-500px mb-10 mb-lg-20"
                                        :src="url_assets +
                                            '/assets/template/media/misc/auth-screens.png'"
                                        alt=""
                                    /> -->
                    <!--end::Image-->
                    <!--begin::Title-->
                    <h1 class="d-none d-lg-block text-white fs-2qx fw-bolder text-center mb-7">
                        {{ $configuracion->nombre_sistema }}
                    </h1>
                    <!--end::Title-->
                    <!--begin::Text-->
                    <!-- <div
                                        class="d-none d-lg-block text-white fs-base text-center"
                                    >
                                        In this kind of post,
                                        <a
                                            href="#"
                                            class="opacity-75-hover text-warning fw-bold me-1"
                                            >the blogger</a
                                        >introduces a person they’ve interviewed <br />and
                                        provides some background information about
                                        <a
                                            href="#"
                                            class="opacity-75-hover text-warning fw-bold me-1"
                                            >the interviewee</a
                                        >and their <br />work following this is a transcript of
                                        the interview.
                                    </div> -->
                    <!--end::Text-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Aside-->
        </div>
        <!--end::Authentication - Sign-in-->
    </div>
@endsection
