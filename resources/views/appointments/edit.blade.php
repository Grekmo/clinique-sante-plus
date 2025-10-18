@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Modifier le Rendez-vous</h1>   

    <div class="container my-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('appointments.update', $appointment->id) }}" method="POST">
                    @csrf @method('PUT')

                    <div class="mb-3">
                        <label>Patient</label>
                        <select name="patient_id" class="form-control">
                            @foreach($patients as $patient)
                                <option value="{{ $patient->id }}" {{ $appointment->patient_id == $patient->id ? 'selected' : '' }}>
                                    {{ $patient->nom }} {{ $patient->prenom }} @if($patient->cin) - {{ $patient->cin }} @endif
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Médecin</label>
                        <select name="doctor_id" class="form-control">
                            @foreach($doctors as $doctor)
                                <option value="{{ $doctor->id }}" {{ $appointment->doctor_id == $doctor->id ? 'selected' : '' }}>
                                    {{ $doctor->nom }} {{ $doctor->prenom }} @if($doctor->cin) - {{ $doctor->cin }} @endif
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Date et Heure</label>
                        <input type="datetime-local" name="appointment_date" class="form-control" value="{{ optional(\Carbon\Carbon::parse($appointment->date_time))->format('Y-m-d\TH:i') }}">
                    </div>

                    <div class="mb-3">
                        <label>Statut</label>
                        <select name="status" class="form-control">
                            <option value="scheduled" {{ $appointment->status == 'scheduled' ? 'selected' : '' }}>Planifié</option>
                            <option value="completed" {{ $appointment->status == 'completed' ? 'selected' : '' }}>Terminé</option>
                            <option value="cancelled" {{ $appointment->status == 'cancelled' ? 'selected' : '' }}>Annulé</option>
                        </select>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </div>
                    <a href="{{ route('appointments.index') }}" class="btn btn-outline-primary mt-4">⟵ Retour</a>
                </form> 
            </div>
        </div>
    </div>
</div>
@endsection
