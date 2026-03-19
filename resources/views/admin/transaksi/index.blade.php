@extends('layouts.admin')

@section('title')
Data Transaksi
@endsection

@section('content')
<div class="content">
    <div class="table-wrapper">
        <div class="table-title">
            <h2>Data Transaksi Member</h2>
        </div>
        <table class="custom-table">
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
                @foreach($transaksi as $t)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $t->member->name }}</td>
                    <td>{{ $t->paket->nama_paket }}</td>
                    <td>Rp {{ number_format($t->total_bayar,0,',','.') }}</td>
                    <td>
                        <span class="badge
                            {{ $t->status == 'approved' ? 'active' : '' }}
                            {{ $t->status == 'rejected' || $t->status == 'expired' ? 'expired' : '' }}">
                            {{ $t->status }}
                        </span>
                    </td>
                    <td>
                        @if($t->bukti_pembayaran)
                            <a href="{{ asset('storage/'.$t->bukti_pembayaran) }}" target="_blank" class="btn-action btn-edit">
                                Lihat
                            </a>
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @if($t->status == 'pending')
                        <form action="{{ route('admin.transaksi.approve',$t->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button class="btn-action btn-edit">Approve</button>
                        </form>
                        <form action="{{ route('admin.transaksi.reject',$t->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button class="btn-action btn-delete">Reject</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
