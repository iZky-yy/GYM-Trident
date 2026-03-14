@extends('layouts.admin')

@section('title')
    Paket GYM
@endsection

@section('content')
    <div class="content">
        <div class="table-wrapper">
            <div class="table-title">
                <h2>Data Paket GYM</h2>
                <a href="{{ route('paket.create') }}" class="btn-add">
                    + Tambah Paket GYM
                </a>
            </div>
            <table class="custom-table">
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
                            <td>
                                <div class="action-group">
                                    <a href="{{ route('paket.edit', $item->id) }}" class="btn-action btn-edit">
                                        Edit
                                    </a>
                                    <form action="{{ route('paket.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn-action btn-delete">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
