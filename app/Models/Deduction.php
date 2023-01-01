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

    public function employee_deduction()
    {
        return $this->hasMany(EmployeeDeduction::class);
    }
}
