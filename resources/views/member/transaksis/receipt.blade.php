@extends('layouts.member')

@section('title')
    Struk Transaksi
@endsection

@section('content')
    <div class="content">
        <div class="receipt-wrapper">
            <div class="receipt-header">
                <div class="receipt-logo">GYM TRIDENT</div>
                <h2>BUKTI PEMBAYARAN</h2>
                <p class="receipt-id">#TRX-{{ str_pad($transaksi->id, 6, '0', STR_PAD_LEFT) }}</p>
                <span class="badge active">APPROVED</span>
            </div>
            <div class="receipt-divider"></div>
            <div class="receipt-section">
                <h4>Informasi Member</h4>
                <div class="receipt-row">
                    <span class="label">ID Member</span>
                    <span class="value">#{{ str_pad($transaksi->member_id, 5, '0', STR_PAD_LEFT) }}</span>
                </div>
                <div class="receipt-row">
                    <span class="label">Nama Member</span>
                    <span class="value">{{ auth()->user()->name }}</span>
                </div>
                <div class="receipt-row">
                    <span class="label">Tanggal Transaksi</span>
                    <span class="value">{{ $transaksi->created_at->format('d M Y, H:i') }}</span>
                </div>
            </div>
            <div class="receipt-divider dashed"></div>
            <div class="receipt-section">
                <h4>Paket Gym</h4>
                <div class="receipt-row">
                    <span class="label">ID Paket</span>
                    <span class="value">#{{ str_pad($transaksi->paket_id, 5, '0', STR_PAD_LEFT) }}</span>
                </div>
                <div class="receipt-row">
                    <span class="label">Nama Paket</span>
                    <span class="value">{{ $transaksi->paket->nama_paket }}</span>
                </div>
                <div class="receipt-row">
                    <span class="label">Harga Paket</span>
                    <span class="value">Rp {{ number_format($transaksi->paket->harga, 0, ',', '.') }}</span>
                </div>
            </div>
            @if ($transaksi->pt)
                <div class="receipt-divider dashed"></div>
                <div class="receipt-section">
                    <h4>Personal Trainer</h4>
                    <div class="receipt-row">
                        <span class="label">ID PT</span>
                        <span class="value">#{{ str_pad($transaksi->pt->id, 5, '0', STR_PAD_LEFT) }}</span>
                    </div>
                    <div class="receipt-row">
                        <span class="label">Nama PT</span>
                        <span class="value">{{ $transaksi->pt->user->name }}</span>
                    </div>
                </div>
            @endif
            <div class="receipt-divider"></div>
            <div class="receipt-total">
                <span>TOTAL PEMBAYARAN</span>
                <span class="total-amount">Rp {{ number_format($transaksi->total_bayar, 0, ',', '.') }}</span>
            </div>
            <div class="receipt-divider dashed"></div>
            <div class="receipt-footer">
                <p>Terima kasih telah mempercayai layanan kami.</p>
                <p>Masa berlaku s/d:
                    <strong>{{ $transaksi->expired_at ? \Carbon\Carbon::parse($transaksi->expired_at)->format('d M Y') : '-' }}</strong>
                </p>
            </div>

            <div class="receipt-actions">
                <a href="{{ route('transaksi.index') }}" class="btn-action btn-edit">← Kembali</a>
                <button onclick="window.print()" class="btn-action btn-print">🖨️ Cetak Struk</button>
            </div>

        </div>
    </div>
@endsection
