<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';

    protected $fillable = [
    	'first_name', 
    	'last_name', 
    	'patronymic', 
    	'gender', 
    	'wages',
    ];

    public function departments() 
    {
    	return $this->belongsToMany('App\Models\Department', 'employees_departments');
    }
}
