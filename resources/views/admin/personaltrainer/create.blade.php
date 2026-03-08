@extends('layouts.admin')

@section('title')
    Tambah PT GYM
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <form class="row g-3" action="{{ route('personaltrainer.store') }}" method="POST">
                @csrf
                <div>
                    <label class="form-label">Nama</label>
                    <input type="text" name="name" placeholder="Ex : Rizky" class="form-control"
                        value="{{ old('name') }}">
                    <div style="color: red">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div>
                    <label class="form-label">Email</label>
                    <input type="email" name="email" placeholder="Ex : example@gmail.com" class="form-control"
                        value="{{ old('email') }}">
                    <div style="color: red">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div>
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                    <div style="color: red">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div>
                    <label class="form-label">Spesialisasi</label>
                    <input type="text" name="spesialisasi" placeholder="Ex : Zumba" class="form-control"
                        value="{{ old('spesialisasi') }}">
                    <div style="color: red">
                        @error('spesialisai')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div>
                    <label class="form-label">Tarif per Sesi</label>
                    <input type="number" name="tarif_per_sesi" placeholder="Ex : 20000" class="form-control"
                        value="{{ old('tarif_per_sesi') }}">
                    <div style="color: red">
                        @error('tarif_per_sesi')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </div>
            </form>
        </div>
    </div>
@endsection
