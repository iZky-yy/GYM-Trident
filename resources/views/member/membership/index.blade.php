@extends('layouts.app')

@section('content')

<div class="container">

<h2>Data Membership</h2>

<a href="{{ route('membership.create') }}" class="btn btn-primary mb-3">
Tambah Membership
</a>

@if(session('success'))
<div class="alert alert-success">
{{ session('success') }}
</div>
@endif

<table class="table table-bordered">
<thead>
<tr>
<th>No</th>
<th>Member</th>
<th>Paket</th>
<th>Personal Trainer</th>
<th>Tanggal Mulai</th>
<th>Tanggal Akhir</th>
<th>Status</th>
<th>Aksi</th>
</tr>
</thead>

<tbody>

@foreach($memberships as $key => $m)

<tr>
<td>{{ $key+1 }}</td>

<td>{{ $m->member->name }}</td>

<td>{{ $m->paket->nama_paket }}</td>

<td>{{ $m->pt->user->name }}</td>

<td>{{ $m->tanggal_mulai }}</td>

<td>{{ $m->tanggal_akhir }}</td>

<td>{{ $m->status }}</td>

<td>

<a href="{{ route('membership.edit',$m->id) }}" class="btn btn-warning btn-sm">
Edit
</a>

<form action="{{ route('membership.destroy',$m->id) }}" method="POST" style="display:inline">
@csrf
@method('DELETE')

<button class="btn btn-danger btn-sm">
Hapus
</button>

</form>

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

@endsection
