<x-guest-layout>
    <div class="auth-wrapper">
        <div class="auth-card">
            <h2 class="auth-title">Login <span>GYM TRIDENT</span></h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="auth-group">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="auth-input" required>
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
                @if (Route::has('password.request'))
                    <div style="text-align:right; margin-top:-10px; margin-bottom:15px;">
                        <a href="{{ route('password.request') }}"
                            style="font-size:12px;color:#A3FF12;text-decoration:none;">
                            Forgot Password?
                        </a>
                    </div>
                @endif
                <button class="auth-btn">
                    Login
                </button>
                <div class="auth-link">
                    Belum punya akun?
                    <a href="{{ route('register') }}">Register</a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
