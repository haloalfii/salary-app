<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employee.index', [
            'title' => 'Employee Data',
            'employees' => Employee::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create', [
            'title' => 'Add Employee Data',
            'department' => Department::all()
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
        $validateData = $request->validate([
            'department_id' => 'required',
            'nik' => 'required|unique:employees',
            'full_name' => 'required',
            'nick_name' => 'required',
            'gender' => 'required',
            'address' => '',
            'phone' => 'required',
        ]);

        $notification = array(
            'message' => 'Employee created successfully!',
            'alert-type' => 'success'
        );

        Employee::create($validateData);
        return redirect('/employee')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('employee.edit', [
            'title' => 'Edit Employee Data',
            'department' => Department::all(),
            'employee' => $employee
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $validateData = $request->validate([
            'department_id' => 'required',
            // 'nik' => 'required',
            'full_name' => 'required',
            'nick_name' => 'required',
            'gender' => 'required',
            'address' => '',
            'phone' => 'required',
        ]);

        Employee::where('id', $employee->id)
            ->update($validateData);

        $notification = array(
            'message' => 'Employee data has been edited!',
            'alert-type' => 'success'
        );

        return redirect('/employee')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        // dd($employee->id);
        Employee::destroy($employee->id);

        $notification = array(
            'message' => 'Employee has been deleted!',
            'alert-type' => 'error'
        );
        return redirect('/employee')->with($notification);
    }
}
