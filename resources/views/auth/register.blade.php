<x-guest-layout>

    <div class="auth-wrapper">

        <div class="auth-card">

            <h2 class="auth-title">Register <span>GT GYM</span></h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="auth-group">
                    <label>Nama</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="auth-input" required>

                    <div class="auth-error">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

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

                <div class="auth-group">
                    <label>Confirm Password</label>
                    <input type="password" name="password_confirmation" class="auth-input" required>

                </div>

                <button class="auth-btn">
                    Register
                </button>

                <div class="auth-link">
                    Sudah punya akun?
                    <a href="{{ route('login') }}">Login</a>
                </div>

            </form>

        </div>

    </div>

</x-guest-layout>
