<!-- resources/views/layouts/navigation.blade.php -->

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container-fluid px-4">
        <!-- Brand / Logo -->
        <a class="navbar-brand fw-bold fs-4 d-flex align-items-center" href="{{ route('dashboard') }}">
            <i class="bi bi-hospital me-2"></i> Clinique Santé Plus
        </a>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link @if(request()->routeIs('dashboard')) active fw-semibold @endif" href="{{ route('dashboard') }}">
                        <i class="bi bi-speedometer2 me-1"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->routeIs('employees.*')) active fw-semibold @endif" href="{{ route('employees.index') }}">
                        <i class="bi bi-people me-1"></i> Employees
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->routeIs('doctors.*')) active fw-semibold @endif" href="{{ route('doctors.index') }}">
                        <i class="bi bi-person-badge me-1"></i> Doctors
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->routeIs('patients.*')) active fw-semibold @endif" href="{{ route('patients.index') }}">
                        <i class="bi bi-heart-pulse me-1"></i> Patients
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->routeIs('appointments.*')) active fw-semibold @endif" href="{{ route('appointments.index') }}">
                        <i class="bi bi-calendar-check me-1"></i> Appointments
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->routeIs('invoices.*')) active fw-semibold @endif" href="{{ route('invoices.index') }}">
                        <i class="bi bi-receipt me-1"></i> Invoices
                    </a>
                </li>
            </ul>

            <!-- User Dropdown -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle me-1 fs-5"></i> {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow border-0" aria-labelledby="userDropdown">
                        <li>
                            <a class="dropdown-item py-2" href="{{ route('profile.edit') }}">
                                <i class="bi bi-person-gear me-2 text-muted"></i> Profile
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="dropdown-item py-2 text-danger" type="submit">
                                    <i class="bi bi-box-arrow-right me-2"></i> Log Out
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>