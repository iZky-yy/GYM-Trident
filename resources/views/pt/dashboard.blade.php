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
                        {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                    </div>
                </a>
            </div>
        </header>
    </main>
@endsection
