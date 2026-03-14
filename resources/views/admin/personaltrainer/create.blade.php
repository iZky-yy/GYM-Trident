@extends('layouts.admin')

@section('title')
    Tambah Personal Trainer
@endsection
@section('content')
    <div class="content">
        <div class="form-container">
            <h2 class="form-title">Tambah Personal Trainer</h2>
            <form action="{{ route('personaltrainer.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Personal Trainer</label>
                    <input type="text" id="name"  name="name" placeholder="Ex : Rizky" class="form-input"
                        value="{{ old('name') }}">
                    <div class="form-error">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" id="email" name="email" placeholder="Ex : example@gmail.com" class="form-input"
                        value="{{ old('email') }}">
                    <div class="form-error">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" id="password" name="password" class="form-input" value="{{ old('password') }}">
                    <div class="form-error">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Spesialisasi</label>
                    <input type="text" id="spesialisasi" name="spesialisasi" placeholder="Ex : Zumba" class="form-input"
                        value="{{ old('spesialisasi') }}">
                    <div class="form-error">
                        @error('spesialisasi')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Taris per Sesi</label>
                    <input type="number" id="tarif_per_sesi" name="tarif_per_sesi" placeholder="Ex : 20000" class="form-input"
                        value="{{ old('tarif_per_sesi') }}">
                    <div class="form-error">
                        @error('tarif_per_sesi')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn-submit">
                    Tambah Data
                </button>
            </form>
        </div>
    </div>
@endsection
