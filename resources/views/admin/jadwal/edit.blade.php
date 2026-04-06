@extends('layouts.admin')

@section('title')
    Edit Jadwal
@endsection

@section('content')
    <div class="content">
        <div class="table-wrapper">
            <div class="table-title">
                <h2>Edit Jadwal</h2>
            </div>

            <form action="{{ route('admin.jadwal.update', $jadwal->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Hari</label>
                    @php
                        $hariDipilih = explode(',', $jadwal->hari);
                        $hariList = ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'];
                    @endphp
                    @foreach ($hariList as $hari)
                        <label>
                            <input type="checkbox" name="hari[]" value="{{ $hari }}"
                                {{ in_array($hari, $hariDipilih) ? 'checked' : '' }}>
                            {{ $hari }}
                        </label>
                    @endforeach
                    @error('hari')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Jam</label>
                    <input type="time" name="jam" value="{{ $jadwal->jam }}" class="form-control">
                    @error('jam')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn-add">Simpan</button>
                <a href="{{ route('admin.jadwal.index') }}" class="btn-action">Batal</a>
            </form>
        </div>
    </div>
@endsection
