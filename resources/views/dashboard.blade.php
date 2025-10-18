@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Welcome, {{ Auth::user()->name }}!</h1>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card text-white bg-success shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Doctors</h5>
                    <p class="card-text fs-3">{{ $doctorsCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-primary shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Patients</h5>
                    <p class="card-text fs-3">{{ $patientsCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Employees</h5>
                    <p class="card-text fs-3">{{ $employeesCount }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
