<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Department;
use DB;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $sql = "SELECT e.id, e.first_name, e.last_name, e.patronymic, e.gender, e.wages, GROUP_CONCAT(d.name SEPARATOR ', ') AS departments FROM employees e LEFT JOIN employees_departments ed ON e.id = ed.employee_id JOIN departments d ON ed.department_id = d.id GROUP BY 1";

        $employees = DB::select(DB::raw($sql));
        
        $departments = Department::orderby('id', 'desc')->get();

        return view('employee.employees', [
            'employees' => $employees,
        	'departments' => $departments,
        ]);	
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'wages' => 'numeric',
            'departments' => 'required',
        ]);

        $employee = new Employee;
        $employee->first_name = $request->input('first_name');
        $employee->last_name = $request->input('last_name');
        $employee->patronymic = $request->input('patronymic');
        $employee->gender = $request->input('gender');
        $employee->wages = $request->input('wages');
        $employee->save();

        $departments = $request->input('departments');

        foreach ($departments as $department) {
            Department::find($department)->employees()->attach($employee);
        }

        return redirect()->route('employee_home');
    }

    public function edit($id)
    {
        $employee = Employee::find($id);
        $departments = Department::orderby('id', 'desc')->get();

        return view('employee.employee_edit', [
            'employee' => $employee,
            'departments' => $departments
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'wages' => 'numeric',
            'departments' => 'required',
        ]);

        $employee = Employee::find($id);
        $employee->first_name = $request->input('first_name');
        $employee->last_name = $request->input('last_name');
        $employee->patronymic = $request->input('patronymic');
        $employee->gender = $request->input('gender');
        $employee->wages = $request->input('wages');
        $employee->save();

        $departments = $request->input('departments');

        Employee::find($employee->id)->departments()->where('employee_id', $employee->id)->detach();

        foreach ($departments as $department) {
            Department::find($department)->employees()->attach($employee);
        }

        return redirect()->route('employee_home');
    }

    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();

        return redirect()->route('employee_home');
    }
}
