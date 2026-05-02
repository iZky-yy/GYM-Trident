@extends('layouts.pt')

@section('content')
    <main class="content">
        <header class="top-header">
            <div class="welcome">
                <h1>Welcome Back {{ Auth::user()->role }}, <span>{{ Auth::user()->name }}</span></h1>
                <p>Here's what's happening today.</p>
            </div>
            <div class="user-profile">
                <div class="user-info">
                    <p class="user-name">{{ Auth::user()->name }}</p>
                    <p class="user-status">Online</p>
                </div>
                <a href="{{ route('profile.index') }}">
                    <div class="user-avatar">
                        @if (Auth::user()->photo)
                            <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="foto profil"
                                style="width:100%; height:100%; object-fit:cover; border-radius:inherit;">
                        @else
                            {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                        @endif
                    </div>
                </a>
            </div>
        </header>
        <div class="stats-container">
            <div class="stat-box">
                <p class="stat-label">MEMBER</p>
                <h2 class="stat-value">{{ $totalAssignedMembers }}</h2>
                <p class="stat-trend">Assigned Member</p>
            </div>
            <div class="stat-box">
                <p class="stat-label">Revenue</p>
                <h2 class="stat-value">Rp {{ number_format($revenue, 0, ',', '.') }}</h2>
                <p class="stat-trend green">Daily Revenue</p>
            </div>
        </div>
        <div class="table-section">
            <div class="table-header">
                <h3>Assigned Members</h3>
            </div>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Member</th>
                        <th>Paket Gym</th>
                        <th>Alamat</th>
                        <th>Tanggal Lahir</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($memberships as $key => $m)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $m->member->name }}</td>
                            <td>{{ $m->paket->nama_paket }}</td>
                            <td>{{ $m->member->address ?? '-' }}</td>
                            <td>{{ $m->member->birthday ? $m->member->birthday->format('d M Y') : '-' }}</td>
                            <td>
                                @if ($m->status == 'active')
                                    <span class="badge active">Active</span>
                                @else
                                    <span class="badge expired">Expired</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align:center;">Belum ada member yang assign ke PT ini.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
@endsection
