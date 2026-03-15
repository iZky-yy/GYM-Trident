@extends('layouts.member')

@section('title')
    Langganan Membership
@endsection
@section('content')
    <div class="content">
        <div class="form-container">
            <h2 class="form-title">Langganan Membership</h2>
            <form action="{{ route('membership.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Paket Gym</label>
                    <select name="paket_id" class="form-input">
                        @foreach ($pakets as $p)
                            <option value="{{ $p->id }}">
                                {{ $p->nama_paket }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Personal Trainer</label>
                    <select name="personal_trainer_id" class="form-input">
                        <option value="" selected disabled>
                            -- Pilih Personal Trainer --
                        </option>
                        @foreach ($pts as $pt)
                            <option value="{{ $pt->id }}">
                                {{ $pt->user->name }}
                            </option>
                        @endforeach

                    </select>
                </div>
                <button type="submit" class="btn-submit">
                    Tambah Data
                </button>
            </form>
        </div>
    </div>
@endsection
