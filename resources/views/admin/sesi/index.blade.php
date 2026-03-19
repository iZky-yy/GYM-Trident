@extends('layouts.admin')

@section('content')
<div class="content">
    <div class="table-wrapper">
        <div class="table-title">
            <h2>Jadwal Sesi PT</h2>
        </div>
        <table class="custom-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Member</th>
                    <th>PT</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sesis as $s)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $s->member->name }}</td>
                    <td>{{ $s->pt->name }}</td>
                    <td>{{ $s->tanggal }}</td>
                    <td>{{ $s->jam }}</td>
                    <td>{{ $s->status }}</td>
                    <td>
                        <a href="{{ route('sesi.edit',$s->id) }}" class="btn-action btn-edit">Edit</a>
                        <form action="{{ route('sesi.destroy',$s->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button class="btn-action btn-delete">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
