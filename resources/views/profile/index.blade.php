@extends('layouts.' . auth()->user()->role)

@section('title', 'Profile')

@section('content')

    <link rel="stylesheet" href="{{ asset('css/profile_style.css') }}">

    <div class="content">
        <div class="header-text">
            <h1>Halaman Biodata</h1>
            <p>GymTrident Information System</p>
        </div>

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" id="profileForm">
            @csrf

            <!-- IDENTITY CARD -->
            <div class="identity-card">
                <div class="banner-strip"></div>
                <div class="identity-content">

                    <!-- FOTO PROFIL (klik untuk upload) -->
                    <div class="profile-pic-wrapper" onclick="document.getElementById('photoInput').click()" title="Klik untuk ganti foto">
                        @if ($user->photo)
                            <img src="{{ asset('storage/' . $user->photo) }}" class="img-profile" id="previewImg">
                        @else
                            <div class="pic-placeholder" id="placeholderDiv">
                                {{ strtoupper(substr($user->name, 0, 2)) }}
                            </div>
                            <img src="" class="img-profile" id="previewImg" style="display:none;">
                        @endif

                        <!-- Overlay pensil -->
                        <div class="photo-edit-overlay">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="white">
                                <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04a1 1 0 0 0 0-1.41l-2.34-2.34a1 1 0 0 0-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
                            </svg>
                        </div>

                        <!-- Input file tersembunyi -->
                        <input type="file" name="photo" id="photoInput" accept="image/*" style="display:none;">
                    </div>

                    <div class="profile-name">
                        <h2>{{ $user->name }}</h2>
                        <p>{{ $user->role }}</p>
                    </div>

                    <div class="qr-box">
                        <img src="data:image/png;base64,{{ $qrBase64 }}" class="qr-img" onclick="event.stopPropagation(); openQR(this)">
                        <p>Tap QR</p>
                    </div>
                </div>
            </div>

            <!-- FORM DATA DIRI -->
            <div class="main-form-box">
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
                        <input type="date" name="birthday" value="{{ $user->birthday ? $user->birthday->format('Y-m-d') : '' }}">
                    </div>
                </div>

                <button type="submit" class="btn-submit">Update Profile</button>
            </div>

        </form>

        <!-- GANTI PASSWORD -->
        <div class="main-form-box" style="margin-top: 10px; border-radius: 15px;">
            <div class="form-title">Ganti Password</div>

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

                <button type="submit" class="btn-submit">Ganti Password</button>
            </form>

            <div class="form-title" style="margin-top:30px;">Danger Zone</div>
            <form action="{{ route('profile.delete') }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-delete">Hapus Akun</button>
            </form>
        </div>

    </div>

    <!-- QR Modal -->
    <div id="qrModal" class="qr-modal" onclick="closeQR()">
        <img id="qrFull">
    </div>

    <script>
        // Preview foto sebelum upload
        document.getElementById('photoInput').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (!file) return;
            const reader = new FileReader();
            reader.onload = function(ev) {
                const preview = document.getElementById('previewImg');
                const placeholder = document.getElementById('placeholderDiv');
                preview.src = ev.target.result;
                preview.style.display = 'block';
                if (placeholder) placeholder.style.display = 'none';
            };
            reader.readAsDataURL(file);
        });

        // QR Modal
        function openQR(el) {
            document.getElementById('qrModal').style.display = 'flex';
            document.getElementById('qrFull').src = el.src;
        }

        function closeQR() {
            document.getElementById('qrModal').style.display = 'none';
        }
    </script>

@endsection
