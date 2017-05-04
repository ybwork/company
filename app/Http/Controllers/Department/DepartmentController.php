<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        $departments = Department::orderby('id', 'desc')->get();

        return view('department.departments', [
        	'departments' => $departments
        ]);	
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'number_employees' => 'not_in:0',
            'maximum_wage' => 'not_in:0'
        ]);

        Department::create($request->all());

        return redirect()->route('department_home');
    }

    public function edit($id)
    {
        $department = Department::find($id);

        return view('department.department_edit', [
        	'department' => $department
        ]);	
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:15',
            'number_employees' => 'not_in:0',
            'maximum_wage' => 'not_in:0'
        ]);

        $department = Department::find($id);
        $department->name = $request->name;
        $department->number_employees = $request->number_employees;
        $department->maximum_wage = $request->maximum_wage;
        $department->save();

        return redirect()->route('department_home');
    }

    public function destroy($id)
    {
        $department = Department::find($id);
        $employees_department = Department::find($id)->employees()->where('department_id', $id)->get();
        
        if ($employees_department->count()) {
            return redirect()->route('department_home')->withErrors('This Department cannot be deleted because it employs people');
        }

        $department->delete();
        return redirect()->route('department_home');
    }
}
