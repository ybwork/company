<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Department;
use DB;

class HomeController extends Controller
{
    public function index()
    {

        $sql = "SELECT e.id, e.first_name, e.last_name, e.patronymic, e.gender, e.wages, GROUP_CONCAT(d.id SEPARATOR ',') AS departments FROM employees e LEFT JOIN employees_departments ed ON e.id = ed.employee_id JOIN departments d ON ed.department_id = d.id GROUP BY 1";
        
        $query = DB::select(DB::raw($sql));

        $departments = Department::orderby('id', 'desc')->get();
        $employees = [];

        foreach ($query as $key => $employee) {
            $departments_id = explode(',', $employee->departments);
            $employees[$key] = [];
            $employees[$key]['id'] = $employee->id;
            $employees[$key]['first_name'] = $employee->first_name;
            $employees[$key]['last_name'] = $employee->last_name;
            $employees[$key]['departments'] = $departments_id;
        }

        return view('home', [
    		'departments' => $departments,
            'employees' => $employees,
    	]);
    }
}