@extends('emails.layouts.master')
@section('content')
<tr>
    <td align="left" valign="middle">
		<a href="{{ URL::to('/') }}">
			<img src="{{ Url::to('/'). Image::path(Settings::getLogoPath(). Settings::getLogoImage(), 'resizeCrop', 24, 24) }}" alt="{{ Settings::getName() }}" />
		</a>
	</td>
  </tr>
  <tr>
    <td>Dear {{ $fname }} {{ $lname }},</td>
  </tr>
  <tr>
    <td>Your submission to register {{ Settings::getName() }} has been sent to administration for approval. Upon approval you will receive a a confirmation.</td>
  </tr>
  <tr>
    <td valign="top">If you have any further questions, please contact your administrator by clicking <a href="mailto:{{ Settings::getAdminEmail() }}">here</a>.</td>
  </tr>
  <tr>
    <td>Sincerely,</td>
  </tr>
  <tr>
    <td>{{ Settings::getName() }} System</td>
  </tr>
@stop