@extends('layouts.member')

@section('title')
Edit Akun
@endsection
@section('content')
<div class="content">
    <div class="form-container">
        <h2 class="form-title">Tambah Member</h2>
            <form class="row g-3" action="{{ route('member.update', $member->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="name" placeholder="Ex : Rizky"
                    class="form-input" value="{{$member->name}}">
                <div class="form-error">
                    @error('name') {{ $message }} @enderror
                </div>
            </div>
            <div class="form-group">
                <label>Email Member</label>
                <input type="email" name="email" placeholder="Ex : example@gmail.com"
                    class="form-input" value="{{$member->email}}">
                <div class="form-error">
                    @error('email') {{ $message }} @enderror
                </div>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password"
                    class="form-input">
                <div class="form-error">
                    @error('password') {{ $message }} @enderror
                </div>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="address" placeholder="Palembang"
                    class="form-input" value="{{$member->address}}">
                <div class="form-error">
                    @error('address') {{ $message }} @enderror
                </div>
            </div>
            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" name="birthday"
                class="form-input" value="{{old('birthday', $member->birthday)}}">
                <div class="form-error">@error('birthday') {{ $message }} @enderror
                </div>
            </div>
            <div class="form-group">
                <label>No. Telepon</label>
                <input type="text" name="phone"
                    class="form-input" value="{{$member->phone}}">
                <div class="form-error">
                    @error('phone') {{ $message }} @enderror
                </div>
            </div>
            <button type="submit" class="btn-submit">
                Tambah Data
            </button>
        </form>
    </div>
</div>
@endsection
