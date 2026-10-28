<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Connexion &bull; ClinicHub</title>

    <!-- Favicons -->
    <link href="{{ asset('/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

    <!-- Main CSS File (design system unifié) -->
    <link href="{{ asset('/css/main.css') }}" rel="stylesheet">

    <style>
      .login-body { background: #f1f5f9; }
      .login-page { display: flex; align-items: center; justify-content: center; min-height: calc(100vh - 112px); padding: 1.5rem; }
      .login-card { border: none; border-radius: 16px; box-shadow: 0 4px 24px rgba(0,0,0,0.08); background: #ffffff; overflow: hidden; width: 100%; max-width: 420px; padding: 2rem 1.75rem; }
      .login-brand { text-align: center; margin-bottom: 1.5rem; }
      .login-brand h2 { color: var(--heading-color, #2c4964); font-family: var(--heading-font); font-weight: 700; font-size: 1.5rem; margin: 0 0 0.25rem 0; letter-spacing: -0.01em; }
      .login-brand p { color: #64748b; font-size: 0.9rem; margin: 0; }
      .form-label-login { display: block; font-weight: 600; color: #2c4964; font-size: 0.875rem; margin-bottom: 0.4rem; font-family: var(--default-font); }
      .form-control-login { border-radius: 10px; border: 1px solid #cbd5e1; padding: 0.65rem 0.9rem; font-size: 0.95rem; background: #ffffff; width: 100%; }
      .form-control-login:focus { border-color: #1977cc; box-shadow: 0 0 0 3px rgba(25,119,204,0.15); outline: 0; }
      .form-control-login.is-invalid { border-color: #dc3545; }
      .invalid-feedback-login { color: #dc3545; font-size: 0.8rem; margin-top: 0.35rem; display: block; }
      .btn-login { background-color: #1977cc; border-color: #1977cc; color: #ffffff; border-radius: 10px; font-weight: 600; padding: 0.7rem 1.5rem; width: 100%; font-size: 1rem; }
      .btn-login:hover { background-color: #145fa3; border-color: #145fa3; color: #ffffff; }
      .form-check-login { margin-top: 1rem; }
      .form-check-input-login { width: 1.1em; height: 1.1em; margin-top: 0.25rem; border: 1px solid #cbd5e1; border-radius: 0.25rem; }
      .form-check-input-login:checked { background-color: #1977cc; border-color: #1977cc; }
      .text-login { color: #64748b; font-size: 0.9rem; text-align: center; }
      .text-login a { color: #1977cc; text-decoration: none; font-weight: 600; }
      .text-login a:hover { text-decoration: underline; }
      .alert-login { border: none; border-radius: 10px; padding: 1rem 1.25rem; font-size: 0.95rem; margin-bottom: 1.5rem; }
      .alert-login.alert-danger { background-color: #fef2f2; color: #991b1b; }
      .alert-login.alert-success { background-color: #f0fdf4; color: #166534; }
    </style>
</head>

<body class="login-body">

  <div class="login-page">
    <div class="login-card">
      <div class="login-brand text-center mb-4">
        <div class="d-inline-flex align-items-center justify-content-center">
          <i class="bi bi-hospital fs-1 text-primary me-2"></i>
          <span class="d-none d-sm-inline">ClinicHub</span>
        </div>
        <p class="text-muted small mt-2 mb-0">Espace administrateur &mdash; Connexion</p>
      </div>

      @if ($errors->any())
        <div class="alert alert-danger alert-login" role="alert">
          <strong>Erreur d'authentification</strong>
          <ul class="mb-0 mt-2 ps-3">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      @if(session('status'))
        <div class="alert alert-success alert-login" role="alert">
          {{ session('status') }}
        </div>
      @endif

      <form method="POST" action="{{ route('login') }}" novalidate>
        @csrf

        <div class="mb-4">
          <label class="form-label-login" for="email">Adresse e-mail</label>
          <input type="email" class="form-control form-control-lg form-control-login {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
          @if ($errors->has('email'))
            <div class="invalid-feedback invalid-feedback-login">{{ $errors->first('email') }}</div>
          @endif
        </div>

        <div class="mb-4">
          <label class="form-label-login" for="password">Mot de passe</label>
          <input type="password" class="form-control form-control-lg form-control-login {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password" name="password" required autocomplete="current-password">
          @if ($errors->has('password'))
            <div class="invalid-feedback invalid-feedback-login">{{ $errors->first('password') }}</div>
          @endif
        </div>

        <div class="form-check mb-4">
          <input class="form-check-input form-check-input-login" type="checkbox" name="remember" id="remember_me" {{ old('remember') ? 'checked' : '' }}>
          <label class="form-check-label form-check-label-login" for="remember_me">Se souvenir de moi</label>
        </div>

        <div class="d-grid mb-4">
          <button type="submit" class="btn btn-login btn-lg">Se connecter</button>
        </div>

        <div class="text-center text-login">
          <p class="mb-0">Mot de passe oublié ? <a href="{{ Route::has('password.request') ? route('password.request') : '#' }}">Réinitialiser</a></p>
          <p class="mb-0 mt-2">Nouveau ici ? <a href="{{ route('register') }}">Cr&eacute;er un compte</a></p>
        </div>
      </form>
    </div>
  </div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>
