@extends('admin.layouts.login')
@section('page_title')
	Administration Login
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