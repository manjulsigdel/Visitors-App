@extends('front.layouts.main')

@section('content')
	<h3>Visitors</h3>
	<table class="table">
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Gender</th>
			<th>Phone</th>
			<th>Email</th>
			<th>Address</th>
			<th>Nationality</th>
			<th>DOB</th>
			<th>Education</th>
			<th>Preferred Contact Type</th>
		</tr>
		@php($count =1)
		@foreach($visitors as $visitor)
			<tr>
				<td>{!! $count++ !!}</td>
				<td>{!! $visitor->getName() !!}</td>
				<td>{!! $visitor->getGender() !!}</td>
				<td>{!! $visitor->getPhone() !!}</td>
				<td>{!! $visitor->getEmail() !!}</td>
				<td>{!! $visitor->getAddress() !!}</td>
				<td>{!! $visitor->getNationality() !!}</td>
				<td>{!! $visitor->getDob() !!}</td>
				<td>{!! $visitor->getEducation() !!}</td>
				<td>{!! $visitor->getContactType() !!}</td>
			</tr>
		@endforeach
	</table>
@endsection
