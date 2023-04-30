<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;
use stdClass;

class DashboardController extends Controller
{
    public function index()
    {
        // Count Gender
        $gender = new stdClass();

        $getMale = Employee::where('gender', 'm')->get();
        $getFemale = Employee::where('gender', 'f')->get();
        $gender->male = count($getMale);
        $gender->female = count($getFemale);

        // Count Department
        $departments = Department::get();


        return view('dashboard.index', [
            'title' => 'Dashboard',
            'gender' => $gender,
            'departments' => $departments
        ]);
    }
}
