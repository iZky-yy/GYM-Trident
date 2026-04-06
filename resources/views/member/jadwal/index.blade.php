@extends('layouts.member')

@section('title')
    Jadwal PT Saya
@endsection

@section('content')
    <div class="content">
        <div class="table-wrapper">
            <div class="table-title">
                <h2>
                    Jadwal PT:
                    {{ $pt ? $pt->user->name : 'Belum memilih PT' }}
                </h2>
            </div>

            @if (!$membership)
                <p class="text-center">Anda belum memiliki membership aktif.</p>
            @elseif (!$membership->personal_trainer_id)
                <p class="text-center">Membership Anda tidak menggunakan Personal Trainer.</p>
            @else
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Hari</th>
                            <th>Jam</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($jadwal as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->hari }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->jam)->format('H:i') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">
                                    PT Anda belum menambahkan jadwal.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
