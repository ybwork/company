@extends('layouts.app')
@section('content')
	<div class="container">
		@foreach($errors->all() as $error)
			<div class="alert alert-danger">{{ $error }}</div>
		@endforeach
		<form action="{{ route('employee_update', [$employee->id]) }}" method="POST">
			<input type="hidden" name="_method" value="PUT">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-group">
				<input name="first_name" class="form-control" value="{{ $employee->first_name }}">
			</div>
			<div class="form-group">
				<input name="last_name" class="form-control" value="{{ $employee->last_name }}">
			</div>
			<div class="form-group">
				<input name="patronymic" class="form-control" value="{{ $employee->patronymic }}">
			</div>
			<div class="form-group">
			  <label>Gender:</label>
			  <select type="text" name="gender" class="form-control">
			    <option value="Man">Man</option>
			    <option value="Woman">Woman</option>
			  </select>
			</div>
			<div class="form-group">
				<input type="number" name="wages" class="form-control" value="{{ $employee->wages }}">
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
@stop