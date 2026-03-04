@extends('layouts.admin')

@section('content')
<h1 class="text-xl font-bold mb-4">Data Paket Gym</h1>

<a href="{{ route('paket.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
    Tambah Paket
</a>

<table class="w-full mt-4 bg-white shadow rounded">
    <thead>
        <tr>
            <th>Nama Paket</th>
            <th>Harga</th>
            <th>Durasi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
@endsection
