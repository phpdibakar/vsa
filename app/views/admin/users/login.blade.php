@extends('admin.layouts.login')
@section('page_title')
	Administration Login
@stop
@section('content')
<!-- start: LOGIN BOX -->
			<div class="box-login">
				<h3>Sign in to your account</h3>
				<p>
					Please enter your name and password to log in.
				</p>
				@if(Session::has('message'))
					<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							<p> {{ Session::get('message') }}	</p>	
					</div>
				@endif	
				{{ Form::open(array('url' => '/admin/users/login', 'class' => 'form-login')) }}
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
								{{ Form::email('email', Input::old('email'), array('class' => 'form-control', 'placeholder' => 'Email')) }}
								<i class="fa fa-user"></i> </span>
						</div>
						<div class="form-group form-actions">
							<span class="input-icon">
								{{ Form::password('password', array('class' => 'form-control password', 'placeholder' => 'Password')) }}
								<i class="fa fa-lock"></i>
								<a class="forgot" href="javascript:;">
									I forgot my password
								</a> </span>
						</div>
						<div class="form-actions">
							<label for="remember" class="checkbox-inline">
								{{ Form::hidden('remember', 0) }}
								{{ Form::checkbox('remember', 1, Input::old('remember'), array('class' => 'grey remember', 'id' => 'remember')) }}
								Keep me signed in
							</label>
							{{ Form::submit('Sign In', array('class' => 'btn btn-bricky pull-right')) }}
						</div>
					</fieldset>
				{{ Form::close() }}
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
							<button class="btn btn-light-grey go-back" type="button">
								<i class="fa fa-circle-arrow-left"></i> Back
							</button>
							{{ Form::submit('Reset Password', array('class' => 'btn btn-bricky pull-right')) }}
						</div>
					</fieldset>
				{{ Form::close() }}
			</div>
			<!-- end: FORGOT BOX -->
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