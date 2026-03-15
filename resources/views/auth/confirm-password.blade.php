<x-guest-layout>
<div class="auth-wrapper">
    <div class="auth-card">
        <h2 class="auth-title">Confirm <span>Password</span></h2>
        <p style="color:#aaa;font-size:13px;text-align:center;margin-bottom:20px;">
            Masukkan password anda untuk melanjutkan.
        </p>
        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf
            <div class="auth-group">
                <label>Password</label>
                <input type="password" name="password" class="auth-input" required>
                <div class="auth-error">
                    @error('password')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <button class="auth-btn">
                Confirm Password
            </button>
        </form>
    </div>
</div>
</x-guest-layout>
