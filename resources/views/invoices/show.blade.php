@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Détails de la Facture</h4>
                </div>
                 <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th style="width: 40%;">ID :</th>
                            <td>{{ $invoice->id }}</td>
                        </tr>
                        <tr>
                            <th>Patient :</th>
                            <td>{{ $invoice->patient?->nom }} {{ $invoice->patient?->prenom }}</td>
                        </tr>
                        <tr>
                            <th>Médecin :</th>
                            <td>{{ $invoice->doctor?->nom }} {{ $invoice->doctor?->prenom }}</td>
                        </tr>
                        <tr>
                            <th>Date :</th>
                            <td>
                                {{ optional($invoice->issued_at)->format('Y-m-d H:i') }}
                            </td>
                        </tr>
                        <tr>
                            <th>Statut :</th>
                            <td>{{ $invoice->status }}</td>
                        </tr>
                        <tr>
                            <th>Notes :</th>
                            <td>{{ $invoice->notes }}</td>
                        </tr>
                    </table>

                    <div class="mt-4">
                        <a href="{{ route('invoices.index') }}" class="btn btn-outline-secondary">
                            ⬅ Retour à la liste
                        </a>
                        <a href="{{ route('invoices.edit', $invoice->id) }}" class="btn btn-primary ms-2">
                            ✏ Modifier
                        </a>
                        <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST" class="d-inline-block ms-2"
                              onsubmit="return confirm('Voulez-vous vraiment supprimer ce rendez-vous ?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">🗑 Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
