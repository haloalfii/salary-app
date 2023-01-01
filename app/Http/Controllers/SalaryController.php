<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('salary.index', [
            'title' => 'Salary',
            'salary' => Salary::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('salary.create', [
            'title' => 'Add Salary'
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
            'salary_code' => 'required|unique:salaries',
            'base_salary' => 'required',
            'presence_salary' => 'required'
        ]);

        $notification = array(
            'message' => 'Salary Data created successfully!',
            'alert-type' => 'success'
        );

        Salary::create($validateData);
        return redirect('/salary')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function show(Salary $salary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function edit(Salary $salary)
    {
        return view('salary.edit', [
            'title' => 'Edit Salary',
            'salary' => $salary
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salary $salary)
    {
        $validateData = $request->validate([
            'salary_code' => 'required',
            'base_salary' => 'required',
            'presence_salary' => 'required'
        ]);

        Salary::where('id', $salary->id)
            ->update($validateData);

        $notification = array(
            'message' => 'Salary data has been edited!',
            'alert-type' => 'success'
        );

        return redirect('/salary')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salary $salary)
    {
        Salary::destroy($salary->id);

        $notification = array(
            'message' => 'Salary Data has been deleted!',
            'alert-type' => 'error'
        );
        return redirect('/salary')->with($notification);
    }
}
