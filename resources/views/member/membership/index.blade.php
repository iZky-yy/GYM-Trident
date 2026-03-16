@extends('layouts.member')

@section('title')
    Langganan Membership
@endsection

@section('content')
    <div class="content">
        <div class="table-wrapper">
            <div class="table-title">
                <h2>Langganan Membership</h2>
                <a href="{{ route('membership.create') }}" class="btn-add">
                    + Langganan
                </a>
            </div>
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Paket</th>
                        <th>Personal Trainer</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Akhir</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($memberships as $key => $m)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $m->paket->nama_paket }}</td>
                            <td>{{ $m->pt?->user?->name ?? 'Tanpa PT' }}</td>
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
    </div>
@endsection
