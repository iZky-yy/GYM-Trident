@extends('layouts.admin')

@section('title')
    Jadwal Training
@endsection

@section('content')
    <div class="content">
        <div class="table-wrapper">
            <div class="table-title">
                <h2>Data Jadwal PT</h2>
            </div>
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama PT</th>
                        <th>Hari</th>
                        <th>Jam</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($jadwal as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->pt->name ?? '-' }}</td>
                            <td>{{ $item->hari }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->jam)->format('H:i') }}</td>
                            <td>
                                <a href="{{ route('admin.jadwal.edit', $item->id) }}"
                                   class="btn-action btn-edit">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Belum ada jadwal.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
