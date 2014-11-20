<!DOCTYPE html>
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
	<!--<![endif]-->
	<!-- start: HEAD -->
	<head>
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
            <link rel="stylesheet" href="{{ asset('plugins/datepicker/css/datepicker.css') }}" type="text/css">
            <link rel="stylesheet" href="{{ asset('css/style.css') }}">
			<link rel="stylesheet" href="{{ asset('css/style-responsive.css') }}">
			<!--[if IE 7]>
			<link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome-ie7.min.css') }}">
			<![endif]-->
            <!--[if gte IE 9]>
            <style type="text/css">.gradient{filter: none;}</style>
			<![endif]-->
			<!-- end: MAIN CSS -->
			@yield('styles')
	</head>
	<!-- end: HEAD -->
	<!-- start: BODY -->
	<body>
		<div class="full-width">
        <div class="fixed-container">
			<!--Header Open-->
            <header>
            @section('logo')
				<div class="logo">
				<img src="{{ Image::path(Settings::getLogoPath(). Settings::getLogoImage(), 'resizeCrop', 307, 40) }}" alt="{{ Settings::getName() }}" /></div>
			@show
            
            @section('navigation')
				<nav id="navigation" class="navbar navbar-default" role="navigation">
                  <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand" href="#">Menu</a>
                    </div>
                    <div class="collapse navbar-collapse" id="main-navigation">
                      <ul class="nav navbar-nav">
                        <li class="active"><a href="{{ URL::to('/') }}">Home</a></li>
                        <li><a href="{{ URL::route('registration')}}">Registration</a></li>
                        <li><a href="{{ URL::to('pages/contact') }}">Contact us</a></li>
                      </ul>
                    </div>
                  </div>
             	</nav>
			@show
            
			</header>
            <!--Header Close-->
            
            <!--Content Open-->
			@yield('content')
			<!--Content Close-->
            
            <!--Footer Open-->
            <footer class="footer">
			@section('footer')
			<!-- start: COPYRIGHT -->
            	<div class="container">
                    <nav class="footer-nav">
                        <ul>
                            <li><a href="{{ URL::to('/pages/feed-back') }}">Feed Back</a></li>
                            <li><a href="{{ URL::to('/pages/terms') }}">Terms of Use</a></li>
                            <li><a href="{{ URL::to('/pages/privacy') }}">Privacy</a></li>
                            <li><a href="{{ URL::to('/pages/about') }}">About Us</a></li>
                        </ul>
                    </nav>
                    <div class="copyright">
						{{ date('Y') }} &copy; {{ Settings::getName() }}.
                    </div>
                </div>
			@show
			<!-- end: COPYRIGHT -->
            </footer>
            <!--Footer Close-->
		</div>
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