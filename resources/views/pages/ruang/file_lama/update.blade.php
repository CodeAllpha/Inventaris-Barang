@extends('layouts.main')
@section('page-content')
    Ruang
@endsection
@section('daftar-content')
    Ruang
@endsection
@section('title')
    Ruang Update
@endsection

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <strong>Update Ruang</strong>
        </div>
        <div class="card-body card-block ">
            <form action="{{ route('ruang.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_ruang" class="form-control-label text-uppercase opacity-7">Nama Ruang</label>
                <input  type="text"
                        name="nama_ruang"
                        value="{{old('nama_ruang') ? old('nama_ruang') : $ruang->nama_ruang}}"
                        class="form-control @error('nama_ruang') is-invalid @enderror" placeholder="Masukan Nama Ruang...."/>
                        @error('nama_jenis') <div class="text-muted">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="kode_ruang" class="form-control-label text-uppercase opacity-7">Kode Ruang</label>
                <input  type="text"
                        name="kode_ruang"
                        value="{{old('kode_ruang') ? old('kode_ruang') : $ruang->kode_ruang}}"
                        class="form-control @error('kode_ruang') is-invalid @enderror" placeholder="Masukan Kode Ruang...."/>
                        @error('kode_ruang') <div class="text-muted">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="keterangan" class="form-control-label text-uppercase opacity-7">Keterangan</label>
                <input  type="text"
                        value="{{old('keterangan') ? old('keterangan') : $ruang->keterangan}}"
                        name="keterangan"
                        class="form-control @error('keterangan') is-invalid @enderror" placeholder="Masukan Keterangan..">
                        @error('keterangan') <div class="text-muted">{{ $message }}</div> @enderror
            </div>
            <div class="form-group d-grid py-2 ">
                <button type="submit" class="btn btn-primary ">
                    Update Ruang
                </button>
            </div>
            </form>
        </div>
    </div>
   </div>
@endsection