@extends('layouts.app') 
@section('content')
<div  style="background-color: #d2e0f5; min-height: 100vh; padding: 50px 0;" class="container mt-5 text-center">
    <h1>Welcome to the Clinic Management System</h1>
    <p class="lead">Easily manage patients, appointments, and medical staff.</p>

    @guest
        <a href="{{ url('/login') }}" class="btn btn-primary mx-2">Login</a>
        <a href="{{ url('/register') }}" class="btn btn-secondary mx-2">Register</a>
    @else
        <a href="{{ url('/dashboard') }}" class="btn btn-success">Go to Dashboard</a>
    @endguest
</div>
@endsection
