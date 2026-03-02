<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon/favicon-96x96.png') }}" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('img/favicon/favicon.svg') }}" />
    <link rel="shortcut icon" href="{{ asset('img/favicon/favicon.ico') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicon/apple-touch-icon.png') }}" />
    <link rel="manifest" href="{{ asset('img/favicon/site.webmanifest') }}" />
    <title>SETECOM AIR S.A.</title>
    <link rel="stylesheet" href="{{ mix('css/plantilla.css') }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body>
    @include('layouts.loader')

    @include('layouts.menu')

    <main>
        @yield('content')
    </main>

    @include('layouts.footer')


    <script src="{{ mix('js/plantilla.js') }}"></script>
    <script type="text/javascript">
        base_url = "{{ url('/') }}/";
    </script>
    <script src="{{ mix('js/core.js') }}"></script>
    <script>
        new WOW().init();
    </script>
    {{-- <script type="text/javascript">
      function googleTranslateElementInit() {
          new google.translate.TranslateElement({pageLanguage: 'es'}, 'google_translate_element');
      }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> --}}
</body>

</html>
