@extends('layouts.app')
@section('content')
<div class="container">
  <table class="table table-bordered">
      @if(count($departments) > 0 && count($employees) > 0)
        <thead>
          <tr>	
              <th></th>
            @foreach($departments as $department)
    	        <th>{{ $department->name }}</th>
            @endforeach
          </tr>
        </thead>
        <tbody>
          @foreach($employees as $employee)
            <tr>
              <td>
                {{ $employee['first_name'] }} 
                {{ $employee['last_name'] }}
              </td>
              @foreach($departments as $department)
                  @if(in_array($department->id, $employee['departments']))
                    <td>+</td>
                  @else
                    <td></td>
                  @endif
              @endforeach
            </tr>
          @endforeach
        </tbody>
      @endif
  </table>
</div>
@stop