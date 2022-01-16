@extends('layouts.main')
@section('page-content')
    Inventaris
@endsection
@section('title')
    Daftar Inventaris
@endsection
@section('daftar-content')
    Daftar Inventaris
@endsection

@section('content')


<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <strong>Update Barang</strong>
        </div>
        <div class="card-body card-block ">
            <form action="{{ route('inventaris.update',$inventaris->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="nama" class="form-control-label text-uppercase opacity-7">Nama Jenis</label>
                    <input  type="text"
                            name="nama"
                            value="{{old('nama') ? old('nama') : $inventaris->nama}}"
                            class="form-control @error('nama') is-invalid @enderror" placeholder="Masukan Nama Jenis...."/>
                            @error('nama') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="kode_inventaris" class="form-control-label text-uppercase opacity-7">Kode Inventaris</label>
                    <input  type="text"
                            name="kode_inventaris"
                            value="{{old('kode_inventaris') ? old('kode_inventaris') : $inventaris->kode_inventaris}}"
                            class="form-control @error('kode_inventaris') is-invalid @enderror" placeholder="Masukan Kode Jenis...."/>
                            @error('kode_inventaris') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="jumlah" class="form-control-label text-uppercase opacity-7">jumlah</label>
                    <input  type="text"
                            name="jumlah"
                            value="{{old('jumlah') ? old('jumlah') : $inventaris->jumlah}}"
                            class="form-control @error('jumlah') is-invalid @enderror" placeholder="Masukan Keterangan..">
                            @error('jumlah') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="kondisi" class="form-control-label text-uppercase opacity-7">kondisi</label>
                    <input  type="text"
                            name="kondisi"
                            value="{{old('kondisi') ? old('kondisi') : $inventaris->kondisi}}"
                            class="form-control @error('kondisi') is-invalid @enderror" placeholder="Masukan Kondisi..">
                            @error('kondisi') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="tanggal_register" class="form-control-label text-uppercase opacity-7">tanggal_register</label>
                    <input  type="date"
                            name="tanggal_register"
                            value="{{old('tanggal_register') ? old('tanggal_register') : $inventaris->tanggal_register}}"
                            class="form-control @error('tanggal_register') is-invalid @enderror" placeholder="Masukan Keterangan..">
                            @error('tanggal_register') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
            
                <div class="form-group">
                    <label for="keterangan" class="form-control-label text-uppercase opacity-7">keterangan</label>
                    <input  type="text"
                            name="keterangan"
                            value="{{old('keterangan') ? old('keterangan') : $inventaris->keterangan}}"
                            class="form-control @error('keterangan') is-invalid @enderror" placeholder="Masukan Keterangan">
                            @error('keterangan') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                
            
                <div class="form-group">
                    <label for="id_jenis" class="form-control-label text-uppercase opacity-7">Jenis</label>
                    <select name="id_jenis" required class="form-control" @error('id_jenis') is-invalid @enderror>
                        <option value="" disabled selected >Pilih Jenis.>> </option>
                            @foreach ($jenis as $jenis )
                            <option value="{{ $jenis->id }}" {{ $jenis->id == $inventaris->jenis->id ? 'selected':'' }}>{{ $jenis->nama_jenis }}</option>
                            @endforeach
                            
                    </select>
                </div>
            
                <div class="form-group">
                    <label for="id_ruang" class="form-control-label text-uppercase opacity-7">Ruang</label>
                    <select name="id_ruang" required class="form-control" @error('id_ruang') is-invalid @enderror>
                        <option value="" disabled selected >Pilih Ruang.>> </option>
                        @foreach ($ruang as $ruang)
                            <option value="{{ $ruang->id }}" {{ $ruang->id == $inventaris->ruang->id ? 'selected' :'' }}>{{ $ruang->nama_ruang }}</option>
                        @endforeach
                    </select>
                </div>
            
                <div class="form-group">
                    <label for="id_petugas" class="form-control-label text-uppercase opacity-7">Petugas</label>
                    <select name="id_petugas" required class="form-control" @error('id_petugas') is-invalid @enderror>
                        <option value="" disabled selected >Pilih Petugas.>> </option>
                        @foreach ($petugas as $petugas)
                            <option value="{{ $petugas->id }}"{{ $petugas->id == $inventaris->petugas->id ? 'selected' : '' }}>{{ $petugas->nama_petugas }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="photo_barang" class="form-control-label text-uppercase opacity-7">Photo Barang</label>
                    <input 
                    value="photo_barang"
                    type="file" class="form-control" name="photo_barang" placeholder="Masukan Photo Barang" class="form-control">
                </div>

                <div class="form-group d-grid py-2 ">
                    <button type="submit" class="btn btn-primary ">
                        Update Jenis
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
        </div>
    </div>
   </div>
@endsection