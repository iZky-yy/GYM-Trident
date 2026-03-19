@extends('layouts.member')

@section('content')
<div class="table-wrapper">
    <h2>Jadwal Saya</h2>

    <table class="custom-table">
        <thead>
            <tr>
                <th>PT</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sesi as $s)
            <tr>
                <td>{{ $s->pt->name }}</td>
                <td>{{ $s->tanggal }}</td>
                <td>{{ $s->jam }}</td>
                <td>{{ $s->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
