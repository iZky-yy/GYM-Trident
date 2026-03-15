<x-guest-layout>
<div class="auth-wrapper">
    <div class="auth-card">
        <h2 class="auth-title">Forgot <span>Password</span></h2>
        <p style="color:#aaa;font-size:13px;text-align:center;margin-bottom:20px;">
            Masukkan email anda untuk menerima link reset password.
        </p>
        <x-auth-session-status class="auth-error" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="auth-group">
                <label>Email</label>
                <input type="email" name="email" class="auth-input"
                       value="{{ old('email') }}" required autofocus>
                <div class="auth-error">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <button class="auth-btn">
                Kirim Reset Link
            </button>
            <div class="auth-link">
                <a href="{{ route('login') }}">Kembali ke Login</a>
            </div>
        </form>
    </div>
</div>
</x-guest-layout>
