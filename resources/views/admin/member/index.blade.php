@extends('layouts.admin')
@section('title')
    Member GYM
@endsection
@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <h6 class="card-title">Data Member GYM</h6>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Telepon</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($member as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->birthday)->format('d M Y') }}</td>
                                <td>{{ $item->phone }}</td>
                                <td class="d-flex gap-2">
                                    <a class="btn btn-warning btn-sm" href="{{ route('member.edit', $item->id) }}">
                                        <i class='bx bxs-edit'></i>
                                    </a>
                                    <form action="{{ route('member.destroy', $item->id) }}" method="POST">
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
                <a href="{{ route('member.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
                    Tambah Member
                </a>
            </div>
        </div>
    </div>
@endsection
