@extends('front.layouts.main')

@section('content')
	
	<a class="btn btn-primary  float-right" href="{{route('front.visitor-form')}}" role="button">Add Visitor</a>
	
	@if(Session::has('alert-success'))
		<p class="alert alert-success">{{Session::get('alert-success')}}</p>
	@endif
	
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
		{{--		{!! $visitors['links']['total'] !!}--}}
		@if(array_get($visitors, 'visitors.total', 0) === 0)
			<h4>No visitors yet. Be the first. Please click Add Visitor button on right top of the page.</h4>
		@endif
		@foreach(array_get($visitors, 'visitors', []) as $visitor)
			<tr>
				<td>{!! $count++ !!}</td>
				<td>{!! $visitor->getName() !!}</td>
				<td>{!! $visitor->getEmail() !!}</td>
				<td>{!! $visitor->getNationality() !!}</td>
				<td><a href="/visitors/{{$visitor->getEmail()}}">Details</a></td>
			</tr>
		@endforeach
	</table>
	<nav aria-label="Page navigation example">
		<ul class="pagination">
			<li class="page-item {!! array_get($visitors, 'links.prev_page_url') === null ? 'disabled' : '' !!}">
				<a class="page-link" href="{!! array_get($visitors, 'links.prev_page_url') !!}">Previous</a>
			</li>
			<li class="page-item {!! array_get($visitors, 'links.next_page_url') === null ? 'disabled' : '' !!}">
				<a class="page-link" href="{!! array_get($visitors, 'links.next_page_url') !!}">Next</a>
			</li>
		</ul>
	</nav>
@endsection
