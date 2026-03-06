@extends('layouts.admin')
@section('title')
    Paket GYM
@endsection
@section('content')
<h1 class="text-xl font-bold mb-4">Data Paket Gym</h1>

<a href="{{ route('paket.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
    Tambah Paket
</a>

<table class="w-full mt-4 bg-white shadow rounded">
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
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$item->nama_paket}}</td>
                <td>{{$item->harga}}</td>
                <td>{{$item->durasi_hari}}</td>
                <td class="d-flex">
                    <a class="btn btn-primary me-2" href="{{ route('admin.paket.edit', $item->id) }}"
                        role="button"><i class='bx bxs-edit'></i></a>
                    <form action="{{ route('admin.paket.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-primary"><i class='bx bxs-trash'></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
