@extends('layouts.' . auth()->user()->role)

@section('title')
    Train Guide
@endsection

@section('content')
    <div class="content">
        <div class="table-wrapper">
            <div class="table-title">
                <h2>Workout Categories</h2>
            </div>

            <div class="muscle-grid">
                @foreach ($muscles as $m)
                    <a href="{{ route('muscles.show', $m['name']) }}" class="muscle-card"
                        style="background:url('/images/{{ $m['image'] }}') center/cover">

                        <div class="overlay"></div>
                        <h2>{{ ucfirst($m['name']) }} Workout</h2>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
