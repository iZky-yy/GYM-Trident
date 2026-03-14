@extends('layouts.admin')

@section('title')
Tambah Paket GYM
@endsection
@section('content')
<div class="content">
    <div class="form-container">
        <h2 class="form-title">Tambah Paket GYM</h2>
        <form action="{{ route('paket.update', $pakets->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Paket GYM</label>
                <input type="string" id="nama_paket" name="nama_paket" placeholder="Ex : Trident 1 Bulan" class="form-input" value="{{$pakets->nama_paket}}">
                <div class="form-error">
                    @error('nama_paket') {{ $message }} @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="harga" class="form-label">Harga Paket</label>
                    <input type="number" id="harga" name="harga" placeholder="Ex : 100.000" class="form-input" value="{{$pakets->harga}}}">
                <div class="form-error">
                    @error('harga') {{ $message }} @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="durasi_hari" class="form-label">Durasi</label>
                    <input type="number" id="durasi_hari" name="durasi_hari" placeholder="" class="form-input" value="{{$pakets->durasi_hari}}">
                <div class="form-error">
                    @error('durasi_hari') {{ $message }} @enderror
                </div>
            </div>
            <button type="submit" class="btn-submit">
                Tambah Data
            </button>
        </form>
    </div>
</div>
@endsection
