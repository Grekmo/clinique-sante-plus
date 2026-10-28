<section>
    <header>
        <h2 class="profile-title">{{ __('Delete Account') }}</h2>
        <p class="profile-subtitle">{{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}</p>
    </header>

    <button type="button" class="btn-profile-danger" data-bs-toggle="modal" data-bs-target="#confirmUserDeletionModal">
        {{ __('Delete Account') }}
    </button>

    <div class="modal fade" id="confirmUserDeletionModal" tabindex="-1" aria-labelledby="confirmUserDeletionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <form method="post" action="{{ route('profile.destroy') }}" class="p-4">
                    @csrf
                    @method('delete')

                    <div class="modal-body">
                        <h5 class="modal-title fw-bold" id="confirmUserDeletionModalLabel" style="color: var(--heading-color);">{{ __('Are you sure you want to delete your account?') }}</h5>
                        <p class="text-muted small mt-2">
                            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                        </p>

                        <div class="mt-4">
                            <label class="form-label-profile">{{ __('Password') }}</label>
                            <input type="password" class="form-control form-control-lg form-control-profile {{ $errors->userDeletion->has('password') ? 'is-invalid' : '' }}" id="password" name="password" placeholder="{{ __('Password') }}">
                            @if ($errors->userDeletion->has('password'))
                                <div class="invalid-feedback invalid-feedback-profile">{{ $errors->userDeletion->first('password') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="modal-footer border-0">
                        <button type="button" class="btn-profile-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                        <button type="submit" class="btn-profile-danger">{{ __('Delete Account') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
