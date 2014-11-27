@extends('admin.layouts.master')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/silviomoreto-bootstrap-select/dist/css/bootstrap-select.min.css') }}" />
<style type="text/css">
	.data-list{margin-bottom: 15px;}
</style>
@stop
@section('page_title')
	Role Management
@stop

@section('page_desc')
	<h1>Role Management <small>Define user access levels and  permissions</small></h1>
@stop

@section('breadcrumbs')
	{{ Breadcrumbs::render('user_roles') }}
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
		<!-- start: RESPONSIVE TABLE PANEL -->
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row">
					{{ Form::open(array('role' => 'form', 'class' => 'form-admin-user-roles',)) }}
					<div class="col-sm-4">
						<div class="form-group">
							<label for="category-name">Enter Role Name </label>
							{{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="category-name">Permission </label>
							{{ Form::select('role_permission_id', $permissions, Input::old('role_permission_id'), array('class' => 'form-control')) }}
						</div>
					</div>
					<div class="col-sm-4">
						<label for="category-name">&nbsp; </label>
						<div class="clearfix"></div>
						{{ Form::submit('Add', array('class' => 'btn btn-default')) }}
					</div>
				</div>
					{{ Form::close() }}
			</div>
		</div>
		<!-- end: RESPONSIVE TABLE PANEL -->
</div>
</div>
{{ Form::open(array('url' => Config::get('app.adminPrefix'). '/users/role-multi-update', 'role' => 'form', 'id' => 'form-admin-user-update-roles')) }}
<div class="row">
	<div class="col-sm-12">
		<!-- start: RESPONSIVE TABLE PANEL -->
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row data-list">
					<div class="col-sm-1">
							<label class="checkbox-inline">
								<input type="checkbox" value="" class="grey" id="user-role-select-all">
							</label>
					</div>
					<div class="col-sm-6">
						<a href="javascript:;" id="shift-category-delete-all">Delete Selected</a> (No undo)
					</div>
				</div>
				<div class="row">
						<div class="col-sm-1">
							&nbsp;
						</div>
						<div class="col-sm-2">
							<strong>Name</strong>
						</div>
						<div class="col-sm-2">
							<strong>Public Signup</strong>
						</div>
						<div class="col-sm-3">
							<strong>Permissions</strong>
						</div>
						<div class="col-sm-2">
							<strong>Signup Rank</strong>
						</div>
						<div class="col-sm-2">
							<strong>Display Rank</strong>
						</div>
				</div>
				
				@foreach($roles as $key => $role)
					<div class="row data-list">
						<div class="col-sm-1">
							<label class="checkbox-inline">
								<input name="id[{{ $key }}]" type="checkbox" value="{{ $role->id }}" class="grey user-role" id="{{ $role->id }}" >
							</label>
						</div>
						<div class="col-sm-2">
							<label for="{{ $role->id }}">{{{ $role->name }}}</label>
						</div>
						<div class="col-sm-2">
							<label class="radio-inline">
										<input type="radio" class="grey role-public" value="1" {{ $role->public_signup ? 'checked="chcecked"': '' }}  name="public_signup[{{ $key }}]" data-id="{{ $role->id }}" />
										Yes
							</label>
							<label class="radio-inline">
										<input type="radio" class="grey role-public" value="0" {{ !$role->public_signup ? 'checked="chcecked"': '' }}  name="public_signup[{{ $key }}]" data-id="{{ $role->id }}" />
										No
							</label>
						</div>
						<div class="col-sm-3">
							<div class="{{ !$role->public_signup ? 'hidden' : '' }}" id="role-permission-active-{{ $role->id }}">
								{{ Form::select('role_permission_id['. $key .']', $permissions, $role->role_permission_id, array('class' => 'form-control', 'data-id' => $role->id, )) }}
							</div>
							<div class="{{ $role->public_signup ? 'hidden' : '' }}" id="role-permission-inactive-{{ $role->id }}">
								<label class="label label-warning">N/A</label>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="{{ !$role->public_signup ? 'hidden' : '' }}" id="role-rank-active-{{ $role->id }}">
								<div class="form-group">
								{{  Form::number('disp_rank['. $key .']', $role->disp_rank, array('min' => 0, 'max' => 100, 'class' => 'form-control required number', 'id' => "disp_rank_".$role->id, 'data-id' => $role->id, )) }}
								</div>
							</div>
							<div class="{{ $role->public_signup ? 'hidden' : '' }}" id="role-rank-inactive-{{ $role->id }}">
								<label class="label label-warning">N/A</label>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
							{{ Form::number('disp_order['. $key .']', $role->disp_order, array('min' => 0, 'max' => 100, 'class' => 'form-control required number', 'id' =>"disp_order_".$role->id,'data-id' => $role->id,)) }}
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
		<!-- end: RESPONSIVE TABLE PANEL -->
</div>
</div>

@if($roles->getTotal() > VSA\Controllers\Admin\BaseController::$pagination_limits[0])
<div class="row">
	<div class="col-md-6">
		<form role="form">
			<div class="form-group">
				<div class="col-sm-2">
					<label for="per_page">Display</label>
				</div>
				<div class="col-sm-4">
					<select name="per_page" id="pagination-per_page" class="form-control">
						@foreach(VSA\Controllers\Admin\BaseController::$pagination_limits as $limit)
							<option value="{{ $limit }}" {{ $recordlimit == $limit ? 'selected="selected"' : '' }}>{{ ucfirst($limit) }}</option>
						@endforeach
					</select>
				</div>
			</div>
		</form>
	</div>
	<div class="col-md-6">
		<div class="pull-right">
			{{ $roles->appends(array('limit' => $recordlimit))->links() }}		
		</div>
	</div>
</div>
@endif
<div class="row">
	<div class="col-md-6">
		
	</div>
	<div class="col-md-6">
		<div class="pull-right">
			{{ Form::submit('Update', array('class' => 'btn btn-green')) }}		
		</div>
	</div>
</div>
{{ Form::close() }}

{{-- Form to multi delete the categories selected --}}
	{{ Form::open(array('url' => Config::get('app.adminPrefix'). '/users/role-multi-delete', 'id' => 'user-role-multi-delete')) }}
	{{ Form::hidden('role_ids', '', array('id' => 'role-ids')) }}
{{ Form::close() }}
@stop

@section('scripts')
	<script src="{{ asset('plugins/silviomoreto-bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
	<script src="{{ asset('plugins/jquery-validation/dist/jquery.validate.min.js') }}"></script>
	<script src="{{ asset('js/Admin/AdminUserRoles.js') }}"></script>
	<script>
		//highlight current section root item on the left menu
		app.Admin.highLightleftMenu('system');
		app.Admin.highLightleftMenuChild('user-roles');
	</script>
@stop