@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Ajouter un Rendez-vous</h1>

    <div class="container my-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0"></h4>
            </div>
            <div class="card-body">
                <form action="{{ route('appointments.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label>Patient</label>
                        <select name="patient_id" class="form-control">
                            <option value="" disabled @if(!old('patient_id')) selected @endif>— Sélectionnez un patient —</option>
                            @foreach($patients as $patient)
                                <option value="{{ $patient->id }}" @selected(old('patient_id') == $patient->id)>
                                    {{ $patient->nom }} {{ $patient->prenom }} @if($patient->cin) - {{ $patient->cin }} @endif
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Médecin</label>
                        <select name="doctor_id" class="form-control">
                            <option value="" disabled @if(!old('doctor_id')) selected @endif>— Sélectionnez un médecin —</option>
                            @foreach($doctors as $doctor)
                                <option value="{{ $doctor->id }}" @selected(old('doctor_id') == $doctor->id)>
                                    {{ $doctor->nom }} {{ $doctor->prenom }} @if($doctor->cin) - {{ $doctor->cin }} @endif
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Date et Heure</label>
                        <input type="datetime-local" name="appointment_date" class="form-control" value="{{ old('appointment_date') }}">
                    </div>

                    <div class="text-center">
                        <button class="btn btn-primary w-100" type="submit">Enregistrer</button>
                    </div>
                    <a href="{{ route('appointments.index') }}" class="btn btn-outline-primary mt-4">⟵ Retour</a>
                </form>
            </div>

        </div>
    </div> 

</div>
@endsection
