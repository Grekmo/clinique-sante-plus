<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
//use Illuminate\Support\Facades\Redirect;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        //abort_if(!auth()->user()->role === 'admin', 403);
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'nom'            => 'required|string|max:255',
            'prenom'         => 'required|string|max:255',
            'cin'            => 'required|unique:employees',
            'adresse'        => 'required',
            'mobile'         => 'required',
            'email'          => 'required|email|unique:users,email', 
            'password'       => 'required|min:6', 
            'date_naissance' => 'required|date',
        ]);

        DB::transaction(function () use ($request) {
            
            $fullName = $request->nom . ' ' . $request->prenom;

            $user = User::create([
                'name'     => $fullName, 
                'email'    => $request->email,
                'password' => Hash::make($request->password),
                'role'     => 'employee',
            ]);

            Employee::create([
                'user_id'        => $user->id,
                'nom'            => $request->nom,
                'prenom'         => $request->prenom, 
                'cin'            => $request->cin,
                'adresse'        => $request->adresse,
                'mobile'         => $request->mobile,
                'email'          => $request->email,
                'date_naissance' => $request->date_naissance,
                'telephone'      => $request->mobile,
            ]);
        });

        return redirect()->route('employees.index')->with('success', 'Employee Created Successfully');
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
        abort_if(auth()->user()->role !== 'admin', 403);
        return view('employees.edit', compact('employee'));
        //return view('employees.edit')->with('employees', $employee);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee):RedirectResponse
    {
        //abort_if(!auth()->user()->role === 'admin', 403);
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
        //abort_if(auth()->user()->role !== 'admin', 403);
        //if (auth()->user()->role !== 'admin') {
        //    abort(403, 'Unauthorized action.');}
        $employee->delete();
        return redirect()->route('employees.index')->with('success','Employee Deleted Successfully');
    }
}
