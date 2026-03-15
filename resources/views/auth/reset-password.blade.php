<x-guest-layout>
<div class="auth-wrapper">
    <div class="auth-card">
        <h2 class="auth-title">Reset <span>Password</span></h2>
        <form method="POST" action="{{ route('password.store') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <div class="auth-group">
                <label>Email</label>
                <input type="email" name="email"
                       class="auth-input"
                       value="{{ old('email', $request->email) }}"
                       required autofocus>
                <div class="auth-error">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="auth-group">
                <label>Password</label>
                <input type="password" name="password" class="auth-input" required>
                <div class="auth-error">
                    @error('password')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="auth-group">
                <label>Confirm Password</label>
                <input type="password" name="password_confirmation" class="auth-input" required>

                <div class="auth-error">
                    @error('password_confirmation')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <button class="auth-btn">
                Reset Password
            </button>
        </form>
    </div>
</div>
</x-guest-layout>
