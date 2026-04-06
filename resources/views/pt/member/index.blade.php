@extends('layouts.pt')

@section('title')
    Member GYM
@endsection

@section('content')
    <div class="content">
        <div class="table-wrapper">
            <div class="table-title">
                <h2>Data Member GYM</h2>
            </div>

            <table class="custom-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Paket GYM</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($members as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->member->name }}</td>
                            <td>{{ $item->paket->nama_paket }}</td>
                            <td>{{ $item->member->address ?? 'Belum di-set' }}</td>
                            <td>{{ $item->member->phone ?? 'Belum di-set' }}</td> 
                            <td>
                                @if ($item->status === 'active')
                                    <span class="badge active">Active</span>
                                @else
                                    <span class="badge expired">Expired</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada member yang memilih Anda.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
