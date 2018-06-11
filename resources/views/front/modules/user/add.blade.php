@extends('front.layouts.main')

@section('content')
	<a class="btn btn-primary  float-right" href="{{route('front.visitor-lists')}}" role="button">Visitors</a>
	
	<h3>Visitor Form</h3>
	
	@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	{!! Form::open(['method'=>'POST','route'=>'front.visitor-save', 'class'=>'form-horizontal']) !!}
	
	<div class="form-group">
		{!! Form::label('name', 'Name',['class'=>'col-sm-2 control-label']) !!}
		<div class="col-sm-10">
			{!! Form::text('name', null, ['class'=>'form-control', 'required']) !!}
		
		</div>
	</div>
	
	<div class="form-group">
		{!! Form::label('gender', 'Gender', ['class'=>'col-sm-2 control-label']) !!}
		{!! Form::label('gender', 'Male') !!}
		{!! Form::radio('gender', 'male', 'required') !!}
		{!! Form::label('gender', 'Female') !!}
		{!! Form::radio('gender', 'female') !!}
		{!! Form::label('gender', 'Other') !!}
		{!! Form::radio('gender', 'other') !!}
	</div>
	
	<div class="form-group">
		{!! Form::label('phone', 'Contact No.', ['class'=>'col-sm-2 control-label']) !!}
		<div class="col-sm-10">
			{!! Form::text('phone', null, ['class'=>'form-control', 'required']) !!}
		
		</div>
	</div>
	
	<div class="form-group">
		{!! Form::label('email', 'Email', ['class'=>'col-sm-2 control-label']) !!}
		<div class="col-sm-10">
			{!! Form::email('email', null, ['class'=>'form-control', 'required']) !!}
		
		</div>
	</div>
	
	<div class="form-group">
		{!! Form::label('address', 'Address', ['class'=>'col-sm-2 control-label']) !!}
		<div class="col-sm-10">
			{!! Form::text('address', null, ['class'=>'form-control', 'required']) !!}
		
		</div>
	</div>
	
	<div class="form-group">
		{!! Form::label('nationality', 'Nationality', ['class'=>'col-sm-2 control-label']) !!}
		<div class="col-sm-10">
			{!! Form::text('nationality', null, ['class'=>'form-control', 'required']) !!}
		
		</div>
	</div>
	
	<div class="form-group">
		{!! Form::label('dob', 'Date Of Birth', ['class'=>'col-sm-2 control-label']) !!}
		<div class="col-sm-10">
			{!! Form::date('dob', null, ['class'=>'form-control', 'required']) !!}
		
		</div>
	</div>
	
	<div class="form-group">
		{!! Form::label('education', 'Education', ['class'=>'col-sm-2 control-label']) !!}
		<div class="col-sm-10">
			{!! Form::text('education', null, ['class'=>'form-control', 'required']) !!}
		
		</div>
	</div>
	
	<div class="form-group">
		{!! Form::label('contact_type', 'Preferred mode of contact', ['class'=>'col-sm-2 control-label']) !!}
		{!! Form::label('contact_type', "Email") !!}
		{!! Form::radio('contact_type', 'email', 'required') !!}
		{!! Form::label('contact_type', "Phone") !!}
		{!! Form::radio('contact_type', 'phone') !!}
	</div>
	
	<div class="form-group">
		{!! Form::submit('Submit') !!}
	</div>
	{!! Form::close() !!}

@endsection
