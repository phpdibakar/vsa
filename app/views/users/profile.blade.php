@extends('admin.layouts.master')

@section('page_title')
	Update Admin Profile
@stop

@section('styles')
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap-fileupload/bootstrap-fileupload.min.css') }}" type="text/css">
@stop

@section('page_desc')
	<h1>Update Profile <small> </small></h1>
@stop
@section('content')

@yield('message')
	@if(Session::has('success'))
		<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<p> {{ Session::get('success') }}	</p>	
		</div>
	@endif
	@if(Session::has('error'))
		<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<p> {{ Session::get('error') }}	</p>	
		</div>
	@endif
<div class="row">
	<div class="col-sm-12">
		<div class="tabbable">
			<ul class="nav nav-tabs tab-padding tab-space-3 tab-blue" id="myTab4">
				<li class="active">
					<a data-toggle="tab" href="#panel_edit_account" rel="profile">
						Edit Account
					</a>
				</li>
				<li>
					<a data-toggle="tab" href="#panel_email" rel="email">
						Change Email
					</a>
				</li>
				<li>
					<a data-toggle="tab" href="#panel_password" rel="password">
						Change Password
					</a>
				</li>
			</ul>
			<div class="tab-content">
				<div id="panel_edit_account" class="tab-pane in active" rel="profile">
					
					{{ Form::model($user, array('class' => 'form-admin-profile', 'role' => 'form', 'files' => true)) }}
					{{ Form::hidden('id', $user->id) }}
						<div class="row">
							<div class="col-md-12">
								<h3>Account Info</h3>
								<hr>
								<div class="form-group">
									<label for="remember" class="checkbox-inline">
										{{ Form::hidden('visible', 0) }}
										{{ Form::checkbox('visible', 1, Input::old('visible'), array('class' => 'grey remember', 'id' => 'visible')) }}
										Allow my probile to be scheduled along with all applicable contact information
									</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group @if($errors->has('fname')) has-error @endif">
									<label class="control-label">
										First Name
									</label>
									{{ Form::text('fname', Input::old('fname'), array('class' => 'form-control', 'placeholder' => 'First Name')) }}
									@if($errors->has('fname'))
										<p class="help-block text-danger">{{ $errors->first('fname') }}</p>
									@endif
								</div>
								<div class="form-group">
									<label class="control-label">
										Last Name
									</label>
									{{ Form::text('lname', Input::old('lname'), array('class' => 'form-control', 'placeholder' => 'Last Name')) }}
								</div>
								<div class="form-group">
									<label class="control-label">
										Gender
									</label>
									{{ Form::select('gender_id', $genders, Input::old('gender_id'), array('class' => 'form-control')); }}
								</div>
								<div class="form-group">
									<label class="control-label">
										Home Phone
									</label>
									{{ Form::text('profile[home_phone]', Input::old('profile[home_phone]'), array('class' => 'form-control', 'placeholder' => 'Home Phone')) }}
								</div>
								<div class="form-group">
									<label>
										Image Upload
									</label>
									<div class="fileupload fileupload-new" data-provides="fileupload">
										<div class="fileupload-new thumbnail" style="width: 150px; height: 150px;"><img src="{{ $user->avatar->url('thumb') }}" alt="{{ $user->fname }}">
										</div>
										<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 150px; max-height: 150px; line-height: 20px;"></div>
										<div class="user-edit-image-buttons">
											<span class="btn btn-light-grey btn-file"><span class="fileupload-new"><i class="fa fa-picture"></i> Select image</span><span class="fileupload-exists"><i class="fa fa-picture"></i> Change</span>
												{{ Form::file('avatar') }}
											</span>
											<a href="#" class="btn fileupload-exists btn-light-grey" data-dismiss="fileupload">
												<i class="fa fa-times"></i> Remove
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Address
									</label>
									{{ Form:: textarea('profile[address]', Input::old('profile[address]'), array('rows' => 2, 'cols' => 10, 'class' => 'form-control', 'placeholder' => 'Address')) }}
								</div>
								<div class="form-group">
									<label class="control-label">
										Country
									</label>
									{{ Form::select('profile[country_id]', $countries, Input::old('profile[country_id]'), array('class' => 'form-control country', 'id' => 'country')) }}
								</div>
								<div class="form-group">
									<label class="control-label">
										State
									</label>
									{{ Form::select('profile[state_id]', $states, Input::old('profile[state_id]'), array('class' => 'form-control states')) }}
									<div class="col-md-1 hidden" data-loader="states">
											<img src="{{ asset('images/ajax-loader.gif') }}" alt="Loading.." />
									</div>
								</div>
								<div class="form-group">
									<label class="control-label">
										Zip
									</label>
									{{ Form::text('profile[zip]', Input::old('profile[zip]'), array('class' => 'form-control', 'placeholder' => 'Zip')) }}
									@if($errors->has('zip'))
										<p class="help-block text-danger">{{ $errors->first('zip') }}</p>
									@endif
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div>
									By clicking UPDATE, you are agreeing to the Policy, Terms & Conditions.
									<hr>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
							</div>
							<div class="col-md-4">
								<button type="submit" class="btn btn-teal btn-block">
									Update <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>
						</div>
					{{ Form::close() }}
				</div>
				<div id="panel_email" class="tab-pane" rel="email">
						{{ Form::open(array('url' => '/admin/users/email-update', 'class' => 'form-admin-profile-email', 'role' => 'form')) }}
						
						{{ Form::hidden('id', $user->id) }}
						<div class="row">
							<div class="col-md-6">
								<h3>Change Email</h3>
								<hr>
								<div class="form-group">
									<label class="control-label">
										Email Address
									</label>
									{{ Form::email('email', Input::old('email'), array('class' => 'form-control', 'placeholder' => 'Email', 'id' => 'email')) }}
								</div>
								<div class="form-group">
									<label class="control-label">
										Confirm Email Address
									</label>
									{{ Form::email('conf_email', Input::old('conf_email'), array('class' => 'form-control', 'placeholder' => 'Confirm Email')) }}
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
							</div>
							<div class="col-md-4">
								<button type="submit" class="btn btn-teal btn-block">
									Update <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>
						</div>
				{{ Form::close() }}
			</div>
			<div id="panel_password" class="tab-pane" rel="password">
						{{ Form::open(array('url' => '/admin/users/password-update', 'class' => 'form-admin-profile-password', 'role' => 'form')) }}
						
						{{ Form::hidden('id', $user->id) }}
					
						<div class="row">
							<div class="col-md-12">
								<h3>Change Password</h3>
								<hr>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Current Password
									</label>
									{{ Form::password('current_password', array('class' => 'form-control',)) }}
								</div>
								<div class="form-group">
									<label class="control-label">
										Password
									</label>
									{{ Form::password('password', array('class' => 'form-control', 'id' => 'UserPassword')) }}
								</div>
								<div class="form-group">
									<label class="control-label">
										Confirm Password
									</label>
									{{ Form::password('conf_password', array('class' => 'form-control',)) }}
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
							</div>
							<div class="col-md-4">
								<button type="submit" class="btn btn-teal btn-block">
									Update <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>
						</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
</div>
@stop

@section('scripts')
	<script src="{{ asset('plugins/bootstrap-fileupload/bootstrap-fileupload.min.js') }}"></script>
	<script src="{{ asset('plugins/jquery-validation/dist/jquery.validate.min.js') }}"></script>
	<script src="{{ asset('js/Admin/AdminProfile.js') }}" type="text/javascript"></script>
	<script>
		app.AdminProfile.highLightCurrentTab('{{ $tab }}');
	</script>
@stop