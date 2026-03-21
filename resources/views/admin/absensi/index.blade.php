@extends('layouts.admin')

@section('title','Data Absensi')

@section('content')
<div class="content">

    <h2 class="section-title">Data Absensi</h2>
    <div class="filter-box">
        <form method="GET">
            <select name="role" class="form-input" onchange="this.form.submit()">
                <option value="">-- Semua Role --</option>
                <option value="admin" {{ $role=='admin'?'selected':'' }}>Admin</option>
                <option value="pt" {{ $role=='pt'?'selected':'' }}>PT</option>
                <option value="member" {{ $role=='member'?'selected':'' }}>Member</option>
            </select>
        </form>
    </div>
    <div class="table-wrapper">
        <table class="custom-table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Role</th>
                    <th>Waktu Masuk</th>
                </tr>
            </thead>
            <tbody>
                @forelse($absensi as $item)
                    <tr>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ strtoupper($item->role) }}</td>
                        <td>{{ $item->waktu_masuk }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Belum ada data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
