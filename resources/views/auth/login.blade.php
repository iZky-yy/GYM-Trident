<x-guest-layout>

    <div class="auth-wrapper">

        <div class="auth-card">

            <h2 class="auth-title">Login <span>GT GYM</span></h2>

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
