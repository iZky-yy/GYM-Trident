@extends('layouts.admin')
@section('title')
    Tambah Paket GYM
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <form class="row g-3" action="{{ route('paket.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="nama_paket" class="form-label">Paket GYM</label>
                    <input type="string" id="nama_paket" name="nama_paket" placeholder="Ex : Trident 1 Bulan" class="form-control" value="{{ old('nama_paket')}}">
                    <div style="color: red">
                        @error('nama_paket')
                            {{$message}}
                        @enderror
                    </div>
                </div>
                <div>
                    <label for="harga" class="form-label">Harga Paket</label>
                    <input type="number" id="harga" name="harga" placeholder="Ex : 100.000" class="form-control" value="{{ old('harga')}}">
                    <div style="color: red">
                        @error('harga')
                            {{$message}}
                        @enderror
                    </div>
                </div>
                <div>
                    <label for="durasi_hari" class="form-label">Durasi</label>
                    <input type="number" id="durasi_hari" name="durasi_hari" placeholder="" class="form-control" value="{{ old('durasi_hari')}}">
                    <div style="color: red">
                        @error('durasi_hari')
                            {{$message}}
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
