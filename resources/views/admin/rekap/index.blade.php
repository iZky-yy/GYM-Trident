@extends('layouts.admin')
@section('title')
@endsection
@section('content')
    <div class="container">
        <div class="card-body">
            <h1 class="card-title">REKAP GYM</h1>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-8">
                <form class="row g-3 mb-3" method="get" action="/recap" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-3">
                        <input type="date" value="{{ old('tgl_mulai') }}" name="tgl_mulai" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <input type="date" value="{{ old('tgl_keluar') }}" name="tgl_keluar" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">Tampilkan Data</button>
                    </div>
                </form>
            </div>
        </div>
        <hr>
        <div class="card">
            <div class="card-header">Member GYM</div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Telepon</th>
                        <th scope="col">Tanggal Lahir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($member as $member)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->address }}</td>
                            <td>{{ $member->phone }}</td>
                            <td>{{ \Carbon\Carbon::parse($member->birthday)->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <hr>
        <div class="card">
            <div class="card-header">PT GYM</div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Spesialisasi</th>
                        <th scope="col">Tarif / sesi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pts as $pt)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pt->user->name }}</td>
                            <td>{{ $pt->spesialisasi }}</td>
                            <td>Rp {{ number_format($pt->tarif_per_sesi) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <hr>
        <div class="card">
            <div class="card-header">Paket GYM</div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Paket GYM</th>
                        <th scope="col">Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pakets as $paket)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $paket->nama_paket }}</td>
                            <td>Rp {{ number_format($paket->harga) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
