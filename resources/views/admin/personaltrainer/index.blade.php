@extends('layouts.admin')
@section('title')
    Personal Trainer GYM
@endsection
@section('content')
    <div class="content">
        <div class="table-wrapper">
            <div class="table-title">
                <h2>Data Personal Trainer GYM</h2>
                <a href="{{ route('personaltrainer.create') }}" class="btn-add">
                    + Tambah Personal Trainer GYM
                </a>
            </div>
            <table class="custom-table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Spesialisasi</th>
                        <th scope="col">Tarif / Sesi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pts as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->user->email }}</td>
                            <td>{{ $item->spesialisasi }}</td>
                            <td>Rp {{ number_format($item->tarif_per_sesi) }}</td>
                            <td>
                                <div class="action-group">
                                    <a href="{{ route('personaltrainer.edit', $item->id) }}" class="btn-action btn-edit">
                                        Edit
                                    </a>
                                    <form action="{{ route('personaltrainer.destroy', $item->id) }}" method="POST">
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
