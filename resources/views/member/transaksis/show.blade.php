@extends('layouts.member')

@section('title')
    Pembayaran
@endsection

@section('content')
<div class="content">

    <div class="form-container">
        <h2 class="form-title">Pembayaran Membership</h2>

        <div class="form-group">
            <label>Paket</label>
            <input type="text" class="form-input"
                value="{{ $transaksi->paket->nama_paket }}" readonly>
        </div>

        <div class="form-group">
            <label>Total Bayar</label>
            <input type="text" class="form-input"
                value="Rp {{ number_format($transaksi->total_bayar,0,',','.') }}" readonly>
        </div>

        <div class="form-group">
            <label>Status</label>
            <span class="badge
                {{ $transaksi->status == 'approved' ? 'active' : '' }}
                {{ $transaksi->status == 'expired' ? 'expired' : '' }}">
                {{ strtoupper($transaksi->status) }}
            </span>
        </div>

        <div class="form-group">
            <label>Batas Waktu Pembayaran</label>
            <div id="countdown" class="form-input"></div>
        </div>

        @if($transaksi->status == 'pending')
        <form action="{{ route('member.transaksi.upload', $transaksi->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Upload Bukti Pembayaran</label>
                <input type="file" name="bukti" class="form-input">
            </div>

            <button class="btn-submit">Upload & Kirim</button>
        </form>
        @endif

    </div>

</div>

<script>
let expiredAt = new Date("{{ $transaksi->expired_at }}").getTime();

let x = setInterval(function() {

    let now = new Date().getTime();
    let distance = expiredAt - now;

    if (distance < 0) {
        clearInterval(x);
        document.getElementById("countdown").innerHTML = "EXPIRED";
        location.reload();
        return;
    }

    let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    let seconds = Math.floor((distance % (1000 * 60)) / 1000);

    document.getElementById("countdown").innerHTML =
        hours + " jam " + minutes + " menit " + seconds + " detik";

}, 1000);
</script>
@endsection
