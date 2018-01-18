<!DOCTYPE html>
<html lang="en">
<head>
  <title>{{ config('app.name') }}</title>

  <meta charset="utf-8">
  <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="description" content="">
  
  <!-- Google Fonts -->
  <link href='https://fonts.googleapis.com/css?family=Poppins:300,400,600%7COpen+Sans:400,400i,700%7CNoto+Serif:400i' rel='stylesheet'>

  <!-- Css -->
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
  <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}" />
  <link rel="stylesheet" href="{{asset('revolution/css/settings.css')}}" />
  <link rel="stylesheet" href="{{asset('css/font-icons.css')}}" />
  <link rel="stylesheet" href="{{asset('css/rev-slider.css')}}" />
  <link rel="stylesheet" href="{{asset('css/sliders.css')}}" />
  <link rel="stylesheet" href="{{asset('css/icon_2.css')}}" />
  <link rel="stylesheet" href="{{asset('css/Frontend-style.css')}}" />
  <link rel="stylesheet" href="{{asset('css/colors/mint.css')}}" />

  <!-- Favicons -->
  <link rel="shortcut icon" href="img/favicon.ico">
  <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
  <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

</head>

<body class="relative poppins">
  
    <!-- Preloader -->
    <div class="loader-mask">
      <div class="loader">
        <div></div>
        <div></div>
      </div>
    </div>
    <main class="main-wrapper">
      <header class="nav-type-7 transparent dark">

      <nav class="navbar navbar-static-top">
        <div class="navigation" id="sticky-nav">
          <div class="container-fluid semi-fluid relative">

            <div class="row flex-parent">

              <div class="navbar-header flex-child">
                <!-- Logo -->
                <div class="logo-container">
                  <div class="logo-wrap">
                    <a href="index-ny.html">
                      <!-- <img class="logo-dark" src="img/logo_dark.png" alt="logo"> -->
                      <big class="logo-black"><b>{{ config('app.name') }}</b></big>
                    </a>
                  </div>
                </div>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
              </div> <!-- end navbar-header -->

              <div class="nav-wrap flex-child">
                <div class="collapse navbar-collapse text-center" id="navbar-collapse">
                  
                  <ul class="nav navbar-nav">

                    <li>
                      <a href="#">Home</a>
                    </li> <!-- end features -->

                    <li>
                      <a href="#">About Us</a>
                      
                    </li>

                    <li >
                      <a href="{{route('register')}}">Create Account</a>
                      
                        </li>
                        <li>
                          <a href="{{ route('login')}}">Login</a>
                        </li>
                  </ul> <!-- end menu -->
                </div> <!-- end collapse -->
              </div> <!-- end col -->

              <div class="flex-child flex-right hidden-sm hidden-xs">
                <div class="nav-social-icons right">
                  <div class="social-icons dark nobase">
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-facebook"></i></a>                  
                    <a href="#"><i class="fa fa-google-plus"></i></a>
                  </div>
                </div>
              </div>
          
            </div> <!-- end row -->
          </div> <!-- end container -->
        </div> <!-- end navigation -->
      </nav> <!-- end navbar -->

    </header>
    <div class="content-wrapper oh">
      @yield('content')
    </div>
    </main>

    <!-- jQuery Scripts -->
    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins.js')}}"></script>  
    <script type="text/javascript" src="{{asset('revolution/js/jquery.themepunch.tools.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/rev-slider.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/scripts.js')}}"></script>


    <script src="{{asset('revolution/js/extensions/revolution.extension.video.min.js')}}"></script>
    <script src="{{asset('revolution/js/extensions/revolution.extension.carousel.min.js')}}"></script>
    <script src="{{asset('revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
    <script src="{{asset('revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
    <script src="{{asset('revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
    <script src="{{asset('revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
    <script src="{{asset('revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
    <script src="{{asset('revolution/js/extensions/revolution.extension.migration.min.js')}}"></script>
    <script src="{{asset('revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>

    
</body>
</html>