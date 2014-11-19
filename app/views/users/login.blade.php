@extends('layouts.login')
@section('page_title')
	Login
@stop
@section('content')
<div class="login-container">
	<div class="container">
			<!-- start: LOGIN BOX -->
            <div class="box-login-headding">
                <h1><span>Welcome to the </span> Volunteer Scheduling Service</h1>
                <p>The Site offers a simple way to view schedules and sign-up for events Getting Started </p>
            </div>
            <div class="main-login-box">
              <div class="box-login-link">
                	<a href="#">If you are new to our site,please register here</a>
                    <a href="#">Once Registered, or are a returning user, please sign in</a>
              </div>
              <div class="clearfix"></div>
              <div class="box-login">  
				<h3>Returning User</h3>
				<p>
					Please enter your name and password to log in. 
				</p>
				@if(Session::has('message'))
					<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							<p> {{ Session::get('message') }}	</p>	
					</div>
				@endif	
				{{ Form::open(array('url' => '/adminlogin', 'class' => 'form-login')) }}
					<div class="errorHandler alert alert-danger no-display">
						<i class="fa fa-remove-sign"></i> You have some form errors. Please check below.
					</div>
					@if ($errors->has())
						<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							@foreach ($errors->all() as $error)
								<p> {{ $error }}	</p>	
							@endforeach
						</div>
					@endif
					<fieldset>
						<div class="form-group">
							<span class="input-icon">
								{{ Form::email('email', Input::old('email'), array('class' => 'form-control', 'placeholder' => 'Username')) }}
								<i class="fa fa-user"></i> </span>
						</div>
						<div class="form-group form-actions">
							<span class="input-icon">
								{{ Form::password('password', array('class' => 'form-control password', 'placeholder' => 'Password')) }}
								<i class="fa fa-lock"></i>
                            </span>
						</div>
						<div class="form-actions">
							<label for="remember" class="checkbox-inline">
								{{ Form::hidden('remember', 0) }}
								{{ Form::checkbox('remember', 1, Input::old('remember'), array('class' => 'grey remember', 'id' => 'remember')) }}
								Keep me signed in
							</label>
                            <label for="remember" class="checkbox-inline pull-right">
                            	<a class="forgot" href="javascript:;">
									I forgot my password?
								</a> 
                            </label>
							
						</div>
                        <div class="clearfix"></div>
                        <div class="form-actions btn-custom-container">
                        	{{ Form::submit('Sign In', array('class' => 'btn btn-custom pull-right')) }}
                            <span class="glyphicon glyphicon-circle-arrow-right  btn-custom-icon"></span>
                        </div>
					</fieldset>
					{{ Form::close() }}
                    <div class="login-contact">
                    	<p>If you have trouble accessing your account or</p>
                        <p>registering,please contact <a href="mailto:volunteer@Scheduling.com">volunteer@Scheduling.com</a></p>
                    </div>
				</div>
            
			<!-- end: LOGIN BOX -->
			<!-- start: FORGOT BOX -->
			<div class="box-forgot">
				@if(Session::has('pwResetError'))
					<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							<p> {{ Session::get('pwResetError') }}	</p>	
					</div>
				@endif
				@if(Session::has('pwReseStatus'))
					<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							<p> {{ Session::get('pwReseStatus') }}	</p>	
					</div>					
				@endif
				<h3>Forget Password?</h3>
				<p>
					Enter your e-mail address below to reset your password.
				</p>
				{{ Form::open(array('url' => '/password/remind', 'class' => 'form-forgot')) }}
					<div class="errorHandler alert alert-danger no-display">
						<i class="fa fa-remove-sign"></i> You have some form errors. Please check below.
					</div>
					<fieldset>
						<div class="form-group">
							<span class="input-icon">
								{{ Form::email('email', Input::old('email'), array('class' => 'form-control', 'placeholder' => 'Email')) }}
								<i class="fa fa-envelope"></i> </span>
						</div>
						<div class="form-actions">
							
						</div>
                        <div class="form-actions btn-custom-container">
                        	<button class="btn btn-custom-back pull-left go-back" type="button">
								<span class="glyphicon glyphicon-circle-arrow-left"></span> Back
							</button>
							{{ Form::submit('Reset Password', array('class' => 'btn btn-custom pull-right')) }}
                            <span class="glyphicon glyphicon-circle-arrow-right  btn-custom-icon"></span>
						</div>
					</fieldset>
				{{ Form::close() }}
			</div>
			<!-- end: FORGOT BOX -->
        </div>
	</div>
</div>
@stop

@section('scripts')
	@if(Session::has('pwResetError') || Session::has('pwReseStatus'))
		<script>
			$(document).on('ready', function(){
				$('.forgot').click();
			});
		</script>
	@endif
@stop