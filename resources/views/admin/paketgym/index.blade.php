@extends('layouts.admin')

@section('title', 'Paket GYM')

@section('content')
<div class="content">
    <div class="table-wrapper">
        <div class="table-title">
            <h2>Data Paket GYM</h2>
            <a href="{{ route('paket.create') }}" class="btn-add">+ Tambah Paket GYM</a>
        </div>
        <table class="custom-table" id="tablePaket">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Paket</th>
                    <th>Harga</th>
                    <th>Durasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pakets as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_paket }}</td>
                    <td>Rp {{ number_format($item->harga) }}</td>
                    <td>
                        {{ $item->durasi_hari % 30 == 0
                            ? ($item->durasi_hari / 30) . ' Bulan'
                            : $item->durasi_hari . ' Hari' }}
                    </td>
                    <td>
                        <div class="action-group">
                            <a href="{{ route('paket.edit', $item->id) }}" class="btn-action btn-edit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19.67 2.61c-.81-.81-2.14-.81-2.95 0L3.38 15.95c-.13.13-.22.29-.26.46l-1.09 4.34c-.08.34.01.7.26.95.19.19.45.29.71.29.08 0 .16 0 .24-.03l4.34-1.09c.18-.04.34-.13.46-.26L21.38 7.27c.81-.81.81-2.14 0-2.95L19.66 2.6ZM6.83 19.01l-2.46.61.61-2.46 9.96-9.94 1.84 1.84zM19.98 5.86 18.2 7.64 16.36 5.8l1.78-1.78s.09-.03.12 0l1.72 1.72s.03.09 0 .12"/>
                                </svg>
                            </a>
                            <form action="{{ route('paket.destroy', $item->id) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus paket ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-action btn-delete">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M17 6V4c0-1.1-.9-2-2-2H9c-1.1 0-2 .9-2 2v2H2v2h2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V8h2V6zM9 4h6v2H9zM6 20V8h12v12z"/>
                                        <path d="M9 10h2v8H9zm4 0h2v8h-2z"/>
                                    </svg>
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

@push('scripts')
<script>
    $('#tablePaket').DataTable({
        language: { url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json' },
        columnDefs: [{ orderable: false, targets: [0, 4] }]
    });
</script>
@endpush
