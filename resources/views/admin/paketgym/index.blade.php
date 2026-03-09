@extends('layouts.admin')
@section('title')
    Paket GYM
@endsection
@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <h6 class="card-title">Data Paket GYM</h6>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Paket</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Durasi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pakets as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->nama_paket }}</td>
                                <td>Rp {{ number_format($item->harga) }}</td>
                                <td>
                                    @if ($item->durasi_hari % 30 == 0)
                                        {{ $item->durasi_hari / 30 }} Bulan
                                    @else
                                        {{ $item->durasi_hari }} Hari
                                    @endif
                                </td>
                                <td class="d-flex gap-2">
                                    <a class="btn btn-warning btn-sm" href="{{ route('paket.edit', $item->id) }}">
                                        <i class='bx bxs-edit'></i>
                                    </a>
                                    <form action="{{ route('paket.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">
                                            <i class='bx bxs-trash'></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{ route('paket.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
                    Tambah Paket
                </a>
            </div>
        </div>
    </div>
@endsection
