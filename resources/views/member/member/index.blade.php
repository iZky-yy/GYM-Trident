@extends('layouts.member')

@section('title')
Akun Member
@endsection

@section('content')
<div class="content">
    <div class="table-wrapper">
        <div class="table-title">
            <h2>Data Member GYM</h2>
            <a href="{{ route('member.create') }}" class="btn-add">
                + Tambah Member
            </a>
        </div>
        <table class="custom-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Tanggal Lahir</th>
                    <th>Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($member as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->address }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->birthday)->format('d M Y') }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>
                        <div class="action-group">
                            <a href="{{ route('member.edit', $item->id) }}" class="btn-action btn-edit">
                                Edit
                            </a>
                            <form action="{{ route('member.destroy', $item->id) }}" method="POST">
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
