<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        {{-- CSS --}}
		<link href="{{ asset('assets/template/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/template/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />

    </head>
    <body id="kt_body" class="app-blank">
        @inject('mConfiguracion', 'App\Models\Configuracion')
        @php
            $configuracion = $mConfiguracion->first();
        @endphp
        <!--begin::Root-->
        <div class="d-flex flex-column flex-root" id="kt_app_root">
            @include("includes.portal.header")
            @yield("content")
            {{-- @include("includes.portal.footer") --}}
        </div>
        <!--end::Root-->
        <!--begin::Scrolltop-->
        <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
            <i class="ki-duotone ki-arrow-up">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
        </div>
        <!--end::Scrolltop-->


        <!-- Scripts -->
        <script src="{{asset('assets/template/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{asset('assets/template/js/scripts.bundle.js')}}"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Vendors Javascript(used for this page only)-->
		<script src="{{asset('assets/template/plugins/custom/fslightbox/fslightbox.bundle.js')}}"></script>
		<script src="{{asset('assets/template/plugins/custom/typedjs/typedjs.bundle.js')}}"></script>
		<!--end::Vendors Javascript-->
		<!--begin::Custom Javascript(used for this page only)-->
		<script src="{{asset('assets/template/js/custom/landing.js')}}"></script>
        @yield("scripts")
    </body>
</html>
