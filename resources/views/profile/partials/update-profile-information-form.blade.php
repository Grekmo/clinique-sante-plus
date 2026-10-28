<section>
    <header>
        <h2 class="profile-title">{{ __('Profile Information') }}</h2>
        <p class="profile-subtitle">{{ __("Update your account's profile information and email address.") }}</p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-4">
        @csrf
        @method('patch')

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label-profile" for="name">{{ __('Name') }}</label>
                <input type="text" class="form-control form-control-lg form-control-profile {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                @if ($errors->has('name'))
                    <div class="invalid-feedback invalid-feedback-profile">{{ $errors->first('name') }}</div>
                @endif
            </div>

            <div class="col-md-6">
                <label class="form-label-profile" for="email">{{ __('Email') }}</label>
                <input type="email" class="form-control form-control-lg form-control-profile {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" name="email" value="{{ old('email', $user->email) }}" required autocomplete="username">
                @if ($errors->has('email'))
                    <div class="invalid-feedback invalid-feedback-profile">{{ $errors->first('email') }}</div>
                @endif

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="mt-3">
                        <p class="text-sm text-muted">
                            {{ __('Your email address is unverified.') }}
                        </p>
                        <button form="send-verification" class="btn btn-outline-primary btn-sm">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-green-600">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>
        </div>

        <div class="d-flex align-items-center gap-3 mt-4 pt-3 border-top">
            <button type="submit" class="btn-profile-primary">
                {{ __('Save') }}
            </button>

            @if (session('status') === 'profile-updated')
                <p class="text-sm text-muted mb-0">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
