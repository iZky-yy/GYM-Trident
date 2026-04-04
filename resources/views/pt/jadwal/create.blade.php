@extends('layouts.pt')

@section('title')
    Tambah Jadwal
@endsection

@section('content')
    <div class="content">
        <div class="form-container">
            <h2 class="form-title">Tambah Jadwal</h2>
            <form action="{{ route('pt.jadwal.store') }}" method="POST">
                @csrf
                <label>Hari</label><br>
                @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $hari)
                    <label>
                        <input type="checkbox" name="hari[]" value="{{ $hari }}">
                        {{ $hari }}
                    </label>
                @endforeach
                <br><br>
                <label>Jam</label>
                <input type="time" name="jam" required>
                <br><br>
                <button type="submit">Simpan</button>
            </form>
        </div>
    </div>
@endsection
