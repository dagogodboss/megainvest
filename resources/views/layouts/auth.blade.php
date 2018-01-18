<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ config('app.name', 'Laravel') }}</title>
	@stack('before-style')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/materialize.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/roboto.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icon.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  
    <style type="text/css">
        body{
            height:100vh;
            width: 100%;
            overflow: hidden;
            background:url('../img/cover.jpg') fixed;
            background-size: cover;
        }
        .auth-link{
            color: green !important;
            font-weight: 700;
        }
        .auth-link:hover, .auth-link:focus{
            color: green !important;
            font-weight: 700;
        }
    </style>
    @stack('after-style')
</head>
<body >
	<div class="overlay" id="particles-js"></div>
	@yield('content')
    <div class="auth-logo">{{ config('app.name', 'Laravel') }}</div>
	<!-- Scripts -->
     @stack('before-scripts')
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/materialize.min.js') }}"></script>
        <script src="{{asset('js/particles.min.js')}}"></script>
          <script>
            $('select').material_select();
            $('ul.tabs').tabs({ 'swipeable': true });
            particlesJS.load('particles-js', 'particles.json', function(){
              console.log('particles.json loaded...');
            });
        </script>
    @stack('after-scripts')
</body>
</html>