@extends('layouts.member')

@section('title')
    Membership GYM
@endsection

@section('content')
<div class="card mb-3">
    <div class="card-body">
        <h6 class="card-title">Data Membership GYM</h6>
    </div>

    <div class="card">
        <div class="card-body">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Member</th>
                        <th>Paket GYM</th>
                        <th>Harga</th>
                        <th>Durasi</th>
                        <th>Personal Trainer</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Akhir</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($memberships as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $item->member->name }}</td>

                        <td>{{ $item->paket->nama_paket }}</td>

                        <td>Rp {{ number_format($item->paket->harga) }}</td>

                        <td>
                            @if ($item->paket->durasi_hari % 30 == 0)
                                {{ $item->paket->durasi_hari / 30 }} Bulan
                            @else
                                {{ $item->paket->durasi_hari }} Hari
                            @endif
                        </td>

                        <td>{{ $item->pt->user->name }}</td>

                        <td>{{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d M Y') }}</td>

                        <td>{{ \Carbon\Carbon::parse($item->tanggal_akhir)->format('d M Y') }}</td>

                        <td>
                            @if ($item->status == 'active')
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Expired</span>
                            @endif
                        </td>

                        <td class="d-flex gap-2">
                            <a class="btn btn-warning btn-sm" href="{{ route('membership.edit',$item->id) }}">
                                <i class="bx bxs-edit"></i>
                            </a>

                            <form action="{{ route('membership.destroy',$item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">
                                    <i class="bx bxs-trash"></i>
                                </button>
                            </form>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>

            <a href="{{ route('membership.create') }}" class="btn btn-primary">
                Tambah Membership
            </a>

        </div>
    </div>
</div>
@endsection
