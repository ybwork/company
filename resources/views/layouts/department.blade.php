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