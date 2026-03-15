@extends('layouts.member')

@section('content')
    <main class="content">
        <header class="top-header">
            <div class="welcome">
                <h1>Welcome Back, <span>{{ Auth::user()->name }}</span></h1>
                <p>Here's what's happening today.</p>
            </div>
            <div class="user-profile">
                <div class="user-info">
                    <p class="user-name">{{ Auth::user()->name }}</p>
                    <p class="user-status">Online</p>
                </div>
                <div class="user-avatar">
                    {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                </div>
            </div>
        </header>

        {{-- <div class="stats-container">

            <div class="stat-box">
                <p class="stat-label">TOTAL MEMBERS</p>
                <h2 class="stat-value">{{ $totalMembers }}</h2>
                <p class="stat-trend">Registered Members</p>
            </div>

            <div class="stat-box">
                <p class="stat-label">ACTIVE TRAINERS</p>
                <h2 class="stat-value">{{ $activeTrainers }}</h2>
                <p class="stat-trend green">Personal Trainers</p>
            </div>

            <div class="stat-box">
                <p class="stat-label">MONTHLY REVENUE</p>
                <h2 class="stat-value">Rp0</h2>
                <p class="stat-trend">Transaksi</p>
            </div>

            <div class="stat-box">
                <p class="stat-label">ACTIVE SESSIONS</p>
                <h2 class="stat-value">{{ $activeSessions }}</h2>
                <p class="stat-trend green">Paket GYM</p>
            </div>

        </div>

        <div class="table-section">
            <div class="table-header">
                <h3>Recent Memberships</h3>
            </div>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Member</th>
                        <th>Paket</th>
                        <th>Personal Trainer</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Akhir</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($memberships as $key => $m)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $m->member->name }}</td>
                            <td>{{ $m->paket->nama_paket }}</td>
                            <td>{{ $m->pt->user->name }}</td>
                            <td>{{ $m->tanggal_mulai }}</td>
                            <td>{{ $m->tanggal_akhir }}</td>
                            <td>
                                @if ($m->status == 'aktif')
                                    <span class="badge active">Aktif</span>
                                @else
                                    <span class="badge expired">Expired</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div> --}}
    </main>
@endsection
