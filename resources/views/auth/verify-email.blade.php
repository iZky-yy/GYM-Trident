<x-guest-layout>
<div class="auth-wrapper">
    <div class="auth-card">
        <h2 class="auth-title">Verify <span>Email</span></h2>
        <p style="color:#aaa;font-size:13px;text-align:center;margin-bottom:20px;">
            Kami telah mengirimkan link verifikasi ke email anda.
            Silakan cek inbox untuk mengaktifkan akun.
        </p>
        @if (session('status') == 'verification-link-sent')
            <div class="auth-error" style="color:#A3FF12;text-align:center;margin-bottom:10px;">
                Link verifikasi baru telah dikirim.
            </div>
        @endif
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button class="auth-btn">
                Kirim Ulang Email Verifikasi
            </button>
        </form>
        <div class="auth-link">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button style="background:none;border:none;color:#A3FF12;cursor:pointer;">
                    Logout
                </button>
            </form>
        </div>
    </div>
</div>
</x-guest-layout>
