@extends('layouts.admin')

@section('title')
    PT GYM
@endsection
@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <h6 class="card-title">Data Personal Trainer GYM</h6>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Spesialisasi</th>
                            <th>Tarif / Sesi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pts as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->user->email }}</td>
                            <td>{{ $item->spesialisasi }}</td>
                            <td>Rp {{ number_format($item->tarif_per_sesi) }}</td>
                            <td class="d-flex gap-2">
                                <a class="btn btn-warning btn-sm" href="{{ route('personaltrainer.edit', $item->id)}}">
                                    <i class="bx bxs-edit"></i>
                                </a>
                                <form action="{{ route('personaltrainer.destroy', $item->id) }}" method="POST">
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
                <a href="{{ route('personaltrainer.create') }}" class="btn btn-primary mb-3">
                    Tambah PT
                </a>
            </div>
        </div>
    </div>
@endsection
