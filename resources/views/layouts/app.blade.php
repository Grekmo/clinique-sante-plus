<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('Clinique Santé Plus', 'Clinique Santé Plus - Dashboard') }}</title>

    <!-- Favicons -->
    <link href="{{ asset('/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File (نفس ملف التصميم الموحد) -->
    <link href="{{ asset('/css/main.css') }}" rel="stylesheet">

    @stack('styles')
</head>

<body class="index-page">

  <!-- Top Bar (نفس الشريط العلوي الموجود في الواجهة العامة) -->
  <header id="header" class="header sticky-top">
    <div class="topbar d-flex align-items-center">
      <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
          <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">contact@example.com</a></i>
          <i class="bi bi-phone d-flex align-items-center ms-4"><span>+1 5589 55488 55</span></i>
        </div>
        <div class="social-links d-none d-md-flex align-items-center">
          <span class="text-white-50 small me-3"><i class="bi bi-shield-lock-fill me-1"></i> Espace Administrateur</span>
          <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
          <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>
      </div>
    </div><!-- End Top Bar -->

    <!-- Branding & Navigation (نفس قالب الهيدر الأبيض الاحترافي) -->
    <div class="branding d-flex align-items-center bg-white">
      <div class="container position-relative d-flex align-items-center justify-content-between">
        
        <!-- Logo -->
        <a href="{{ route('dashboard') }}" class="logo d-flex align-items-center me-auto">
          <h1 class="sitename">Clinique Santé Plus</h1>
        </a>

        <!-- Navigation Links الخاصة باللوحة -->
        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a></li>
            <li><a href="{{ route('employees.index') }}" class="{{ request()->routeIs('employees.*') ? 'active' : '' }}">Employees</a></li>
            <li><a href="{{ route('doctors.index') }}" class="{{ request()->routeIs('doctors.*') ? 'active' : '' }}">Doctors</a></li>
            <li><a href="{{ route('patients.index') }}" class="{{ request()->routeIs('patients.*') ? 'active' : '' }}">Patients</a></li>
            <li><a href="{{ route('appointments.index') }}" class="{{ request()->routeIs('appointments.*') ? 'active' : '' }}">Appointments</a></li>
            <li><a href="{{ route('invoices.index') }}" class="{{ request()->routeIs('invoices.*') ? 'active' : '' }}">Invoices</a></li>
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <!-- زر الانتقال للموقع العام أو القائمة المنسدلة للمستخدم -->
        <div class="dropdown ms-3">
          <a class="cta-btn d-none d-sm-block dropdown-toggle text-decoration-none text-white" href="#" role="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name ?? 'Admin' }}
          </a>
          <ul class="dropdown-menu dropdown-menu-end shadow border-0" aria-labelledby="userMenu">
            <li><a class="dropdown-item py-2" href="{{ url('/') }}" target="_blank"><i class="bi bi-globe me-2 text-primary"></i> Voir le site</a></li>
            <li><a class="dropdown-item py-2" href="{{ route('profile.edit') }}"><i class="bi bi-gear me-2 text-muted"></i> Profile</a></li>
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
        </div>

      </div>
    </div>
  </header>

  <!-- Page Content -->
  <main class="main py-4">
    @yield('content')
  </main>

  <!-- Vendor JS Files -->
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('/js/main.js') }}"></script>

</body>
</html>