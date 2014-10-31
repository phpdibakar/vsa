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
				{{ Form::open(array('url' => '/adminlogin', 'class' => 'form-login')) }}
					<div class="errorHandler alert alert-danger no-display">
						<i class="fa fa-remove-sign"></i> You have some form errors. Please check below.
					</div>
					@if ($errors->has())
						<div class="alert alert-danger">
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
								<a class="forgot" href="#">
									I forgot my password
								</a> </span>
						</div>
						<div class="form-actions">
							<label for="remember" class="checkbox-inline">
								{{ Form::checkbox('remember', 1, Input::old('remember'), array('class' => 'grey remember', 'id' => 'remember')) }}
								Keep me signed in
							</label>
							{{ Form::submit('Login', array('class' => 'btn btn-bricky pull-right')) }}
						</div>
					</fieldset>
				{{ Form::close() }}
			</div>
			<!-- end: LOGIN BOX -->
			<!-- start: FORGOT BOX -->
			<div class="box-forgot">
				<h3>Forget Password?</h3>
				<p>
					Enter your e-mail address below to reset your password.
				</p>
				<form class="form-forgot">
					<div class="errorHandler alert alert-danger no-display">
						<i class="fa fa-remove-sign"></i> You have some form errors. Please check below.
					</div>
					<fieldset>
						<div class="form-group">
							<span class="input-icon">
								<input type="email" class="form-control" name="email" placeholder="Email">
								<i class="fa fa-envelope"></i> </span>
						</div>
						<div class="form-actions">
							<button class="btn btn-light-grey go-back">
								<i class="fa fa-circle-arrow-left"></i> Back
							</button>
							<button type="submit" class="btn btn-bricky pull-right">
								Submit <i class="fa fa-arrow-circle-right"></i>
							</button>
						</div>
					</fieldset>
				</form>
			</div>
			<!-- end: FORGOT BOX -->
@stop