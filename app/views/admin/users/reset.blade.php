@extends('admin.layouts.login')
@section('page_title')
	Reset Password
@stop
@section('content')
<!-- start: FORGOT BOX -->
			<div class="box-login">
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
				<h3>Reset Password</h3>
				<p>
					Enter your new password below to reset your password.
				</p>
				{{ Form::open(array('url' => '/password/reset', 'class' => 'form-pw-reset')) }}
					{{ Form::hidden('token', $token) }}
					
					<div class="errorHandler alert alert-danger no-display">
						<i class="fa fa-remove-sign"></i> You have some form errors. Please check below.
					</div>
					<fieldset>
						<div class="form-group">
							<span class="input-icon">
								{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password', 'id' => 'password')) }}
								<i class="fa fa-lock"></i> </span>
						</div>
						<div class="form-group">
							<span class="input-icon">
								{{ Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Confirm Password', )) }}
								<i class="fa fa-lock"></i> </span>
						</div>
						<div class="form-actions">
							<button class="btn btn-light-grey" type="button" onclick="window.location.href='{{ URL::to('/adminlogin') }}'">
								<i class="fa fa-circle-arrow-left"></i> Back
							</button>
							{{ Form::submit('Reset Password', array('class' => 'btn btn-bricky pull-right')) }}
						</div>
					</fieldset>
				{{ Form::close() }}
			</div>
			<!-- end: FORGOT BOX -->
@stop