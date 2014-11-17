@extends('admin.layouts.master')
@section('page_title')
	Administration Dashboard
@stop
@section('page_desc')
	<h1>Dashboard <small> </small></h1>
@stop
@section('content')

@stop

@section('scripts')
	<script>
		//highlight current section root item on the left menu
		app.Admin.highLightleftMenu('leftmenu-root-dashboard');
	</script>
@stop