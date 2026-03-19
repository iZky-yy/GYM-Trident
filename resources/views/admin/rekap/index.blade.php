@extends('layouts.admin')

@section('title')
    Rekap GYM
@endsection

@section('content')
    <div class="content">
        <h1 class="rekap-title">Rekap GYM</h1>
        <!-- FILTER TANGGAL -->
        <div class="filter-box">
            <form method="GET" action="/admin/rekap" class="filter-form">
                <input type="date" name="tgl_mulai" value="{{ request('tgl_mulai') }}" class="filter-input">
                <input type="date" name="tgl_selesai" value="{{ request('tgl_selesai') }}" class="filter-input">
                <button type="submit" class="filter-btn">
                    Tampilkan Data
                </button>
            </form>
        </div>
        <!-- MEMBER -->
        @if($member->count())
        <div class="table-wrapper">
            <h2 class="section-title">Member GYM</h2>
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Tanggal Lahir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($member as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->address ?? 'Belum di-set' }}</td>
                            <td>{{ $item->phone ?? 'Belum di-set' }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->birthday)->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
        <!-- PT -->
        <div class="table-wrapper">
            <h2 class="section-title">Personal Trainer</h2>
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Spesialisasi</th>
                        <th>Tarif / Sesi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pts as $pt)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pt->user->name }}</td>
                            <td>{{ $pt->spesialisasi }}</td>
                            <td>Rp {{ number_format($pt->tarif_per_sesi) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- PAKET -->
        <div class="table-wrapper">
            <h2 class="section-title">Paket GYM</h2>
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Paket</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pakets as $paket)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $paket->nama_paket }}</td>
                            <td>Rp {{ number_format($paket->harga) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- MEMBERSHIP -->
        @if ($memberships->count())
        <div class="table-wrapper">
            <h2 class="section-title">Membership</h2>
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Member</th>
                        <th>Paket</th>
                        <th>Personal Trainer</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Akhir</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($memberships as $key => $m)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $m->member->name }}</td>
                            <td>{{ $m->paket->nama_paket }}</td>
                            <td>{{ $m->pt->user->name ?? 'Tanpa PT' }}</td>
                            <td>{{ $m->tanggal_mulai }}</td>
                            <td>{{ $m->tanggal_akhir }}</td>
                            <td>
                                @if ($m->status == 'active')
                                    <span class="badge active">Active</span>
                                @else
                                    <span class="badge expired">Expired</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
        <!-- TRANSAKSI -->
        @if ($transaksi->count())
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
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi as $key=>$t)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $t->member->name }}</td>
                            <td>{{ $t->paket->nama_paket }}</td>
                            <td>Rp {{ number_format($t->total_bayar, 0, ',', '.') }}</td>
                            <td>
                                <span
                                    class="badge
                            {{ $t->status == 'approved' ? 'active' : '' }}
                            {{ $t->status == 'rejected' || $t->status == 'expired' ? 'expired' : '' }}">
                                    {{ $t->status }}
                                </span>
                            </td>
                            <td>
                                @if ($t->bukti_pembayaran)
                                    <a href="{{ asset('storage/' . $t->bukti_pembayaran) }}" target="_blank"
                                        class="btn-action btn-edit">
                                        Lihat
                                    </a>
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
@endsection
