@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Liste des Factures</h1>

    <a href="{{ route('invoices.create') }}" class="btn btn-primary mb-3">Nouvelle Facture</a>

    <table class="table table-bordered text-center table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Patient</th>
                <th>Médecin</th>
                <th>Montant</th>
                <th>Statut</th>
                <th>Émise le</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->id }}</td>
                    <td>{{ $invoice->patient->nom }} {{ $invoice->patient->prenom }}</td>
                    <td>{{ $invoice->doctor->nom }} {{ $invoice->doctor->prenom }}</td>
                    <td>{{ $invoice->amount }} MAD</td>
                    <td>{{ $invoice->status }}</td>
                    <td>{{ optional($invoice->issued_at)->format('Y-m-d H:i') }}</td>
                    <td> 
                        <a href="{{ route('invoices.edit', $invoice->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                        <a href="{{ route('invoices.show', $invoice->id) }}" class="btn btn-sm btn-info">Voir</a>
                        <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
