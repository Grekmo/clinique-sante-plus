<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        //$patients = Patient::latest()->paginate(10); 

        $patients = Patient::with(['consultations','doctors'])->orderBy('id', 'asc')->paginate(10);

        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        return view('patients.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'cin' => 'required|string|max:20|unique:patients,cin',
            'adresse' => 'nullable|string|max:255',
            'date_naissance' => 'nullable|date',
            'mobile' => 'nullable|string|max:20',
        ]);

        Patient::create($validated);

        return redirect()->route('patients.index')->with('success', 'Patient ajouté avec succès.');
    }

    // عرض صفحة تعديل مريض
    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    public function show(Patient $patient)
    {
        return view('patients.show', compact('patient'));
    }


    // تحديث معلومات مريض
    public function update(Request $request, Patient $patient)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'cin' => 'required|string|max:20|unique:patients,cin,' . $patient->id,
            'adresse' => 'nullable|string|max:255',
            'date_naissance' => 'nullable|date',
            'mobile' => 'nullable|string|max:20',
        ]);

        $patient->update($validated);

        return redirect()->route('patients.index')->with('success', 'Patient mis à jour avec succès.');
    }

    // حذف مريض
    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()->route('patients.index')->with('success', 'Patient supprimé avec succès.');
    }
}
