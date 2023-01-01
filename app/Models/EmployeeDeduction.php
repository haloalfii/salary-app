<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeDeduction extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function deduction()
    {
        return $this->belongsTo(Deduction::class);
    }

    public function deduction_emp()
    {
        return $this->belongsTo(Employee::class);
    }
}
