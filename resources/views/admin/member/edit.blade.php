@extends('layouts.admin')
@section('title')
    Tambah Member GYM
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <form class="row g-3" action="{{ route('member.update', $member->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div>
                    <label for="name" class="form-label">Nama</label>
                    <input type="string" id="name" name="name" placeholder="Ex : Rizky" class="form-control" value="{{$member->name}}">
                    <div style="color: red">
                        @error('name')
                            {{$message}}
                        @enderror
                    </div>
                </div>
                <div>
                    <label for="email" class="form-label">Email member</label>
                    <input type="email" id="email" name="email" placeholder="Ex : example@gmail.com" class="form-control" value="{{$member->email}}">
                    <div style="color: red">
                        @error('email')
                            {{$message}}
                        @enderror
                    </div>
                </div>
                <div>
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" placeholder="" class="form-control">
                    <div style="color: red">
                        @error('password')
                            {{$message}}
                        @enderror
                    </div>
                </div>
                <div>
                    <label for="address" class="form-label">Alamat</label>
                    <input type="string" id="address" name="address" placeholder="Palembang" class="form-control" value="{{$member->address}}">
                    <div style="color: red">
                        @error('address')
                            {{$message}}
                        @enderror
                    </div>
                </div>
                <div>
                    <label for="birthday" class="form-label">Tanggal Lahir</label>
                    <input type="date" id="birthday" name="birthday" placeholder="" class="form-control" value="{{old('birthday', $member->birthday)}}">
                    <div style="color: red">
                        @error('birthday')
                            {{$message}}
                        @enderror
                    </div>
                </div>
                <div>
                    <label for="phone" class="form-label">No. Telpon</label>
                    <input type="string" id="phone" name="phone" placeholder="" class="form-control" value="{{$member->phone}}">
                    <div style="color: red">
                        @error('phone')
                            {{$message}}
                        @enderror
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </div>
            </form>
        </div>
    </div>
@endsection
