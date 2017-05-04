@extends('layouts.app')
@section('content')
	<div class="container">
		@foreach($errors->all() as $error)
			<div class="alert alert-danger">{{ $error }}</div>
		@endforeach
		<form class="ajax-form" action="{{ route('employee_store') }}" method="POST">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-group">
				<input name="first_name" class="form-control" placeholder="first name">
			</div>
			<div class="form-group">
				<input name="last_name" class="form-control" placeholder="last name">
			</div>
			<div class="form-group">
				<input name="patronymic" class="form-control" placeholder="patronymic">
			</div>
			<div class="form-group">
			  <label>Gender:</label>
			  <select type="text" name="gender" class="form-control">
			    <option value="Man">Man</option>
			    <option value="Woman">Woman</option>
			  </select>
			</div>
			<div class="form-group">
				<input type="number" name="wages" class="form-control" placeholder="wages">
			</div>
			<div class="form-group">
				<select type="text" name="departments[]" class="select2 select2-multiple form-control" multiple="multiple" multiple data-placeholder="department">
					<optgroup>
						@foreach($departments as $department)
							<option value="{{ $department->id }}">{{ $department->name }}</option>
						@endforeach
					</optgroup>
				</select>
			</div>
		  <button type="submit" class="btn btn-success col-md-12">Add</button>
		</form>
		<div class="employee-list">
			<table class="table">
			@if(count($employees) > 0)
			    <thead>
			      <tr>
			        <th>Firstname</th>
			        <th>Lastname</th>
			        <th>Patronymic</th>
			        <th>Gender</th>
			        <th>Wages</th>
			        <th>Department</th>
			      	<th>Action</th>
			      </tr>
			    </thead>
			@endif
			    <tbody>
			    	@foreach($employees as $employee)
						<tr>
							<td>{{ $employee->first_name }}</td>
							<td>{{ $employee->last_name }}</td>
							<td>{{ $employee->patronymic }}</td>
							<td>{{ $employee->gender }}</td>
							<td>{{ $employee->wages }}</td>
								<td>
									{{ $employee->departments }}
								</td>
							<td>
								<a href="{{ route('employee_edit', ['id' => $employee->id]) }}" class="edit">
									<i class="fa fa-pencil"></i>
								</a>

							    <form action="{{ route('employee_destroy', ['id' => $employee->id]) }}" method="POST" class="delete-form">
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