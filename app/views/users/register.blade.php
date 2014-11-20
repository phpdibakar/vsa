@extends('layouts.login')

@section('page_title')
	Register new user
@stop

@section('page_desc')
	<h1>User Registration <small>Registration for shifts </small></h1>
@stop

@section('styles')
	
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
<div class="login-container">
    <div class="container">
@if($errors->has())
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert">
				<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
			</button>
		@foreach ($errors->all() as $error)
				<p> {{ $error }}</p>
		@endforeach
		</div>
	@endif
   		<div class="row">
        <div class="col-sm-12">
            <div class="register-page">
                <!-- start: FORM WIZARD PANEL -->
                <div class="panel panel-default">
                    
                    <div class="panel-body">
                        {{ Form::model('user', ['class' => 'smart-wizard form-horizontal', 'id' => 'user-register-form', 'role' => 'form']) }}
                            <div id="wizard" class="swMain">
                                <ul>
                                    <li>
                                        <a href="#step-1">
                                            <div class="stepNumber">
                                                1
                                            </div>
                                            <span class="stepDesc"> Step 1
                                                <br />
                                                <small>Personal Information</small> </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#step-2">
                                            <div class="stepNumber">
                                                2
                                            </div>
                                            <span class="stepDesc"> Step 2
                                                <br />
                                                <small>Contact Information</small> </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#step-3">
                                            <div class="stepNumber">
                                                3
                                            </div>
                                            <span class="stepDesc"> Step 3
                                                <br />
                                                <small>Additional Information</small> </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#step-4">
                                            <div class="stepNumber">
                                                4
                                            </div>
                                            <span class="stepDesc"> Step 4
                                                <br />
                                                <small>Terms and Conditions</small> </span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="progress progress-striped active progress-sm">
                                    <div aria-valuemax="100" aria-valuemin="0" role="progressbar" class="progress-bar progress-bar-warning step-bar">
                                        <span class="sr-only"> 0% Complete (success)</span>
                                    </div>
                                </div>
                                <div id="step-1">
                                    <h2 class="StepTitle">Step 1 Personal Information</h2>
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">
                                                    First Name <span class="symbol required"></span>
                                                </label>
                                                <div class="col-sm-7">
                                                    {{ Form::text('fname', Input::old('fname'), ['class' => 'form-control', 'placeholder' => 'First Name', 'tabindex' => 1]) }}
                                                    
                                                    @if($errors->has('fname'))
                                                        <span class="help-block"><i class="fa fa-info-circle"></i> {{ $errors->first('fname') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">
                                                    Email <span class="symbol required"></span>
                                                </label>
                                                <div class="col-sm-7">
                                                    {{ Form::email('email', Input::old('email'), ['class' => 'form-control', 'placeholder' => 'Email', 'tabindex' => 3, 'id' => 'email']) }}
                                                    
                                                    @if($errors->has('email'))
                                                        <span class="help-block"><i class="fa fa-info-circle"></i> {{ $errors->first('email') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">
                                                    Confirm Email <span class="symbol required"></span>
                                                </label>
                                                <div class="col-sm-7">
                                                    {{ Form::email('email_confirmation', Input::old('conf_email'), ['class' => 'form-control', 'placeholder' => 'Email', 'tabindex' => 4]) }}
                                                    
                                                    @if($errors->has('email_confirmation'))
                                                        <span class="help-block"><i class="fa fa-info-circle"></i> {{ $errors->first('email_confirmation') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">
                                                    Date of Birth <span class="symbol required"></span>
                                                </label>
                                                <div class="col-sm-7 date-picker-hide">
                                                    <div class="input-group">
                                                        {{ Form::text('dob', Input::old('dob'), ['class' => 'form-control date-picker', 'placeholder' => 'Date of birth', 'tabindex' => 8, 'data-date-viewmode' => 'years', 'data-date-format' => 'yyyy-mm-dd']) }}
                                                        <span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
                                                        
                                                        @if($errors->has('dob'))
                                                            <span class="help-block"><i class="fa fa-info-circle"></i> {{ $errors->first('dob') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">
                                                    Last Name <span class="symbol required"></span>
                                                </label>
                                                <div class="col-sm-7">
                                                    {{ Form::text('lname', Input::old('lname'), ['class' => 'form-control', 'placeholder' => 'Last Name', 'tabindex' => 2]) }}
                                                    
                                                    @if($errors->has('lname'))
                                                        <span class="help-block"><i class="fa fa-info-circle"></i> {{ $errors->first('lname') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">
                                                    Password <span class="symbol required"></span>
                                                </label>
                                                <div class="col-sm-7">
                                                    {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'id' => 'password', 'tabindex' => 5]) }}
                                                    
                                                    @if($errors->has('password'))
                                                        <span class="help-block"><i class="fa fa-info-circle"></i> {{ $errors->first('password') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">
                                                    Confirm Password <span class="symbol required"></span>
                                                </label>
                                                <div class="col-sm-7">
                                                    {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm Password', 'tabindex' => 6]) }}
                                                    
                                                    @if($errors->has('password_confirmation'))
                                                        <span class="help-block"><i class="fa fa-info-circle"></i> {{ $errors->first('password_confirmation') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        <div class="form-group">
                                        <label class="col-sm-4 control-label">
                                            Gender <span class="symbol required"></span>
                                        </label>
                                        <div class="col-sm-7">
                                            @foreach($genders as $key => $value)
                                            <label class="radio-inline">
                                                {{ Form::radio('gender_id', $key, $key == Input::old('gender_id'), ['class' => 'grey', 'tabindex' => 8]) }}
                                                {{ $value }}
                                            </label>
                                            @endforeach
                                            @if($errors->has('gender_id'))
                                                <span class="help-block"><i class="fa fa-info-circle"></i> {{ $errors->first('gender_id') }}</span>
                                            @endif
                                        </div>
                                        </div>
                                            <div class="form-group">
                                                <div class="col-sm-4 col-sm-offset-7 btn-custom-container1">
                                                    <button class="btn btn-custom next-step btn-block" tabindex="9">
                                                        Next <i class="fa fa-arrow-circle-right"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="step-2">
                                    <h2 class="StepTitle">Step 2 Contact Information</h2>
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">
                                                    Street Address <span class="symbol required"></span>
                                                </label>
                                                <div class="col-sm-7">
                                                    {{ Form::text('profile[address]', Input::old('profile[address]'), ['class' => 'form-control', 'placeholder' => 'Street Address', 'tabindex' => 10]) }}
                                                            
                                                    @if($errors->has('address'))
                                                        <span class="help-block"><i class="fa fa-info-circle"></i> {{ $errors->first('address') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">
                                                    City <span class="symbol required"></span>
                                                </label>
                                                <div class="col-sm-7">
                                                    {{ Form::text('profile[city]', Input::old('profile[city]'), ['class' => 'form-control', 'placeholder' => 'City', 'tabindex' => 10]) }}
                                                            
                                                    @if($errors->has('city'))
                                                        <span class="help-block"><i class="fa fa-info-circle"></i> {{ $errors->first('city') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">
                                                    Postal / Zip Code <span class="symbol required"></span>
                                                </label>
                                                <div class="col-sm-7">
                                                    {{ Form::text('profile[zip]', Input::old('profile[zip]'), ['class' => 'form-control', 'placeholder' => 'Postal / Zip Code', 'tabindex' => 10]) }}
                                                            
                                                    @if($errors->has('zip'))
                                                        <span class="help-block"><i class="fa fa-info-circle"></i> {{ $errors->first('zip') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">
                                                    Home Phone <span class="symbol required"></span>
                                                </label>
                                                <div class="col-sm-7">
                                                    {{ Form::text('profile[home_phone]', Input::old('profile[home_phone]'), ['class' => 'form-control phone', 'placeholder' => 'Home Phone', 'tabindex' => 10, 'data-default-radio-id' => 'default-home',]) }}
                                                            
                                                    @if($errors->has('home_phone'))
                                                        <span class="help-block"><i class="fa fa-info-circle"></i> {{ $errors->first('home_phone') }}</span>
                                                    @endif
                                                </div>
                                                <div class="col-sm-1">
                                                    <label class="radio-inline">
                                                        <input type="radio" class="green preferred" value="" checked="checked" name="preferred_cno" id="default-home" data-default-cno-type="Home" >
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">
                                                    Work / Other
                                                </label>
                                                <div class="col-sm-7">
                                                    {{ Form::text('profile[work_phone]', Input::old('profile[work_phone]'), ['class' => 'form-control phone', 'placeholder' => 'Work / Other', 'tabindex' => 10, 'data-default-radio-id' => 'default-work-other',]) }}
                                    
                                                    @if($errors->has('work_phone'))
                                                        <span class="help-block"><i class="fa fa-info-circle"></i> {{ $errors->first('work_phone') }}</span>
                                                    @endif
                                                    
                                                    <span class=""><i class="fa fa-info-circle"></i> * Preferred method of contact (1 selection only) </span>
                                                </div>
                                                <div class="col-sm-1">
                                                    <label class="radio-inline">
                                                       <input type="radio" class="green preferred" value="" name="preferred_cno" id="default-work-other" disabled="disabled" data-default-cno-type="Work / Other">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">
                                                    Country <span class="symbol required"></span>
                                                </label>
                                                <div class="col-sm-7">
                                                    {{ Form::select('profile[country_id]', $countries, Input::old('profile[country_id]'), array('class' => 'form-control country', 'id' => 'country')); }}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">
                                                    State <span class="symbol required"></span>
                                                </label>
                                                <div class="col-sm-7">
                                                    {{ Form::select('profile[state_id]', $states, Input::old('profile[state_id]'), array('class' => 'form-control states')); }}
                                                    <div class="col-md-1 hidden" data-loader="states">
                                                            <img src="{{ asset('images/ajax-loader.gif') }}" alt="Loading.." />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">
                                                    &nbsp;
                                                </label>
                                                <div class="col-sm-7">
                                                    &nbsp;
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">
                                                    Mobile
                                                </label>
                                                <div class="col-sm-7">
                                                    {{ Form::text('profile[mobile]', Input::old('profile[mobile]'), ['class' => 'form-control phone', 'placeholder' => 'Mobile', 'tabindex' => 10, 'data-default-radio-id' => 'default-mobile',]) }}
                                                            
                                                    @if($errors->has('mobile'))
                                                        <span class="help-block"><i class="fa fa-info-circle"></i> {{ $errors->first('mobile') }}</span>
                                                    @endif
                                                </div>
                                                <div class="col-sm-1">
                                                    <label class="radio-inline">
                                                        <input type="radio" class="green preferred" value="" name="preferred_cno" id="default-mobile" data-default-cno-type="Mobile" disabled="disabled">
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">
                                                    Pager
                                                </label>
                                                <div class="col-sm-7">
                                                    {{ Form::text('profile[pager]', Input::old('profile[pager]'), ['class' => 'form-control phone', 'placeholder' => 'Pager', 'tabindex' => 10, 'data-default-radio-id' => 'default-pager',]) }}
                                                            
                                                    @if($errors->has('pager'))
                                                        <span class="help-block"><i class="fa fa-info-circle"></i> {{ $errors->first('pager') }}</span>
                                                    @endif
                                                </div>
                                                <div class="col-sm-1">
                                                    <label class="radio-inline">
                                                        <input type="radio" class="green preferred" id="default-pager" value="" name="preferred_cno" disabled="disabled" data-default-cno-type="Pager">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                                <div class="col-sm-2 col-sm-offset-3 btn-custom-container1">
                                                    <button class="btn btn-custom back-step btn-block">
                                                        <i class="fa fa-arrow-circle-left"></i> Back
                                                    </button>
                                                </div>
                                                <div class="col-sm-2 col-sm-offset-3 btn-custom-container1">
                                                    <button class="btn btn-custom next-step btn-block">
                                                        Next <i class="fa fa-arrow-circle-right"></i>
                                                    </button>
                                                </div>
						<input type="hidden" name="default_cno_type" id="default_cno_type" value="" />
                                            </div>
                                </div>
                                <div id="step-3">
                                    <h2 class="StepTitle">Step 3 Additional Information</h2>
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">
                                                    Emergency Contact Name <span class="symbol required"></span>
                                                </label>
                                                <div class="col-sm-7">
                                                    {{ Form::text('profile[emergency_contact_name]', Input::old('profile[emergency_contact_name]'), ['class' => 'form-control', 'placeholder' => 'Emergency Contact Name', 'tabindex' => 10]) }}
                                                            
                                                    @if($errors->has('emergency_contact_name'))
                                                        <span class="help-block"><i class="fa fa-info-circle"></i> {{ $errors->first('emergency_contact_name') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">
                                                    Relationship to Emergency Contact <span class="symbol required"></span>
                                                </label>
                                                <div class="col-sm-7">
                                                    {{ Form::select('profile[emergency_relation_id]', $relationships, Input::old('profile[emergency_relation_id]'), array('class' => 'form-control')); }}
                                                
                                                    @if($errors->has('emergency_relation_id'))
                                                        <span class="help-block"><i class="fa fa-info-circle"></i> {{ $errors->first('emergency_relation_id') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">
                                                    Role <span class="symbol required"></span>
                                                </label>
                                                <div class="col-sm-7">
                                                    {{ Form::select('role_id', $roles, Input::old('role_id'), array('class' => 'form-control')); }}
                                                
                                                    @if($errors->has('role_id'))
                                                        <span class="help-block"><i class="fa fa-info-circle"></i> {{ $errors->first('role_id') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">
                                                    Emergency Phone <span class="symbol required"></span>
                                                </label>
                                                <div class="col-sm-7">
                                                    {{ Form::text('profile[emergency_phone_number]', Input::old('profile[emergency_phone_number]'), ['class' => 'form-control', 'placeholder' => 'Emergency Phone', 'tabindex' => 10]) }}
                                                    
                                                    @if($errors->has('emergency_phone_number'))
                                                        <span class="help-block"><i class="fa fa-info-circle"></i> {{ $errors->first('emergency_phone_number') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">
                                                    &nbsp;
                                                </label>
                                                <div class="col-sm-7">
                                                    &nbsp;
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">
                                                    Occupation
                                                </label>
                                                <div class="col-sm-7">
                                                    {{ Form::text('profile[occupation]', Input::old('profile[occupation]'), ['class' => 'form-control', 'placeholder' => 'Occupation', 'tabindex' => 10]) }}
                                                            
                                                    @if($errors->has('occupation'))
                                                        <span class="help-block"><i class="fa fa-info-circle"></i> {{ $errors->first('occupation') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-2 col-sm-offset-3 btn-custom-container1">
                                            <button class="btn btn-custom back-step btn-block">
                                                <i class="fa fa-arrow-circle-left"></i> Back
                                            </button>
                                        </div>
                                        <div class="col-sm-2 col-sm-offset-3 btn-custom-container1">
                                            <button class="btn btn-custom next-step btn-block">
                                                Next <i class="fa fa-arrow-circle-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div id="step-4">
                                    <h2 class="StepTitle">Step 4 Terms and Conditions</h2>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">
                                            Application Terms and Conditions
                                        </label>
                                        <div class="col-sm-7">
                                            Click <a href=#">here </a>to read the terms and conditions for accessing the system.
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">
                                            Application Terms and Conditions
                                        </label>
                                        <div class="col-sm-7">
                                            Click <a href=#">here </a>to read the terms and conditions for accessing the system.
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">
                                            Other Information
                                        </label>
                                        <div class="col-sm-7">
                                            Lorem ipsum dolor sit amet. 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">
                                            &nbsp;
                                        </label>
                                        <div class="col-sm-7">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="tnc" value="1" class="grey">
                                                I agree to the terms and conditions. 
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-2 col-sm-offset-8 btn-custom-container1">
                                            <button class="btn btn-custom finish-step btn-block">
                                                Finish <i class="fa fa-arrow-circle-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
                <!-- end: FORM WIZARD PANEL -->
        	</div>
         </div>
    	</div>
    </div>
</div>
@stop

@section('scripts')
	<script src="{{ asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
	<script src="{{ asset('plugins/jquery-validation/dist/jquery.validate.min.js') }}"></script>
	<script src="{{ asset('plugins/jQuery-Smart-Wizard/js/jquery.smartWizard.js') }}"></script>
    <script src="{{ asset('js/Config/Config.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/Admin/Admin.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/Admin/AdminUsers.js') }}"></script>
	<script src="{{ asset('js/Admin/form-wizard-register.js') }}"></script>
	<script>
		//highlight current section root item on the left menu
		//app.Admin.highLightleftMenu('leftmenu-root-approvals');
		//highlight current section child item on the left menu
		//app.Admin.highLightleftMenuChild('leftmenu-child-starlets-add');
		//initializing form wizard
		FormWizard.init();
	</script>
@stop