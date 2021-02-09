<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('site_title') </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- Icons --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    {{-- Styles --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- Icons --}}
    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/line-icons/style.css') }}">

    
    <style type="text/css">
        
    @font-face 
    {
      font-family: bpg_nino_mtavruli_bold;
      src: url({{asset('fonts/bpg_nino_mtavruli_bold.ttf')}});
    }
  

    body,h1,h2,h3,h4,h5,h6,div,span,p,i,ul,li,a 
    {
      font-family: bpg_nino_mtavruli_bold !important;
    }


    </style>
    
</head>
<body>

    <div id="app">
        
        @include('include.header')

    
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    
                    @yield('content')
                    
                </div>    
            </div>    
        </div>
    
    
    </div>


</body>
</html>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" ></script>
