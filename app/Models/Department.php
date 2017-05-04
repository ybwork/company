<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';

    protected $fillable = [
    	'name', 
    	'number_employees', 
    	'maximum_wage'
    ];

    public function employees()
    {
    	return $this->belongsToMany('App\Models\Employee', 'employees_departments');
    }
}
