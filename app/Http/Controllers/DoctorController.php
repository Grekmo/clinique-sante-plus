<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Speciality;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with('speciality')->paginate(10);
        return view('doctors.index', compact('doctors'));
    }

    public function create()
    {
        $specialities = Speciality::orderBy('name')->get();
        return view('doctors.create', compact('specialities'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nom'            => 'required|string|max:255',
            'prenom'         => 'required|string|max:255',
            'email'          => 'nullable|email|max:255',
            'cin'            => 'nullable|string|max:20',
            'mobile'         => 'nullable|string|max:20',
            'adresse'        => 'nullable|string|max:255',
            'date_naissance' => 'nullable|date',
            'speciality_id'  => 'required|exists:specialities,id',
        ]);

        Doctor::create($data);

        return redirect()->route('doctors.index')->with('success', 'Médecin ajouté avec succès.');
    }

    public function show(Doctor $doctor)
    {
        $doctor->load('speciality');
        return view('doctors.show', compact('doctor'));
    }

    public function edit(Doctor $doctor)
    {
        $specialities = Speciality::orderBy('name')->get();
        return view('doctors.edit', compact('doctor', 'specialities'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        $data = $request->validate([
            'nom'            => 'required|string|max:255',
            'prenom'         => 'required|string|max:255',
            'email'          => 'nullable|email|max:255',
            'cin'            => 'nullable|string|max:20',
            'mobile'         => 'nullable|string|max:20',
            'adresse'        => 'nullable|string|max:255',
            'date_naissance' => 'nullable|date',
            'speciality_id'  => 'required|exists:specialities,id',
        ]);

        $doctor->update($data);

        return redirect()->route('doctors.index')->with('success', 'Médecin modifié avec succès.');
    }

    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->route('doctors.index')->with('success', 'Médecin supprimé avec succès.');
    }
}
