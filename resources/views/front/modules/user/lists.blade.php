@extends('front.layouts.main')

@section('content')
	
	<a class="btn btn-primary  float-right" href="/visitors/add" role="button">Add Visitor</a>
	
	<h3>Visitors</h3>
	
	<table class="table">
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Email</th>
			<th>Nationality</th>
			<th>Action</th>
		</tr>
		@php($count =1)
		@foreach($visitors as $visitor)
			<tr>
				<td>{!! $count++ !!}</td>
				<td>{!! $visitor->getName() !!}</td>
				<td>{!! $visitor->getEmail() !!}</td>
				<td>{!! $visitor->getNationality() !!}</td>
				<td><a href="/visitors/{{$visitor->getEmail()}}">Details</a></td>
			</tr>
		@endforeach
	</table>
@endsection