<?php

namespace App\Http\Controllers;

use App\Models\Deduction;
use App\Models\Employee;
use App\Models\EmployeeSalary;
use App\Models\Salary;
use Illuminate\Http\Request;

class EmployeeSalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employee_salary.index', [
            'title' => 'Employee Salary Data',
            'salaries' => EmployeeSalary::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee_salary.create', [
            'title' => 'Paying Employee',
            'employees' => Employee::all(),
            'salaries' => Salary::all(),
            'deductions' => Deduction::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Base Salary
        $baseSalary = Salary::where('id', $request->salary_id)->value('base_salary');
        $basePresent = Salary::where('id', $request->salary_id)->value('presence_salary');

        // Deductions
        $PresentDeduction = Deduction::where('id', $request->deduction_id)->value('presence_deductions');

        // Input Data
        $inputData = new EmployeeSalary();
        $inputData->salary_id = $request->salary_id;
        $inputData->deduction_id = $request->deduction_id;
        $inputData->emp_id = $request->emp_id;
        $inputData->period = $request->period;
        $inputData->period_effective = $request->period_effective;
        $inputData->emp_presence = $request->emp_presence;
        $inputData->emp_non_presence = $request->emp_non_presence;
        $inputData->emp_leave = $request->emp_leave;
        $inputData->total = $baseSalary + ($basePresent * $request->period_effective);
        $inputData->total_after_deduction = ($baseSalary + ($basePresent * $request->period_effective)) - ($PresentDeduction * $request->emp_non_presence);

        $inputData->save();

        $notification = array(
            'message' => 'Employee Salary has been created!',
            'alert-type' => 'success'
        );
        return redirect('/employee_salary')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeeSalary  $employeeSalary
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeSalary $employeeSalary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmployeeSalary  $employeeSalary
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeSalary $employeeSalary)
    {
        return view('employee_salary.edit', [
            'title' => 'Paying Employee',
            'employees' => Employee::all(),
            'salaries' => Salary::all(),
            'deductions' => Deduction::all(),
            'emp_salary' => $employeeSalary
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmployeeSalary  $employeeSalary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Base Salary
        $baseSalary = Salary::where('id', $request->salary_id)->value('base_salary');
        $basePresent = Salary::where('id', $request->salary_id)->value('presence_salary');

        // Deductions
        $PresentDeduction = Deduction::where('id', $request->deduction_id)->value('presence_deductions');

        // Input Data
        $inputData = EmployeeSalary::findOrFail($id);
        $inputData->salary_id = $request->salary_id;
        $inputData->deduction_id = $request->deduction_id;
        $inputData->emp_id = $request->emp_id;
        $inputData->period = $request->period;
        $inputData->emp_presence = $request->emp_presence;
        $inputData->emp_non_presence = $request->emp_non_presence;
        $inputData->total = $baseSalary + ($basePresent * $request->emp_presence);
        $inputData->total_after_deduction = ($baseSalary + ($basePresent * $request->emp_presence)) - ($PresentDeduction * $request->emp_non_presence);

        $inputData->save();

        $notification = array(
            'message' => 'Employee Salary has been edited!',
            'alert-type' => 'success'
        );
        return redirect('/employee_salary')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeeSalary  $employeeSalary
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeSalary $employeeSalary)
    {
        EmployeeSalary::destroy($employeeSalary->id);

        $notification = array(
            'message' => 'Employee Salary has been deleted!',
            'alert-type' => 'error'
        );
        return redirect('/employee_salary')->with($notification);
    }
}
