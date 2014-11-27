@extends('admin.layouts.master')

@section('page_title')
	User Directory
@stop

@section('page_desc')
	<h1>User Directory <small>search for all active or inactive users </small></h1>
@stop

@section('breadcrumbs')
	{{ Breadcrumbs::render('users') }}
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
	<div class="col-md-12">
		<div class="alert alert-info">
				<h4>Can't find a user?</h4>
				<p>Enter first or last in the search field and select to sort. Deleted? View the <a href="#"> Historical User Directory</a> for deleted user</p>
		</div>
	</div>
</div>
@if($users->getTotal() > VSA\Controllers\Admin\BaseController::$pagination_limits[0])
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
			{{ $users->appends(array('limit' => $recordlimit))->links() }}		
		</div>
	</div>
</div>
@endif
<div class="row">
	<div class="col-sm-12">
		<!-- start: RESPONSIVE TABLE PANEL -->
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover" id="sample-table-1">
						<thead>
							<tr>
								<th class="center">Photo</th>
								<th>Full Name</th>
								<th>Status</th>
								<th>Role</th>
								<th>Access</th>
								<th>Email</th>
								<th>Registered</th>
								<th>Phone</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@if(count($users))
								@foreach($users as $user)
									<tr>
										<td class="center"><img src="{{ $user->avatar->url('medium') }}" alt="{{ $user->fname }}"></td>
										<td>{{{ $user->fname }}} {{{ $user->lname }}}</td>
										<td>
											@if(!$user->active)
												<span class="label label-sm label-danger">Inactive</span>
											@else
												<span class="label label-sm label-success">Active</span>
											@endif
										</td>
										<td>{{{ $user->role->name }}}</td>
										<td>
											@if($user->admin)
												<span class="label label-sm label-inverse">Administrator</span>
											@else
												<span class="label label-sm label-warning">User</span>
											@endif
										</td>
										<td>{{ $user->email }} </td>
										<td>{{ date('Y-M-d', strtotime($user->created_at)) }}</td>
										<td>{{ $user->profile->home_phone }}</td>
										<td>
											<div class="visible-md visible-lg hidden-sm hidden-xs">
												<a data-original-title="Edit" data-placement="top" class="btn btn-xs btn-teal tooltips" href="#"><i class="fa fa-edit"></i></a>
												<a data-original-title="Share" data-placement="top" class="btn btn-xs btn-green tooltips" href="#"><i class="fa fa-share"></i></a>
												<a data-original-title="Remove" data-placement="top" class="btn btn-xs btn-bricky tooltips" href="#"><i class="fa fa-times fa fa-white"></i></a>
											</div>
										</td>
									</tr>
								@endforeach
							@endif
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- end: RESPONSIVE TABLE PANEL -->
</div>
</div>
<div class="row">
	<div class="col-md-6">
		&nbsp;
	</div>
	<div class="col-md-6">
		<div class="pull-right">
			{{ $users->links() }}		
		</div>
	</div>
</div>
@stop

@section('scripts')
	<script src="{{ asset('js/Admin/AdminDirectory.js') }}"></script>
	<script>
		//highlight current section root item on the left menu
		app.Admin.highLightleftMenu('leftmenu-root-directory');
	</script>
@stop