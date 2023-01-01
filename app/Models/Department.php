<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    public $table = "department";

    protected $guarded = [
        'id'
    ];

    public function employee()
    {
        return $this->hasMany(Employee::class);
    }
}
