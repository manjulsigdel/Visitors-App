@extends('front.layouts.main')

@section('content')
	<a class="btn btn-primary  float-right" href="/" role="button">Visitors</a>
	
	<a class="btn btn-primary  float-right" href="/visitors/add" role="button">Add Visitor</a>
	
	<h3>Visitor Information</h3>
	<div class="row">
		<label class="col-sm-4 font-weight-bold">Name:</label>
		<span class="col-sm-8">{!! $visitor->getName() !!}</span>
	</div>
	<div class="row">
		<label class="col-sm-4 font-weight-bold">Gender:</label>
		<span class="col-sm-8">{!! $visitor->getGender() !!}</span>
	</div>
	<div class="row">
		<label class="col-sm-4 font-weight-bold">Phone No:</label>
		<span class="col-sm-8">{!! $visitor->getPhone() !!}</span>
	</div>
	<div class="row">
		<label class="col-sm-4 font-weight-bold">Email:</label>
		<span class="col-sm-8">{!! $visitor->getEmail() !!}</span>
	</div>
	<div class="row">
		<label class="col-sm-4 font-weight-bold">Address:</label>
		<span class="col-sm-8">{!! $visitor->getAddress() !!}</span>
	</div>
	<div class="row">
		<label class="col-sm-4 font-weight-bold">Nationality:</label>
		<span class="col-sm-8">{!! $visitor->getNationality() !!}</span>
	</div>
	<div class="row">
		<label class="col-sm-4 font-weight-bold">Dob:</label>
		<span class="col-sm-8">{!! $visitor->getDob() !!}</span>
	</div>
	<div class="row">
		<label class="col-sm-4 font-weight-bold">Education:</label>
		<span class="col-sm-8">{!! $visitor->getEducation() !!}</span>
	</div>
	<div class="row">
		<label class="col-sm-4 font-weight-bold">Preferred Contact Type:</label>
		<span class="col-sm-8">{!! $visitor->getContactType() !!}</span>
	</div>
	
@endsection
