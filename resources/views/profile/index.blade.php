@extends('layouts.member')

@section('title')
    Profile
@endsection
@section('content')
    <div class="content">
        <h2 class="section-title">Profile</h2>
        <div class="profile-container">
            <div class="profile-card">
                @if (Auth::user()->photo)
                    <img src="{{ asset('storage/' . Auth::user()->photo) }}" width="120">
                @else
                    <div class="avatar-large">
                        {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                    </div>
                @endif
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="photo">
                    <button class="btn-submit">Upload Foto</button>
                </form>
            </div>
            <div class="profile-card">
                <h3>Edit Profile</h3>
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-input">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" value="{{ Auth::user()->phone }}" class="form-input">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea name="address" class="form-input">{{ Auth::user()->address }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Birthday</label>
                        <input type="date" name="birthday" value="{{ Auth::user()->birthday }}" class="form-input">
                    </div>
                    <button class="btn-submit">Update Profile</button>
                </form>
            </div>
            <div class="profile-card">
                <h3>QR Code Member</h3>
                {!! QrCode::size(200)->generate(Auth::user()->qr_token) !!}
                <p>Scan QR untuk check-in Gym</p>

            </div>
            <div class="profile-card">
                <h3>Ganti Password</h3>
                <form action="{{ route('profile.password') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Password Baru</label>
                        <input type="password" name="password" class="form-input">
                    </div>
                    <div class="form-group">
                        <label>Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="form-input">
                    </div>
                    <button class="btn-submit">Ganti Password</button>
                </form>
            </div>
            <div class="profile-card">
                <form action="{{ route('profile.delete') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn-delete">Delete Account</button>
                </form>
            </div>
        </div>
    </div>
@endsection
