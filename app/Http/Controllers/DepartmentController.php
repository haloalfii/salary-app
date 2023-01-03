<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('department.index', [
            'title' => 'Department',
            'department' => Department::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('department.create', [
            'title' => 'Add Department'
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
            'code' => 'required|unique:department',
            'department_name' => 'required',
        ]);

        $notification = array(
            'message' => 'Department created successfully!',
            'alert-type' => 'success'
        );

        Department::create($validateData);
        return redirect('/department')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        // dd($dep)
        return view('department.edit', [
            'title' => 'Edit Department',
            'department' => $department
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        // dd($request->department_name);
        $validateData = $request->validate([
            'code' => 'required',
            'department_name' => 'required',
        ]);

        Department::where('id', $department->id)
            ->update($validateData);

        $notification = array(
            'message' => 'Department data has been edited!',
            'alert-type' => 'success'
        );

        return redirect('/department')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        Department::destroy($department->id);

        $notification = array(
            'message' => 'Department has been deleted!',
            'alert-type' => 'error'
        );
        return redirect('/department')->with($notification);
    }
}
