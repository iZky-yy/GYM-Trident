@extends('layouts.pt')
@section('title')
    Edit Jadwal
@endsection
@section('content')
    <div class="content">
        <div class="form-container">
            <h2 class="form-title">Edit Jadwal</h2>
            <form action="{{ route('pt.sesi.update', $sesi->id) }}" method="POST">
                @csrf
                @method('PUT')
                <label>Hari</label><br>
                @php
                    $hariSelected = explode(',', $sesi->hari ?? '');
                @endphp
                @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $hari)
                    <label>
                        <input type="checkbox" name="hari[]" value="{{ $hari }}"
                            {{ in_array($hari, $hariSelected) ? 'checked' : '' }}>
                        {{ $hari }}
                    </label>
                @endforeach
                <br><br>
                <label>Jam</label>
                <input type="time" name="jam" value="{{ $sesi->jam }}">
                <br><br>
                <button type="submit">Simpan</button>
            </form>
        </div>

    </div>
@endsection
