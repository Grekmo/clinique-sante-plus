@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Créer une Facture</h1>

    <div class="container my-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0"></h4>
            </div>
            <div class="card-body">
                <form action="{{ route('invoices.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label>Rendez-vous</label>
                        <select name="appointment_id" class="form-control">
                            <option value="" disabled @if(!old('appointment_id')) selected @endif>— Sélectionnez un rendez-vous —</option>
                            @foreach($appointments as $appointment)
                                <option value="{{ $appointment->id }}" @selected(old('appointment_id') == $appointment->id)>
                                    RDV #{{ $appointment->id }} - {{ $appointment->patient->nom }} {{ $appointment->patient->prenom }} ({{ \Carbon\Carbon::parse($appointment->date_time)->format('Y-m-d H:i') }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Montant</label>
                        <input type="number" step="0.01" name="amount" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Statut</label>
                        <select name="status" class="form-control">
                            <option value="unpaid" @selected(old('status','unpaid')=='unpaid')>Non payé</option>
                            <option value="paid" @selected(old('status')=='paid')>Payé</option>
                        </select>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-primary w-100" type="submit">Enregistrer</button>
                    </div>
                    <a href="{{ route('invoices.index') }}" class="btn btn-outline-primary mt-4">⟵ Retour</a>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
