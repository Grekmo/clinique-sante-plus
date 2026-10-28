@extends('layouts.app')

@push('styles')
<style>
  .profile-page { background: #f1f5f9; min-height: calc(100vh - 160px); }
  .profile-card { border: none; border-radius: 14px; box-shadow: 0 4px 24px rgba(0,0,0,0.07); background: #ffffff; overflow: hidden; }
  .profile-card .card-body { padding: 1.75rem 1.5rem; }
  .profile-title { color: var(--heading-color); font-family: var(--heading-font); font-weight: 700; font-size: 1.35rem; margin: 0 0 0.25rem 0; letter-spacing: -0.01em; }
  .profile-subtitle { color: #64748b; font-size: 0.9rem; margin: 0; }
  .btn-profile-primary { background-color: #1977cc; border-color: #1977cc; color: #ffffff; border-radius: 10px; font-weight: 600; padding: 0.7rem 1.5rem; }
  .btn-profile-primary:hover { background-color: #145fa3; border-color: #145fa3; color: #ffffff; }
  .btn-profile-outline { color: #1977cc; border-color: #1977cc; background: transparent; border-radius: 10px; font-weight: 600; padding: 0.7rem 1.5rem; }
  .btn-profile-outline:hover { background-color: #1977cc; color: #ffffff; }
  .btn-profile-danger { background-color: #dc3545; border-color: #dc3545; color: #ffffff; border-radius: 10px; font-weight: 600; padding: 0.5rem 1rem; font-size: 0.85rem; }
  .btn-profile-danger:hover { background-color: #b91c1c; border-color: #b91c1c; color: #ffffff; }
  .form-label-profile { display: block; font-weight: 600; color: #2c4964; font-size: 0.875rem; margin-bottom: 0.4rem; font-family: var(--default-font); }
  .form-control-profile { border-radius: 10px; border: 1px solid #cbd5e1; padding: 0.65rem 0.9rem; font-size: 0.95rem; background: #ffffff; }
  .form-control-profile:focus { border-color: #1977cc; box-shadow: 0 0 0 3px rgba(25,119,204,0.15); outline: 0; }
  .form-control-profile.is-invalid { border-color: #dc3545; }
  .invalid-feedback-profile { color: #dc3545; font-size: 0.8rem; margin-top: 0.35rem; display: block; }
  .alert-profile { border: none; border-radius: 10px; padding: 1rem 1.25rem; font-size: 0.95rem; margin-bottom: 1.25rem; }
  .alert-profile.alert-success { background-color: #f0fdf4; color: #166534; }
  .alert-profile.alert-danger { background-color: #fef2f2; color: #991b1b; }
  .page-header-profile { display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.5rem; flex-wrap: wrap; gap: 1rem; }
  .page-header-profile .title-group h1 { color: var(--heading-color); font-family: var(--heading-font); font-weight: 700; font-size: 1.4rem; margin: 0 0 0.25rem 0; letter-spacing: -0.01em; }
  .page-header-profile .title-group p { color: #64748b; font-size: 0.9rem; margin: 0; }
  .page-header-profile .actions { display: flex; gap: 0.75rem; }
  .icon-box-profile { display: inline-flex; align-items: center; justify-content: center; width: 44px; height: 44px; background: #eef4fb; color: #1977cc; border-radius: 10px; font-size: 1.25rem; }
  .avatar-wrapper { position: relative; width: 110px; height: 110px; margin: 0 auto 1rem auto; }
  .avatar { width: 100%; height: 100%; border-radius: 50%; background: #eef4fb; color: #1977cc; display: flex; align-items: center; justify-content: center; font-size: 3rem; object-fit: cover; border: 4px solid #ffffff; box-shadow: 0 2px 8px rgba(0,0,0,0.08); }
  .role-badge { display: inline-flex; align-items: center; padding: 0.45rem 0.9rem; border-radius: 999px; font-size: 0.8rem; font-weight: 700; letter-spacing: 0.04em; text-transform: uppercase; }
  .role-badge.admin { background: #fef3c7; color: #92400e; }
  .role-badge.doctor { background: #dcfce7; color: #166534; }
  .role-badge.employee { background: #dbeafe; color: #1e40af; }
  .role-badge.default { background: #e2e8f0; color: #475569; }
  .form-section { border-top: 1px solid #f1f5f9; padding-top: 1.5rem; margin-top: 1.5rem; }
  .form-section:first-child { border-top: none; padding-top: 0; margin-top: 0; }
</style>
@endpush

@section('content')
<div class="profile-page">
  <div class="container px-4 py-4">
    <div class="page-header-profile">
      <div class="title-group">
        <h1 class="profile-title">Mon profil</h1>
        <p class="profile-subtitle">Gérez vos informations personnelles et votre mot de passe</p>
      </div>
      <div class="actions">
        <div class="icon-box-profile"><i class="bi bi-person-circle"></i></div>
      </div>
    </div>

    @if(session('status') === 'profile-updated')
      <div class="alert alert-profile alert-success alert-dismissible fade show" role="alert">
        {{ __('Informations de profil mises à jour avec succès.') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
      </div>
    @endif

    @if ($errors->any())
      <div class="alert alert-profile alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ __('Erreur') }}</strong>
        <ul class="mb-0 mt-2 ps-3">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
      </div>
    @endif

    <!-- Profile Header Card -->
    <div class="profile-card mb-4">
      <div class="card-body text-center py-4">
        <div class="avatar-wrapper">
          <div class="avatar"><i class="bi bi-person-circle"></i></div>
        </div>
        <h3 class="mb-1" style="color: var(--heading-color); font-family: var(--heading-font); font-weight: 700;">{{ $user->name }}</h3>
        <p class="text-muted mb-2">{{ $user->email }}</p>
        @php
          $role = $user->role ?? 'default';
          $roleLabel = match(strtolower($role)) {
            'admin' => 'Administrateur',
            'doctor', 'docteur' => 'Médecin',
            'employee', 'employe', 'employé' => 'Employé',
            default => 'Utilisateur',
          };
          $roleClass = match(strtolower($role)) {
            'admin' => 'admin',
            'doctor', 'docteur' => 'doctor',
            'employee', 'employe', 'employé' => 'employee',
            default => 'default',
          };
        @endphp
        <span class="role-badge {{ $roleClass }}">{{ $roleLabel }}</span>
      </div>
    </div>

    <!-- Personal Information Form -->
    <div class="profile-card mb-4">
      <div class="card-body">
        <div class="d-flex align-items-between mb-3">
          <h5 class="profile-title mb-0">{{ __('Informations personnelles') }}</h5>
        </div>
        <p class="profile-subtitle mb-4">{{ __('Modifiez vos informations de compte.') }}</p>

        <form method="POST" action="{{ route('profile.update') }}" novalidate>
          @csrf
          @method('PUT')

          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label-profile">{{ __('Nom complet') }}</label>
              <input type="text" class="form-control form-control-lg form-control-profile {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name">
              @if ($errors->has('name'))
                <div class="invalid-feedback invalid-feedback-profile">{{ $errors->first('name') }}</div>
              @endif
            </div>

            <div class="col-md-6">
              <label class="form-label-profile">{{ __('Adresse e-mail') }}</label>
              <input type="email" class="form-control form-control-lg form-control-profile {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email">
              @if ($errors->has('email'))
                <div class="invalid-feedback invalid-feedback-profile">{{ $errors->first('email') }}</div>
              @endif
            </div>
          </div>

          <div class="d-flex align-items-center mt-5 pt-4 border-top flex-wrap gap-3">
            <a href="{{ route('dashboard') }}" class="btn-profile-outline">
              <i class="bi bi-arrow-left me-2"></i> {{ __('Retour') }}
            </a>
            <div class="flex-grow-1 d-flex justify-content-center">
              <button type="submit" class="btn-profile-primary">
                <i class="bi bi-save me-2"></i> {{ __('Enregistrer les modifications') }}
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- Password Update Form -->
    <div class="profile-card">
      <div class="card-body">
        <div class="d-flex align-items-between mb-3">
          <h5 class="profile-title mb-0">{{ __('Modifier le mot de passe') }}</h5>
        </div>
        <p class="profile-subtitle mb-4">{{ __('Sécurisez votre compte avec un nouveau mot de passe.') }}</p>

        <form method="POST" action="{{ route('password.update') }}" novalidate>
          @csrf
          @method('PUT')

          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label-profile">{{ __('Mot de passe actuel') }}</label>
              <input type="password" class="form-control form-control-lg form-control-profile {{ $errors->has('current_password') ? 'is-invalid' : '' }}" name="current_password" required autocomplete="current-password">
              @if ($errors->has('current_password'))
                <div class="invalid-feedback invalid-feedback-profile">{{ $errors->first('current_password') }}</div>
              @endif
            </div>

            <div class="col-md-6">
              <label class="form-label-profile">{{ __('Nouveau mot de passe') }}</label>
              <input type="password" class="form-control form-control-lg form-control-profile {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" required autocomplete="new-password">
              @if ($errors->has('password'))
                <div class="invalid-feedback invalid-feedback-profile">{{ $errors->first('password') }}</div>
              @endif
            </div>

            <div class="col-md-6">
              <label class="form-label-profile">{{ __('Confirmer le mot de passe') }}</label>
              <input type="password" class="form-control form-control-lg form-control-profile {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" name="password_confirmation" required autocomplete="new-password">
              @if ($errors->has('password_confirmation'))
                <div class="invalid-feedback invalid-feedback-profile">{{ $errors->first('password_confirmation') }}</div>
              @endif
            </div>
          </div>

          <div class="d-flex align-items-center mt-5 pt-4 border-top flex-wrap gap-3">
            <a href="{{ route('dashboard') }}" class="btn-profile-outline">
              <i class="bi bi-arrow-left me-2"></i> {{ __('Annuler') }}
            </a>
            <div class="flex-grow-1 d-flex justify-content-center">
              <button type="submit" class="btn-profile-primary">
                <i class="bi bi-key me-2"></i> {{ __('Modifier le mot de passe') }}
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
