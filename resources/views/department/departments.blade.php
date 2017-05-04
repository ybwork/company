@extends('layouts.app')
@section('content')
	<div class="container">
		@foreach($errors->all() as $error)
			<div class="alert alert-danger">{{ $error }}</div>
		@endforeach
		
		@if(Session::has('message'))
	        <div class="alert alert-danger">{{ Session::get('message') }}</div>
	    @endif
		<form class="ajax-form" action="{{ route('department_store') }}" method="POST">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-group">
				<input name="name" class="form-control" placeholder="name">
			</div>
			<div class="form-group">
				<input type="number" name="number_employees" class="form-control" placeholder="number_employees">
			</div>
			<div class="form-group">
				<input type="number" name="maximum_wage" class="form-control" placeholder="maximum_wage">
			</div>
		  <button type="submit" class="btn btn-success col-md-12">Add</button>
		</form>
		<div class="employee-list">
		<table class="table">
		@if(count($departments) > 0)
		    <thead>
		      <tr>
		        <th>Name</th>
		        <th>Number employees</th>
		        <th>Maximum wage</th>
		        <th>Action</th>
		      </tr>
		    </thead>
		@endif
		    <tbody>
		    	@foreach($departments as $department)
					<tr>
					<td>{{ $department->name }}</td>
					<td>{{ $department->number_employees }}</td>
					<td>{{ $department->maximum_wage }}</td>
						<td>
						<a href="{{ route('department_edit', ['id' => $department->id]) }}" class="edit">
							<i class="fa fa-pencil"></i>
						</a>

					    <form action="{{ route('department_destroy', ['id' => $department->id]) }}" method="POST" class="delete-form">
							<input type="hidden" name="_method" value="DELETE">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<button type="submit" class="fa fa-close delete-button"></button>
						</form>
					</td>
					</tr>
                @endforeach
		    </tbody>
		  </table>
		  </div>
	</div>
@stop