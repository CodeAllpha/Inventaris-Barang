@extends('layouts.main')
@section('page-content')
    Pegawai
@endsection
@section('daftar-content')
    Pegawai
@endsection
@section('title')
    Pegawai Update
@endsection

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <strong>Update Pegawai</strong>
        </div>
        <div class="card-body card-block ">
            <form action="{{ route('pegawai.update',$pegawai->id) }}" method="PUT">
            @csrf
            <div class="form-group">
                <label for="nama_pegawai" class="form-control-label text-uppercase opacity-7">Nama Pegawai</label>
                <input  type="text"
                        name="nama_pegawai"
                        value="{{old('nama_pegawai') ? old('nama_pegawai') : $pegawai->nama_pegawai}}"
                        class="form-control @error('nama_pegawai') is-invalid @enderror" placeholder="Masukan Nama Petugas...."/>
                        @error('nama_pegawai') <div class="text-muted">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="username" class="form-control-label text-uppercase opacity-7">Username</label>
                <input  type="text"
                        name="username"
                        value="{{old('username') ? old('username') : $pegawai->username}}"
                        class="form-control @error('username') is-invalid @enderror" placeholder="Masukan Username...."/>
                        @error('username') <div class="text-muted">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="nip" class="form-control-label text-uppercase opacity-7">Nip</label>
                <input  type="text"
                        name="nip"
                        value="{{old('nip') ? old('nip') : $pegawai->nip}}"
                        class="form-control @error('nip') is-invalid @enderror" placeholder="Masukan Nip...."/>
                        @error('nip') <div class="text-muted">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="alamat" class="form-control-label text-uppercase opacity-7">Alamat</label>
                <textarea name="alamat" 
                class="ckeditor form-control @error('alamat') is-invalid @enderror">
                {{old('alamat') ? old('alamat') : $pegawai->alamat}}
                </textarea>
                @error('alamat') <div class="text-muted">{{$message}}</div> @enderror
            </div>

            <div class="form-group">
                <label for="password" class="form-control-label text-uppercase opacity-7">Password</label>
                <input  type="password"
                        name="password"
                       
                        class="form-control @error('password') is-invalid @enderror" placeholder="Masukan Password.."/>
                        @error('password') <div class="text-muted">{{ $message }}</div> @enderror
            </div>
            <div class="form-group d-grid ">
                <button type="submit" class="btn btn-primary ">
                    Update Pegawai
                </button>
            </div>
            </form>
        </div>
    </div>
   </div>
@endsection