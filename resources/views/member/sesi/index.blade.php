@extends('layouts.member')

@section('content')
<div class="content">
    <div class="table-wrapper">
        <div class="table-title">
            <h2>Jadwal Latihan Saya</h2>
        </div>
        <table class="custom-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>PT</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sesis as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->pt->name }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->jam }}</td>
                    <td>{{ $item->status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
