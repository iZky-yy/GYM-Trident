@extends('layouts.admin')

@section('title', 'Member GYM')

@section('content')
    <div class="content">
        <div class="table-wrapper">
            <div class="table-title">
                <h2>Data Member GYM</h2>
                <a href="{{ route('member.create') }}" class="btn-add">+ Tambah Member</a>
            </div>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

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
                    @forelse ($members as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->address ?? '-' }}</td>
                            <td>{{ $item->birthday?->format('d M Y') ?? '-' }}</td>
                            <td>{{ $item->phone ?? '-' }}</td>
                            <td>
                                <div class="action-group">
                                    <a href="{{ route('member.edit', $item->id) }}" class="btn-action btn-edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M19.67 2.61c-.81-.81-2.14-.81-2.95 0L3.38 15.95c-.13.13-.22.29-.26.46l-1.09 4.34c-.08.34.01.7.26.95.19.19.45.29.71.29.08 0 .16 0 .24-.03l4.34-1.09c.18-.04.34-.13.46-.26L21.38 7.27c.81-.81.81-2.14 0-2.95L19.66 2.6ZM6.83 19.01l-2.46.61.61-2.46 9.96-9.94 1.84 1.84zM19.98 5.86 18.2 7.64 16.36 5.8l1.78-1.78s.09-.03.12 0l1.72 1.72s.03.09 0 .12"/>
                                        </svg>
                                    </a>
                                    <form action="{{ route('member.destroy', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus member ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action btn-delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M17 6V4c0-1.1-.9-2-2-2H9c-1.1 0-2 .9-2 2v2H2v2h2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V8h2V6zM9 4h6v2H9zM6 20V8h12v12z"/>
                                                <path d="M9 10h2v8H9zm4 0h2v8h-2z"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Belum ada data member.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
 