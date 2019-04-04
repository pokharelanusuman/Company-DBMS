<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" async></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    @php
        $url = Route::currentRouteName();
    @endphp
    <div id="app">
        @include('components.frontend.topMenu')
        <main role="main" class="container">
                <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded shadow-sm">
                  {{-- <img class="mr-3" src="/docs/4.3/assets/brand/bootstrap-outline.svg" alt="" width="48" height="48"> --}}
                  <div class="lh-100">
                  <h6 class="mb-0 text-white lh-100">
                    {{ucfirst(Route::currentRouteName())}}
                    @if( ($url == 'register') || ($url == 'login') )
                        to Admin Panel
                    @endif
                  </h6>
                  </div>
                </div>
                
                    <div class="my-3 p-3 bg-white rounded shadow-sm">

                        {{-- <h6 class="border-bottom border-gray pb-2 mb-0">Recent updates</h6> --}}
                        @yield('content')
                    </div>
                

        </main>
    </div>
</body>
</html>
