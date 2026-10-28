<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Speciality;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with(['speciality', 'user'])->paginate(10);
        return view('doctors.index', compact('doctors'));
    }

    public function create()
    {
        $specialities = Speciality::orderBy('name')->get();
        return view('doctors.create', compact('specialities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom'            => 'required|string|max:255',
            'prenom'         => 'required|string|max:255',
            'email'          => 'required|email|max:255|unique:users,email',
            'password'       => 'required|string|min:6',
            'cin'            => 'nullable|string|max:20',
            'mobile'         => 'nullable|string|max:20',
            'adresse'        => 'nullable|string|max:255',
            'date_naissance' => 'nullable|date',
            'speciality_id'  => 'required|exists:specialities,id',
        ]);

        DB::transaction(function () use ($request) {
            
            $fullName = $request->nom . ' ' . $request->prenom;

            $user = User::create([
                'name'     => $fullName,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
                'role'     => 'doctor',
            ]);

            Doctor::create([
                'user_id'        => $user->id,
                'nom'            => $request->nom,
                'prenom'         => $request->prenom,
                'email'          => $request->email,
                'cin'            => $request->cin,
                'mobile'         => $request->mobile,
                'adresse'        => $request->adresse,
                'date_naissance' => $request->date_naissance,
                'speciality_id'  => $request->speciality_id,
            ]);
        });

        return redirect()->route('doctors.index')->with('success', 'Médecin et son compte ajoutés avec succès.');
    }

    public function show(Doctor $doctor)
    {
        $doctor->load(['speciality', 'user']);
        $appointments = $doctor->appointments()->with('patient')->get();
        $specialities = Speciality::orderBy('name')->get();
        return view('doctors.show', compact('doctor','specialities','appointments'));
    }

    public function edit(Doctor $doctor)
    {
        $specialities = Speciality::orderBy('name')->get();
        return view('doctors.edit', compact('doctor', 'specialities'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        $request->validate([
            'nom'            => 'required|string|max:255',
            'prenom'         => 'required|string|max:255',
            'email'          => 'nullable|email|max:255|unique:users,email,' . $doctor->user_id,
            'cin'            => 'nullable|string|max:20',
            'mobile'         => 'nullable|string|max:20',
            'adresse'        => 'nullable|string|max:255',
            'date_naissance' => 'nullable|date',
            'speciality_id'  => 'required|exists:specialities,id',
            'password'       => 'nullable|string|min:6', 
        ]);

        DB::transaction(function () use ($request, $doctor) {
            $fullName = $request->nom . ' ' . $request->prenom;

            if ($doctor->user) {
                $userData = [
                    'name'  => $fullName,
                    'email' => $request->email,
                ];
                if ($request->filled('password')) {
                    $userData['password'] = Hash::make($request->password);
                }
                $doctor->user->update($userData);
            }

            $doctor->update([
                'nom'            => $request->nom,
                'prenom'         => $request->prenom,
                'email'          => $request->email,
                'cin'            => $request->cin,
                'mobile'         => $request->mobile,
                'adresse'        => $request->adresse,
                'date_naissance' => $request->date_naissance,
                'speciality_id'  => $request->speciality_id,
            ]);
        });

        return redirect()->route('doctors.index')->with('success', 'Médecin modifié avec succès.');
    }

    public function destroy(Doctor $doctor)
    {
        DB::transaction(function () use ($doctor) {
            if ($doctor->user) {
                $doctor->user->delete();
            }
            $doctor->delete();
        });

        return redirect()->route('doctors.index')->with('success', 'Médecin supprimé avec succès.');
    }
}