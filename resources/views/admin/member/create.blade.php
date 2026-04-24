@extends('layouts.admin')

@section('title', 'Tambah Member GYM')

@section('content')
    <div class="content">
        <div class="form-container">
            <h2 class="form-title">Tambah Member</h2>

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form action="{{ route('member.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-input @error('name') is-invalid @enderror"
                        placeholder="Ex: Rizky" value="{{ old('name') }}">
                    @error('name')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Email Member</label>
                    <input type="email" name="email" class="form-input @error('email') is-invalid @enderror"
                        placeholder="Ex: example@gmail.com" value="{{ old('email') }}">
                    @error('email')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-input @error('password') is-invalid @enderror">
                    @error('password')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="address" class="form-input @error('address') is-invalid @enderror"
                        placeholder="Palembang" value="{{ old('address') }}">
                    @error('address')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="birthday" class="form-input @error('birthday') is-invalid @enderror"
                        value="{{ old('birthday') }}">
                    @error('birthday')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>No. Telepon</label>
                    <input type="text" name="phone" class="form-input @error('phone') is-invalid @enderror"
                        value="{{ old('phone') }}">
                    @error('phone')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Pilih Paket Gym</label>
                    <select name="paket_id" class="form-input @error('paket_id') is-invalid @enderror">
                        <option value="">-- Pilih Paket --</option>
                        @foreach ($pakets as $paket)
                            <option value="{{ $paket->id }}" {{ old('paket_id') == $paket->id ? 'selected' : '' }}>
                                {{ $paket->nama_paket }} — Rp{{ number_format($paket->harga, 0, ',', '.') }}
                                ({{ $paket->durasi_hari }} hari)
                            </option>
                        @endforeach
                    </select>
                    @error('paket_id')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn-submit">Tambah Data</button>
            </form>
        </div>
    </div>
@endsection
