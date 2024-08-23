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

        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body id="kt_body" class="app-blank">
        @inertia
    </body>
</html>
