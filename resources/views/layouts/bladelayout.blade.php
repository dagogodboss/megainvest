<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<head>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>{{ app_name() }}</title>
	    <!-- CSRF Token -->
	    <meta name="csrf-token" content="{{ csrf_token() }}">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
 @stack('before-style')

	<link rel="apple-touch-icon" href="pages/ico/60.png">
	<link rel="apple-touch-icon" sizes="76x76" href="pages/ico/76.png">
	<link rel="apple-touch-icon" sizes="120x120" href="pages/ico/120.png">
	<link rel="apple-touch-icon" sizes="152x152" href="pages/ico/152.png">
	<link rel="icon" type="image/x-icon" href="favicon.ico" />
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-touch-fullscreen" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="default">
	<meta content="" name="description" />
	<meta content="" name="author" />
	<link href="{{asset('assets/plugins/pace/pace-theme-flash.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('assets/plugins/font-awesome/css/font-awesome.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('assets/plugins/jquery-scrollbar/jquery.scrollbar.css')}}" rel="stylesheet" type="text/css" media="screen" />
	<link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" media="screen" />
	<link href="{{asset('assets/plugins/switchery/css/switchery.min.css')}}" rel="stylesheet" type="text/css" media="screen" />
	<link href="{{asset('assets/plugins/nvd3/nv.d3.min.css')}}" rel="stylesheet" type="text/css" media="screen" />
	<link href="{{asset('assets/plugins/rickshaw/rickshaw.min.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('assets/plugins/simple-line-icons/simple-line-icons.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('assets/plugins/bootstrap-datepicker/css/datepicker3.css')}}" rel="stylesheet" type="text/css" media="screen">
	<link href="{{asset('assets/plugins/mapplic/css/mapplic.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('assets/css/dashboard.widgets.css')}}" rel="stylesheet" type="text/css" media="screen" />
	<link href="{{asset('pages/css/pages-icons.css')}}" rel="stylesheet" type="text/css">
	<link class="main-stylesheet" href="{{asset('pages/css/themes/light.css')}}" rel="stylesheet" type="text/css" />
	<link class="main-stylesheet" href="{{asset('pages/css/themes/mainstyle.css')}}" rel="stylesheet" type="text/css" />
	 @stack('after-style')

	</head>
<body class="fixed-header dashboard menu-pin">

	@include('partials/navigation.sidebar')
	<div class="page-container">
		@include('partials/navigation.topbar')
		<div class="page-content-wrapper ">
			<div class="content sm-gutter">
				<div data-pages="parallax">
					<div class="container-fluid p-l-25 p-r-25 sm-p-l-0 sm-p-r-0">
						<div class="inner">
							<ol class="breadcrumb sm-p-b-5">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active">Dashboard</li>
							</ol>
						</div>
					</div>
				</div>
				<div class="container-fluid p-l-25 p-r-25 p-t-0 p-b-25 sm-padding-10">
					<div class="row">
						@yield('content')
					</div>
				</div>
			</div>
				@include('partials.navigation.footer')
		</div>
	</div>
 @stack('before-scripts')

	<script src="{{asset('assets/plugins/feather-icons/feather.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets/plugins/pace/pace.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets/plugins/jquery/jquery-1.11.1.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets/plugins/modernizr.custom.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets/plugins/jquery-ui/jquery-ui.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets/plugins/tether/js/tether.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets/plugins/jquery/jquery-easy.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets/plugins/jquery-unveil/jquery.unveil.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets/plugins/jquery-ios-list/jquery.ioslist.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets/plugins/jquery-actual/jquery.actual.min.js')}}"></script>
	<script src="{{asset('assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/plugins/classie/classie.js')}}"></script>
	<script src="{{asset('assets/plugins/switchery/js/switchery.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets/plugins/nvd3/lib/d3.v3.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets/plugins/nvd3/nv.d3.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets/plugins/nvd3/src/utils.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets/plugins/nvd3/src/tooltip.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets/plugins/nvd3/src/interactiveLayer.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets/plugins/nvd3/src/models/axis.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets/plugins/nvd3/src/models/line.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets/plugins/nvd3/src/models/lineWithFocusChart.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets/plugins/rickshaw/rickshaw.min.js')}}"></script>
	<script src="{{asset('assets/plugins/mapplic/js/hammer.js')}}"></script>
	<script src="{{asset('assets/plugins/mapplic/js/jquery.mousewheel.js')}}"></script>
	<script src="{{asset('assets/plugins/mapplic/js/mapplic.js')}}"></script>
	<!-- <script src="{{asset('js/validator.min.js')}}" type="text/javascript"></script> -->
	<!-- <script src="{{asset('assets/js/dashboard.js')}}" type="text/javascript"></script> -->
	<script src="{{asset('pages/js/pages.min.js')}}"></script>
	<script src="{{asset('assets/js/scripts.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets/js/demo.js')}}" type="text/javascript"></script>
	<script type="text/javascript">
		var success_alert = function(){
			$('body').pgNotification({style:'circle',title:'Notification',message:'The operation was successful',position:'top-right',timeout:0,type:'success',thumbnail:'<img width="40" height="40" style="display: inline-block;" src="assets/img/profiles/avatar2x.jpg" data-src="assets/img/profiles/avatar.jpg" data-src-retina="assets/img/profiles/avatar2x.jpg" alt="">'}).show();
		}

		$('.change-stage').click(function(event) {
			$.get('{{ route('change') }}', function(data) {
				/*optional stuff to do after success */
			});
		});
	</script>
	@if(session('success'))
    <script type="text/javascript">
	    $('body').pgNotification({style:'circle',title:'Notification',message:'{{ session('success') }}',position:'bottom-right',timeout:0,type:'success',thumbnail:'<img width="40" height="40" style="display: inline-block;" src="assets/img/profiles/avatar2x.jpg" data-src="assets/img/profiles/avatar.jpg" data-src-retina="assets/img/profiles/avatar2x.jpg" alt="">'}).show();
    </script> 
    @endif
    @if(session('reg_success'))
    <script type="text/javascript">
	    $('.register-container').pgNotification({style:'bar',title:'Notification',message:'{{ session('reg_success') }}',position:'top',timeout:0,type:'success',thumbnail:'<img width="40" height="40" style="display: inline-block;" src="assets/img/profiles/avatar2x.jpg" data-src="assets/img/profiles/avatar.jpg" data-src-retina="assets/img/profiles/avatar2x.jpg" alt="">'}).show();
    </script> 
    @endif
    @if(session('reg_error'))
    <script type="text/javascript">
	    $('.register-container').pgNotification({style:'bar',title:'Notification',message:'{{ session('reg_error') }}',position:'top',timeout:0,type:'danger',thumbnail:'<img width="40" height="40" style="display: inline-block;" src="assets/img/profiles/avatar2x.jpg" data-src="assets/img/profiles/avatar.jpg" data-src-retina="assets/img/profiles/avatar2x.jpg" alt="">'}).show();
    </script> 
    @endif
	@if(session('login_error'))
    <script type="text/javascript">
	    $('.register-container').pgNotification({style:'bar',title:'Notification',message:'{{ session('login_error') }} <a href="{{url('resend-email/'.(session('user')))}}" class="alert-link btn btn-link">Resend Verification Email</a>',position:'top',timeout:0,type:'danger',thumbnail:'<img width="40" height="40" style="display: inline-block;" src="assets/img/profiles/avatar2x.jpg" data-src="assets/img/profiles/avatar.jpg" data-src-retina="assets/img/profiles/avatar2x.jpg" alt="">'}).show();
    </script> 
    @endif
    @if(session('error'))
    	<script type="text/javascript">
    		$('body').pgNotification({style:'circle',title:'Notification',message:'{{ session('error') }}',position:'bottom-right',timeout:0,type:'danger',thumbnail:'<img width="40" height="40" style="display: inline-block;" src="assets/img/profiles/avatar2x.jpg" data-src="assets/img/profiles/avatar.jpg" data-src-retina="assets/img/profiles/avatar2x.jpg" alt="">'}).show();
    	</script>
    @endif
	    @stack('after-scripts')
</body>
</html>