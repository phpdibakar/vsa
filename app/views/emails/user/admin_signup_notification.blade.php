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
    <td>Dear Administrator, </td>
  </tr>
  <tr>
    <td>A new user has been signed up at {{ Settings::getName() }}. The details of the user is given below: has been sent to administration for approval. Upon approval you will receive a a confirmation.</td>
  </tr>
	<tr>
		<td>
			<table width="50%" cellspacing="0" cellpadding="2" border="0">
				<thead>
					<tr>
						<th>First Name </th>
						<th>Last Name </th>
						<th>Email </th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>{{ $fname }} </td>
						<td>{{ $lname }} </td>
						<td>{{ $email }} </td>
					</tr>
				</tbody>
			</table>
		</td>
	</tr>
  <tr>
    <td>Sincerely,</td>
  </tr>
  <tr>
    <td>{{ Settings::getName() }} System</td>
  </tr>
@stop