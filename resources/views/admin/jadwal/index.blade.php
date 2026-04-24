@extends('layouts.admin')

@section('title', 'Jadwal Training')

@section('content')
<div class="content">
    <div class="table-wrapper">
        <div class="table-title">
            <h2>Data Jadwal PT</h2>
        </div>
        <table class="custom-table" id="tableJadwal">
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
                        <a href="{{ route('admin.jadwal.edit', $item->id) }}" class="btn-action btn-edit">Edit</a>
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

@push('scripts')
<script>
    $('#tableJadwal').DataTable({
        language: { url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json' },
        columnDefs: [{ orderable: false, targets: [0, 4] }]
    });
</script>
@endpush
