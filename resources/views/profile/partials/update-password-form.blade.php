<section>
    <header>
        <h2 class="profile-title">{{ __('Update Password') }}</h2>
        <p class="profile-subtitle">{{ __('Ensure your account is using a long, random password to stay secure.') }}</p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-4">
        @csrf
        @method('put')

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label-profile">{{ __('Current Password') }}</label>
                <input type="password" class="form-control form-control-lg form-control-profile {{ $errors->updatePassword->has('current_password') ? 'is-invalid' : '' }}" id="update_password_current_password" name="current_password" autocomplete="current-password">
                @if ($errors->updatePassword->has('current_password'))
                    <div class="invalid-feedback invalid-feedback-profile">{{ $errors->updatePassword->first('current_password') }}</div>
                @endif
            </div>

            <div class="col-md-6">
                <label class="form-label-profile">{{ __('New Password') }}</label>
                <input type="password" class="form-control form-control-lg form-control-profile {{ $errors->updatePassword->has('password') ? 'is-invalid' : '' }}" id="update_password_password" name="password" autocomplete="new-password">
                @if ($errors->updatePassword->has('password'))
                    <div class="invalid-feedback invalid-feedback-profile">{{ $errors->updatePassword->first('password') }}</div>
                @endif
            </div>

            <div class="col-md-6">
                <label class="form-label-profile">{{ __('Confirm Password') }}</label>
                <input type="password" class="form-control form-control-lg form-control-profile {{ $errors->updatePassword->has('password_confirmation') ? 'is-invalid' : '' }}" id="update_password_password_confirmation" name="password_confirmation" autocomplete="new-password">
                @if ($errors->updatePassword->has('password_confirmation'))
                    <div class="invalid-feedback invalid-feedback-profile">{{ $errors->updatePassword->first('password_confirmation') }}</div>
                @endif
            </div>
        </div>

        <div class="d-flex align-items-center gap-3 mt-4 pt-3 border-top">
            <button type="submit" class="btn-profile-primary">
                {{ __('Save') }}
            </button>

            @if (session('status') === 'password-updated')
                <p class="text-sm text-muted mb-0">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
