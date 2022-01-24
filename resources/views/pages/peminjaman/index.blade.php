@extends('layouts.main')
@section('page-content')
Peminjaman
@endsection
@section('daftar-content')
Daftar Barang
@endsection
@section('title')
Peminjaman
@endsection

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <form action="?" method="GET">
                <div class="input-group" style="max-width: 30%">
                <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                <input type="text" class="form-control" placeholder="Cari Barang..." required name="search" id="search" value="{{ request()->search }}">
                  </div>
            </form>
        </div>
        <div class="card-body card-block ">
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-dark text-xs font-weight-bolder opacity-7">Nama Barang</th>
                        <th class="text-uppercase text-dark text-xs font-weight-bolder opacity-7 ps-2">Ruang</th>
                        <th class="text-uppercase text-dark text-xs font-weight-bolder opacity-7 ps-2">Kondisi</th>
                        <th class="text-uppercase text-dark text-xs font-weight-bolder opacity-7 ps-2">Keterangan</th>
                        <th class="text-dark opacity-7"></th>
                      </tr>
                    </thead>
                    <tbody>
                     @forelse ($inventaris as $pinjam)
                     <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                           
                            <div>
                              <img src="{{ Storage::url($pinjam->photo_barang) }}" class="avatar avatar-sm me-3">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">{{ $pinjam->nama }}</h6>
                              <p class="text-xs text-secondary mb-0">{{ $pinjam->jenis->nama_jenis }}</p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-sm font-weight-bold mb-0">{{ $pinjam->ruang->nama_ruang }}</p>
                          {{-- <p class="text-xs text-secondary mb-0">Petugas : {{ $pinjam->petugas->nama_petugas }}</p> --}}
                          <p class="text-xs text-secondary mb-0">Kode Ruang : {{ $pinjam->ruang->kode_ruang }}</p>
                          
                        </td>
                        <td>
                            <p class="text-sm font-weight-bold mb-0">{{ $pinjam->kondisi }}</p>
                            <p class="text-xs text-secondary mb-0">Jumlah Barang {{ $pinjam->jumlah }}</p>
                        </td>
                        <td>
                            <p class="text-sm font-weight-bold mb-0">{{ $pinjam->keterangan }}</p>
                            <p class="text-xs text-secondary mb-0">Kode Barang {{ $pinjam->kode_inventaris }}</p>
                           
                        </td>
                        <td class="align-middle">
                          <a href="#peminjamancreate" data-toggle="modal"
                             data-target="#peminjamancreate" class="text-dark font-weight-bold text-xs" data-toggle="tooltip">
                            <i class="fas fa-newspaper me-2"></i>Pinjam Barang
                          </a>
                        </td>
                        {{-- <td class="align-middle">
                          <a href="{{ route('peminjaman.store',$pinjam->id) }}" 
                           class="text-dark font-weight-bold text-xs" data-toggle="tooltip">
                            <i class="fas fa-newspaper me-2"></i>Pinjam Barang
                          </a>
                        </td> --}}
                      </tr>
                    
                    </tbody>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-5" >
                            Data Tidak Ada
                        </td>
                    </tr>
                    @endforelse
                  </table>
                </div>
              </div>
        </div>
    </div>
   </div>


{{-- Create Peminjaman Barang Modal --}}
<div class="modal fade" id="peminjamancreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Pinjam Barang</h5>
        <h5 type="button" class="close" data-dismiss="modal" aria-label="Close" >
          <span aria-hidden="true">&times;</span>
        </h5>
      </h5>
      </div>
      <div class="modal-body">
          <form action="# method="POST">
              @csrf
              @foreach ($inventaris as $item)
              <div class="form-group">
                <label for="disabledTextInput"class="form-control-label text-uppercase opacity-7">
                Nama Barang</label>
                <input type="text" disabled id="disabledTextInput" class="form-control" placeholder="{{ $item->nama }}">
              </div>
              @endforeach
               <div class="form-group">
              <label for="jumlah_pinjam" class="form-control-label text-uppercase opacity-7">Jumlah Pinjam</label>
              <input  type="text"
                      name="jumlah_pinjam"
                      value="{{ old('jumlah_pinjam') }}"
                      class="form-control @error('jumlah_pinjam') is-invalid @enderror" placeholder="Masukan Jumlah Pinjam..">
                      @error('jumlah_pinjam') <div class="text-muted">{{ $message }}</div> @enderror
              </div>
              {{-- <div class="form-group">
              <label for="tanggal_kembali" class="form-control-label text-uppercase opacity-7">Lama Peminjaman</label>
              <input  type="text"
                      name="tanggal_kembali"
                      value="{{ old('tanggal_kembali') }}"
                      class="form-control @error('tanggal_kembali') is-invalid @enderror" placeholder="Masukan Lama Peminjaman..">
                      @error('tanggal_kembali') <div class="text-muted">{{ $message }}</div> @enderror
              </div> --}}


              <div class="form-group d-grid py-2 ">
                  <button type="submit" class="btn btn-primary ">
                      Pinjam Barang
                  </button>
              </div>
          </form>        
  </div>
  </div>
</div>
</div>
@endsection


