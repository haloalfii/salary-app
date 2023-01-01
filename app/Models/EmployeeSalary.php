<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeSalary extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function salary()
    {
        return $this->belongsTo(Salary::class);
    }

    public function salary_emp()
    {
        return $this->belongsTo(Employee::class);
    }
}
