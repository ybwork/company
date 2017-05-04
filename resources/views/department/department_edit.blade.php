@extends('layouts.app')
@section('content')
<div class="container">
	@foreach($errors->all() as $error)
		<div class="alert alert-danger">{{ $error }}</div>
	@endforeach
    <form action="{{ route('department_update', ['id' => $department->id]) }}" method="POST">
		<input type="hidden" name="_method" value="PUT">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-group">
				<input name="name" class="form-control" value="{{ $department->name }}">
			</div>
			<div class="form-group">
				<input type="number" name="number_employees" class="form-control" value="{{ $department->number_employees }}">
			</div>
			<div class="form-group">
				<input type="number" name="maximum_wage" class="form-control" value="{{ $department->maximum_wage }}">
			</div>
		  <button type="submit" class="btn btn-success col-md-12">Add</button>
	</form>
</div>

@stop