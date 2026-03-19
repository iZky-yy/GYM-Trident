@extends('layouts.member')

@section('title')
    Transaksi Saya
@endsection
@section('content')
    <div class="content">
        <div class="table-wrapper">
            <div class="table-title">
                <h2>Riwayat Transaksi</h2>
            </div>
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Paket</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->paket->nama_paket }}</td>
                            <td>Rp {{ number_format($item->total_bayar, 0, ',', '.') }}</td>
                            <td>
                                <span
                                    class="badge
                            {{ $item->status == 'approved' ? 'active' : '' }}
                            {{ $item->status == 'rejected' ? 'expired' : '' }}">
                                    {{ $item->status }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('transaksi.show', $item->id) }}" class="btn-action btn-edit">
                                    Bayar
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>
@endsection
