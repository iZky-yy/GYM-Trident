@extends('layouts.app')

@section('content')

<div class="container">

<h2>Tambah Membership</h2>

<form action="{{ route('membership.store') }}" method="POST">

@csrf

<div class="mb-3">
<label>Member</label>
<select name="member_id" class="form-control">

@foreach($members as $m)
<option value="{{ $m->id }}">
{{ $m->name }}
</option>
@endforeach

</select>
</div>

<div class="mb-3">
<label>Paket Gym</label>

<select name="paket_id" class="form-control">

@foreach($pakets as $p)
<option value="{{ $p->id }}">
{{ $p->nama_paket }}
</option>
@endforeach

</select>

</div>

<div class="mb-3">
<label>Personal Trainer</label>

<select name="personal_trainer_id" class="form-control">

@foreach($pts as $pt)

<option value="{{ $pt->id }}">
{{ $pt->user->name }}
</option>

@endforeach

</select>

</div>

<div class="mb-3">
<label>Tanggal Mulai</label>

<input type="date" name="tanggal_mulai" class="form-control">

</div>

<div class="mb-3">
<label>Tanggal Akhir</label>

<input type="date" name="tanggal_akhir" class="form-control">

</div>

<button class="btn btn-success">
Simpan
</button>

</form>

</div>

@endsection
