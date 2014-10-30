<!DOCTYPE html>
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
	<!--<![endif]-->
	<!-- start: HEAD -->
	<head>
		@section('head')
			<title>@yield('page_title')</title>
			<!-- start: META -->
			<meta charset="utf-8" />
			<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
			<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
			<meta name="apple-mobile-web-app-capable" content="yes">
			<meta name="apple-mobile-web-app-status-bar-style" content="black">
			<meta content="@yield('meta_description')" name="description" />
			<meta content="@yield('meta_keywords')" name="keywords" />
			<!-- end: META -->
			<!-- start: MAIN CSS -->
			<link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" media="screen">
			<link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">
			<link rel="stylesheet" href="{{ asset('fonts/style.css') }}">
			<link rel="stylesheet" href="{{ asset('css/main.css') }}">
			<link rel="stylesheet" href="{{ asset('css/main-responsive.css') }}">
			<link rel="stylesheet" href="{{ asset('plugins/iCheck/skins/all.css') }}">
			<link rel="stylesheet" href="{{ asset('plugins/bootstrap-colorpalette/css/bootstrap-colorpalette.css') }}">
			<link rel="stylesheet" href="{{ asset('plugins/perfect-scrollbar/src/perfect-scrollbar.css') }}">
			<link rel="stylesheet" href="{{ asset('css/theme_light.css') }}" id="skin_color">
			<!--[if IE 7]>
			<link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome-ie7.min.css') }}">
			<![endif]-->
			<!-- end: MAIN CSS -->
		@show
	</head>
	<!-- end: HEAD -->
	<!-- start: BODY -->
	<body class="login example2">
		<div class="main-login col-sm-4 col-sm-offset-4">
			@section('logo')
				<div class="logo">CLIP<i class="clip-clip"></i>ONE</div>
			@show
			
			@yield('content')
			
			@section('footer')
			<!-- start: COPYRIGHT -->
				<div class="copyright">
					2013 &copy; clip-one by cliptheme.
				</div>
			@show
			<!-- end: COPYRIGHT -->
		</div>
		
		<!-- start: MAIN JAVASCRIPTS -->
		<!--[if lt IE 9]>
		<script src="assets/plugins/respond.min.js"></script>
		<script src="assets/plugins/excanvas.min.js"></script>
		<![endif]-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
		<script src="{{ asset('plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js') }}"></script>
		<script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('plugins/blockUI/jquery.blockUI.js') }}"></script>
		<script src="{{ asset('plugins/iCheck/jquery.icheck.min.js') }}"></script>
		<script src="{{ asset('plugins/perfect-scrollbar/src/jquery.mousewheel.js') }}"></script>
		<script src="{{ asset('plugins/perfect-scrollbar/src/perfect-scrollbar.js') }}"></script>
		<script src="{{ asset('plugins/less/less-1.5.0.min.js') }}"></script>
		<script src="{{ asset('plugins/jquery-cookie/jquery.cookie.js') }}"></script>
		<script src="{{ asset('plugins/bootstrap-colorpalette/js/bootstrap-colorpalette.js') }}"></script>
		<script src="{{ asset('js/main.js') }}"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="{{ asset('plugins/jquery-validation/dist/jquery.validate.min.js') }}"></script>
		<script src="{{ asset('js/login.js') }}"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script>
			jQuery(document).ready(function() {
				Main.init();
				Login.init();
			});
		</script>
		
		@yield('scripts')
	</body>
	<!-- end: BODY -->
</html>