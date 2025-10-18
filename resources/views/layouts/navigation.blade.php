<!-- resources/views/layouts/navigation.blade.php -->

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
   <div class="container-fluid px-4">
        <!-- Brand / Logo -->
        <a class="navbar-brand fw-bold fs-4" href="{{ asset('/') }}">
            Clinique Santé Plus
        </a>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link @if(request()->routeIs('dashboard')) active @endif" href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->routeIs('employees.*')) active @endif" href="{{ route('employees.index') }}">Employees</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->routeIs('doctors.*')) active @endif" href="{{ route('doctors.index') }}">Doctors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->routeIs('patients.*')) active @endif" href="{{ route('patients.index') }}">Patients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->routeIs('appointments.*')) active @endif" href="{{ route('appointments.index') }}">Appointments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->routeIs('invoices.*')) active @endif" href="{{ route('invoices.index') }}">Invoices</a>
                </li>
            </ul>

            <!-- User Dropdown -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="dropdown-item" type="submit">Log Out</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
