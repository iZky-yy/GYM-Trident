@extends('layouts.admin')
@section('title')
    Edit PT GYM
@endsection
@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <h6 class="card-title">Edit PT GYM</h6>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('personaltrainer.update', $pt->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div>
                        <label class="form-label">Nama</label>
                        <input type="text" name="name" value="{{ $pts->user->name }}" class="form-control">
                    </div>
                    <div>
                        <label class="form-label">Email</label>
                        <input type="email" name="email" value="{{ $pts->user->email }}" class="form-control">
                    </div>
                    <div>
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div>
                        <label class="form-label">Spesialisasi</label>
                        <input type="text" name="spesialisasi" value="{{ $pts->spesialisasi }}" class="form-control">
                    </div>
                    <div>
                        <label class="form-label">Tarif per Sesi</label>
                        <input type="number" name="tarif_per_sesi" value="{{ $pts->tarif_per_sesi }}" class="form-control">
                    </div>
                    <button class="btn btn-primary">
                        Update
                    </button>
                    <a href="{{ route('personaltrainer.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection
