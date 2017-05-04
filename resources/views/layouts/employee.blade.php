<tr>
	<td>{{ $employee->first_name }}</td>
	<td>{{ $employee->last_name }}</td>
	<td>{{ $employee->patronymic }}</td>
	<td>{{ $employee->gender }}</td>
	<td>{{ $employee->wages }}</td>
	<td></td>
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