<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Employee;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $employees = Employee::all();
        return view('employees.index')->with('employees',$employees);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        abort_if(!auth()->user()->role === 'admin', 403);
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        abort_if(!auth()->user()->role === 'admin', 403);
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'cin' => 'required|unique:employees',
            'adresse' => 'required',
            'mobile' => 'required',
            'email' => 'required|email|unique:employees',
            'date_naissance' => 'required|date',
        ]);

        Employee::create($request->all());
        return redirect()->route('employees.index')->with('Success','Employee added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee):View
    {
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee):View
    {
        abort_if(!auth()->user()->role === 'admin', 403);
        return view('employees.edit')->with('employees',$employee);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee):RedirectResponse
    {
        abort_if(!auth()->user()->role === 'admin', 403);
        $request->validate([

            'nom' => 'required',
            'prenom' => 'required',
            'cin' => 'required|unique:employees,cin,'.$employee->id,
            'adresse' => 'required',
            'mobile' => 'required',
            'email' => 'required|email|unique:employees,email,'.$employee->id,
            'date_naissance' => 'required|date',
        ]);

        $employee->update($request->all());
        return redirect()->route('employees.index')->with('success','Employee Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee):RedirectResponse
    {
        abort_if(!auth()->user()->role === 'admin', 403);
        $employee->delete();
        return redirect()->route('employees.index')->with('success','Employee Deleted Successfully');
    }
}
