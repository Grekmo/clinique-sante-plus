<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Employee;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Afficher la liste des patients.
     */
    public function index()
    {
        $patientsCount = Patient::count();
        $doctorsCount = Doctor::count();
        $employeesCount = Employee::count();

        return view('dashboard', compact('patientsCount', 'doctorsCount', 'employeesCount'));
    }

    /**
     * Afficher formulaire d'ajout.
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Enregistrer un nouveau patient.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'cin' => 'required|string|max:50|unique:patients',
            'adresse' => 'nullable|string|max:255',
            'date_naissance' => 'nullable|date',
            'mobile' => 'nullable|string|max:10',
        ]);

        Patient::create($request->all());

        return redirect()->route('dashboard.index')->with('success', 'Patient ajouté avec succès.');
    }

    /**
     * Supprimer un patient.
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('dashboard.index')->with('success', 'Patient supprimé.');
    }
}
