@extends('layouts.admin')

@section('title', 'Data Transaksi')

@section('content')
<div class="content">
    <div class="table-wrapper">
        <div class="table-title">
            <h2>Data Transaksi Member</h2>
        </div>
        <table class="custom-table" id="tableTransaksi">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Member</th>
                    <th>Paket</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Bukti</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $t)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $t->member->name }}</td>
                    <td>{{ $t->paket->nama_paket }}</td>
                    <td>Rp {{ number_format($t->total_bayar, 0, ',', '.') }}</td>
                    <td>
                        @php
                            $badgeClass = match($t->status) {
                                'approved' => 'active',
                                'rejected', 'expired' => 'expired',
                                default => ''
                            };
                        @endphp
                        <span class="badge {{ $badgeClass }}">{{ ucfirst($t->status) }}</span>
                    </td>
                    <td>
                        @if ($t->bukti_pembayaran)
                            <a href="{{ asset('storage/' . $t->bukti_pembayaran) }}" target="_blank"
                                class="btn-action btn-edit">Lihat</a>
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @if ($t->status == 'pending')
                        <div class="action-group">
                            <form action="{{ route('admin.transaksi.approve', $t->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn-action btn-edit">Approve</button>
                            </form>
                            <form action="{{ route('admin.transaksi.reject', $t->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn-action btn-delete">Reject</button>
                            </form>
                        </div>
                        @endif
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
    $('#tableTransaksi').DataTable({
        language: { url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json' },
        columnDefs: [{ orderable: false, targets: [0, 5, 6] }],
        order: [[0, 'asc']]
    });
</script>
@endpush
