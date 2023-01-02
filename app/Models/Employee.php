<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function emp_salary()
    {
        return $this->hasMany(EmployeeSalary::class);
    }
}
