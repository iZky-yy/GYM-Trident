@extends('layouts.pt')
@section('title')
Edit Jadwal
@endsection
@section('content')
<div class="content">
    <div class="form-container">
        <h2 class="form-title">Edit Jadwal</h2>
        <form action="{{ route('sesi.update', $sesi->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Member</label>
                <input type="text" class="form-input"
                    value="{{ $sesi->member->name }}" readonly>
            </div>

            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" name="tanggal" class="form-input"
                    value="{{ $sesi->tanggal }}">
            </div>

            <div class="form-group">
                <label>Jam</label>
                <input type="time" name="jam" class="form-input"
                    value="{{ $sesi->jam }}">
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-input">
                    <option value="scheduled" {{ $sesi->status == 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                    <option value="done" {{ $sesi->status == 'done' ? 'selected' : '' }}>Done</option>
                    <option value="cancel" {{ $sesi->status == 'cancel' ? 'selected' : '' }}>Cancel</option>
                </select>
            </div>

            <button class="btn-submit">Update</button>

        </form>
    </div>

</div>
@endsection
