<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deduction extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function employee_salary()
    {
        return $this->hasMany(EmployeeSalary::class);
    }
}
