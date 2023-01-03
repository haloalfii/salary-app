<?php

namespace App\Http\Controllers;

use App\Models\Deduction;
use Illuminate\Http\Request;

class DeductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('deduction.index', [
            'title' => 'Deduction',
            'deduction' => Deduction::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('deduction.create', [
            'title' => 'Add Deduction'
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
            'deductions_code' => 'required|unique:deductions',
            'presence_deductions' => 'required'
        ]);

        $notification = array(
            'message' => 'Deduction Data created successfully!',
            'alert-type' => 'success'
        );

        Deduction::create($validateData);
        return redirect('/deduction')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Deduction  $deduction
     * @return \Illuminate\Http\Response
     */
    public function show(Deduction $deduction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Deduction  $deduction
     * @return \Illuminate\Http\Response
     */
    public function edit(Deduction $deduction)
    {
        return view('deduction.edit', [
            'title' => 'Edit Deduction',
            'deduction' => $deduction
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Deduction  $deduction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deduction $deduction)
    {
        $validateData = $request->validate([
            'deductions_code' => 'required',
            'presence_deductions' => 'required'
        ]);

        Deduction::where('id', $deduction->id)
            ->update($validateData);

        $notification = array(
            'message' => 'Deduction data has been edited!',
            'alert-type' => 'success'
        );

        return redirect('/deduction')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Deduction  $deduction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deduction $deduction)
    {
        Deduction::destroy($deduction->id);

        $notification = array(
            'message' => 'Deduction Data has been deleted!',
            'alert-type' => 'error'
        );
        return redirect('/deduction')->with($notification);
    }
}
