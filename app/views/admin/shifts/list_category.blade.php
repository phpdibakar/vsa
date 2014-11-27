@extends('admin.layouts.master')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/silviomoreto-bootstrap-select/dist/css/bootstrap-select.min.css') }}" />
<style type="text/css">
	.data-list{margin-bottom: 15px;}
</style>
@stop
@section('page_title')
	Shift Categories
@stop

@section('page_desc')
	<h1>Category Management <small>Help visualize and organize your schedules </small></h1>
@stop

@section('breadcrumbs')
	{{ Breadcrumbs::render('shift_category') }}
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
					{{ Form::open(array('role' => 'form', 'class' => 'form-admin-shiftcategory',)) }}
					<div class="col-sm-4">
						<div class="form-group">
							<label for="category-name">Enter Category Name </label>
							{{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
						</div>
					</div>
					<div class="col-sm-4">
						<label for="category-name">Select Category Color </label>
						<select name="shift_category_color_id" class="form-control selectpicker">
							@foreach($colors as $color)
								<option value="{{ $color['id'] }}" data-content="<span class='label' style='background-color:{{ $color['color_code'] }}'>{{ $color['name'] }}</span>" {{ Input::old('shift_category_color_id') == $color['id'] ? 'selected="selected"' : '' }}> {{ $color['name'] }} </option>
							@endforeach
						</select>
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
{{ Form::open(array('url' => Config::get('app.adminPrefix'). '/shifts/category-multi-update', 'role' => 'form',)) }}
<div class="row">
	<div class="col-sm-12">
		<!-- start: RESPONSIVE TABLE PANEL -->
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row data-list">
					<div class="col-sm-1">
							<label class="checkbox-inline">
								<input type="checkbox" value="" class="grey" id="shift-category-select-all">
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
						<div class="col-sm-4">
							<strong>Name</strong>
						</div>
						<div class="col-sm-4">
							<strong>Color</strong>
						</div>
				</div>
				@foreach($categories as $key => $category)
					<div class="row data-list">
						<div class="col-sm-1">
							@if(!$category->default)
								<label class="checkbox-inline">
									<input name="id[{{ $key }}]" type="checkbox" value="{{ $category->id }}" class="grey shift-categories" id="{{ $category->id }}" >
								</label>
							@else
								{{Form::hidden('id['.$key.']', $category->id) }}
							@endif
						</div>
						<div class="col-sm-4">
							<label for="{{ $category->id }}">{{{ $category->name }}}</label>
						</div>
						<div class="col-sm-4">
							<select name="shift_category_color_id[{{ $key }}]" class="form-control selectpicker" data-id={{ $category->id}} >
								@foreach($colors as $color)
									<option value="{{ $color['id'] }}" data-content="<span class='label' style='background-color:{{ $color['color_code'] }}'>{{ $color['name'] }}</span>" {{ $category->shift_category_color_id == $color['id'] ? 'selected="selected"' : '' }}> {{ $color['name'] }} </option>
								@endforeach
							</select>
						</div>
					</div>
				@endforeach
				
				
			</div>
		</div>
		<!-- end: RESPONSIVE TABLE PANEL -->
</div>
</div>

@if($categories->getTotal() > VSA\Controllers\Admin\BaseController::$pagination_limits[0])
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
			{{ $categories->appends(array('limit' => $recordlimit))->links() }}		
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
	{{ Form::open(array('url' => Config::get('app.adminPrefix'). '/shifts/category-multi-delete', 'id' => 'shift-category-multi-delete')) }}
	{{ Form::hidden('cat_ids', '', array('id' => 'shift-cat-ids')) }}
{{ Form::close() }}
@stop

@section('scripts')
	<script src="{{ asset('plugins/silviomoreto-bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
	<script src="{{ asset('plugins/jquery-validation/dist/jquery.validate.min.js') }}"></script>
	<script src="{{ asset('js/Admin/AdminShift.js') }}"></script>
	<script>
		//highlight current section root item on the left menu
		app.Admin.highLightleftMenu('system');
		app.Admin.highLightleftMenuChild('shift-categories');
	</script>
@stop