@extends('layouts.' . auth()->user()->role)

@section('title', 'Profile')

@section('content')

    <link rel="stylesheet" href="{{ asset('css/profile_style.css') }}">

    <div class="content">
        <div class="header-text">
            <h1>Halaman Biodata</h1>
            <p>GymTrident Information System</p>
        </div>

        <!-- IDENTITY CARD -->
        <div class="identity-card">
            <div class="banner-strip"></div>
            <div class="identity-content">
                <div class="profile-pic">
                    @if ($user->photo)
                        <img src="{{ asset('storage/' . $user->photo) }}" class="img-profile">
                    @else
                        <div class="pic-placeholder">
                            {{ strtoupper(substr($user->name, 0, 2)) }}
                        </div>
                    @endif
                </div>
                <div class="profile-name">
                    <h2>{{ $user->name }}</h2>
                    <p>{{ $user->role }}</p>
                </div>
                <div class="qr-box">
                    <img src="data:image/png;base64,{{ $qrBase64 }}" class="qr-img" onclick="openQR(this)">
                    <p>Tap QR</p>
                </div>
            </div>
        </div>

        <!-- FORM -->
        <div class="main-form-box">

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- DATA DIRI -->
                <div class="form-title">Data Diri</div>

                <div class="grid-layout">
                    <div class="field">
                        <label>Nama</label>
                        <input type="text" name="name" value="{{ $user->name }}">
                    </div>

                    <div class="field">
                        <label>Email</label>
                        <input type="text" value="{{ $user->email }}" disabled>
                    </div>

                    <div class="field">
                        <label>No HP</label>
                        <input type="text" name="phone" value="{{ $user->phone }}">
                    </div>

                    <div class="field">
                        <label>Alamat</label>
                        <input type="text" name="address" value="{{ $user->address }}">
                    </div>

                    <div class="field">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="birthday" value="{{ $user->birthday }}">
                    </div>

                    <div class="field">
                        <label>Upload Foto</label>
                        <input type="file" name="photo">
                    </div>
                </div>

                <button class="btn-submit">Update Profile</button>
            </form>
            <div class="form-title" style="margin-top:30px;">Ganti Password</div>

            <form action="{{ route('profile.password') }}" method="POST">
                @csrf

                <div class="grid-layout">
                    <div class="field">
                        <label>Password Baru</label>
                        <input type="password" name="password">
                    </div>

                    <div class="field">
                        <label>Konfirmasi</label>
                        <input type="password" name="password_confirmation">
                    </div>
                </div>

                <button class="btn-submit">Ganti Password</button>
            </form>
            <div class="form-title" style="margin-top:30px;">Danger Zone</div>
            <form action="{{ route('profile.delete') }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn-delete">Hapus Akun</button>
            </form>
        </div>
    </div>
<div id="qrModal" class="qr-modal" onclick="closeQR()">
    <img id="qrFull">
</div>

<script>
function openQR(el){
    document.getElementById('qrModal').style.display = 'flex';
    document.getElementById('qrFull').src = el.src;
}

function closeQR(){
    document.getElementById('qrModal').style.display = 'none';
}
</script>
@endsection
