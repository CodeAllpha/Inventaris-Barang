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

<div class="container-fluid py-4">
<div class="row">
    <div class="col-12">
    <div class="card mb-4">
    <div class="card-header">
        <form action="?" method="GET">
            <div class="input-group" style="max-width: 30%">
            <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
            <input type="text" class="form-control" placeholder="Type here..." required name="search" id="search" value="{{ request()->search }}">
              </div>
        </form>
        <div class="input-group-append text-end" data-modal-type="type5" style="margin-top:-40px " >
            <a href="#inventariscreate" data-toggle="modal"
            data-target="#inventariscreate" data-title="Tambah Barang Baru" class="btn btn-primary mb-0"><i class="fas fa-plus"></i>&nbsp;Tambah Barang</a>
          </div> 
         
    </div>
    <div class="card-body px-0 pt-0 pb-2">
    <div class="table-responsive p-0" >
    <table class="table align-items-center mb-0">
    <thead>
        <tr>
        <th class="text-uppercase text-xs font-weight-bolder opacity-10">No</th>
        <th class="text-uppercase text-xs font-weight-bolder opacity-10 ps-2">Nama Barang</th>
        <th class="text-uppercase text-xs font-weight-bolder opacity-10 ps-2">Jenis Barang</th>
        <th class="text-uppercase text-xs font-weight-bolder opacity-10 ps-2">Ruang</th>
        <th class="text-uppercase text-xs font-weight-bolder opacity-10 ps-2">Jumlah</th>
        <th class="text-center text-uppercase text-xs font-weight-bolder opacity-10">Action</th>
        <th class="text-secondary opacity-7"></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($inventaris as $inven)
        <tr>
            <td>
                <div class="d-flex flex-column justify-content-center px-3">
                    <h6 class="mb-0 text-sm ">{{ $inven->id }}</h6>
                </div>
            </td>
            <td>
                <div class="d-flex flex-column">
                    <h6 class="mb-0 text-sm ">{{ $inven->nama }}</h6>
                </div>
            </td>
            <td>
                <div class="d-flex flex-column">
                    <h6 class="mb-0 text-sm ">{{ $inven->jenis->nama_jenis }}</h6>
                </div>
            </td>
            <td>
                <div class="d-flex flex-column">
                    <h6 class="mb-0 text-sm ">{{ $inven->ruang->nama_ruang }}</h6>
                </div>
            </td>
            <td>
                <div class="d-flex flex-column">
                    <h6 class="mb-0 text-sm ">{{ $inven->jumlah }}</h6>
                </div>
            </td>
            <td class="align-middle text-center">
                <a class="btn btn-link text-dark px-3 mb-0 edit" 
                data-toggle="modal"
                data-target="#inventarisupdate{{ $inven->id }}">
                <i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
            </td>
            {{-- <td class="align-middle text-center">
                <a href="{{ route('inventaris.edit',$inven->id) }}" class="btn btn-link text-dark px-3 mb-0 edit" >
                    <i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
            </td> --}}
            <td class="align-middle text-center">
                <a class="btn btn-link text-dark px-3 mb-0" href="#inventaris"
                data-remote="{{ route('inventaris.show',$inven->id) }}" data-toggle="modal" data-target="#inventaris"
                data-title="Barang Detail"><i class="fas fa-eye text-dark me-2" aria-hidden="true"></i>Show</a>
            </td>
            <td class="align-middle text-center">
                <a class="btn btn-link text-dark px-3 mb-0" href="#inventarisphoto"
                data-remote="{{ route('inventaris.photo',$inven->id) }}" data-toggle="modal" data-target="#inventarisphoto"
                data-title="Detail Photo Barang"><i class="fas fa-image text-dark me-2" aria-hidden="true"></i>Photo</a>
            </td>
            <td class="align-middle">
                <a class="btn btn-link text-danger text-gradient px-3 mb-0 " 
                data-target="#inventarisdelete{{ $inven->id }}" data-toggle="modal"><i class="far fa-trash-alt me-2"></i>Delete</a>
            </td>
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
    <div class="d-flex justify-content-end mb-1 mt-3 px-4">
        {{ $inventaris->links() }}
    </div>
    </div>
    </div>
</div>
</div>



{{-- Inventaris Create Form Modal --}}
<div class="modal fade" id="inventariscreate" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Barang Baru</h5>
          <h5 type="button" class="close" data-dismiss="modal" aria-label="Close" >
            <span aria-hidden="true">&times;</span>
          </h5>
        </h5>
        </div>
        <div class="modal-body">
            <form action="{{ route('inventaris.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama" class="form-control-label text-uppercase opacity-7">Nama Barang</label>
                    <input  type="text"
                            name="nama"
                            value="{{ old('nama') }}"
                            class="form-control @error('nama') is-invalid @enderror" placeholder="Masukan Nama Barang...."/>
                            @error('nama') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="kode_inventaris" class="form-control-label text-uppercase opacity-7">Kode Inventaris</label>
                    <input  type="text"
                            name="kode_inventaris"
                            value="{{ old('kode_inventaris') }}"
                            class="form-control @error('kode_inventaris') is-invalid @enderror" placeholder="Masukan Kode Inventaris...."/>
                            @error('kode_inventaris') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="jumlah" class="form-control-label text-uppercase opacity-7">Jumlah</label>
                    <input  type="text"
                            name="jumlah"
                            class="form-control @error('jumlah') is-invalid @enderror" placeholder="Masukan Jumlah..">
                            @error('jumlah') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                
                <div class="form-group">
                    <label for="kondisi" class="form-control-label text-uppercase opacity-7">Kondisi</label>
                    <input  type="text"
                            name="kondisi"
                            class="form-control @error('kondisi') is-invalid @enderror" placeholder="Masukan Kondisi Barang..">
                            @error('kondisi') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                
                <div class="form-group">
                    <label for="tanggal_register" class="form-control-label text-uppercase opacity-7">Tanggal Register</label>
                    <input  type="date"
                            name="tanggal_register"
                            class="form-control @error('tanggal_register') is-invalid @enderror" placeholder="Tanggal Register..">
                            @error('tanggal_register') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                
                <div class="form-group">
                    <label for="keterangan" class="form-control-label text-uppercase opacity-7">Keterangan</label>
                    <input  type="text"
                            name="keterangan"
                            class="form-control @error('keterangan') is-invalid @enderror" placeholder="Masukan Keterangan..">
                            @error('keterangan') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                
                <div class="form-group">
                    <label for="id_jenis" class="form-control-label text-uppercase opacity-7">Jenis</label>
                    <select  name="id_jenis" class="form-control @error('id_jenis') is-invalid @enderror">
                        <option value="" disabled selected >Pilih Jenis.>> </option>
                        @foreach ($jenis as $jenis)
                            <option value="{{ $jenis->id }}">{{ $jenis->nama_jenis }}</option>
                        @endforeach
                    </select>
                    @error('id_jenis') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                
                <div class="form-group">
                    <label for="id_ruang" class="form-control-label text-uppercase opacity-7">Ruang</label>
                    <select name="id_ruang"  class="form-control @error('id_ruang') is-invalid @enderror">
                        <option value="" disabled selected >Pilih Ruang.>> </option>
                        @foreach ($ruang as $ruang)
                            <option value="{{ $ruang->id }}">{{ $ruang->nama_ruang }}</option>
                        @endforeach
                    </select>
                    @error('id_ruang') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                
                <div class="form-group">
                    <label for="id_petugas" class="form-control-label text-uppercase opacity-7">Petugas</label>
                    <select name="id_petugas" class="form-control @error('id_petugas') is-invalid @enderror">
                        <option value="" disabled selected >Pilih Petugas.>> </option>
                        @foreach ($petugas as $petugas)
                            <option value="{{ $petugas->id }}">{{ $petugas->nama_petugas }}</option>
                        @endforeach
                    </select>
                    @error('id_petugas') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                
                <div class="form-group">
                    <label for="photo_barang" class="form-control-label text-uppercase opacity-7">Photo Barang</label>
                    <input type="file"
                    class="form-control @error('photo_barang') is-invalid @enderror"
                    name="photo_barang" placeholder="Masukan Photo Barang">
                    @error('photo_barang') <div class="text-muted">{{ $message }}</div> @enderror
                </div>

        
               
                <div class="form-group d-grid py-2 ">
                    <button type="submit" class="btn btn-primary ">
                        Tambah Barang Baru
                    </button>
                </div>
            </form>        
    </div>
    </div>
  </div>
  </div>



  <!--Modal Show Inventaris-->
<div class="modal fade" id="inventaris" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <h5 type="button" class="close" data-dismiss="modal" aria-label="Close" >
                  <span aria-hidden="true">&times;</span>
                </h5>
            </div>
            <div class="modal-body">
              <i class="fa fa-spinner fa-spin"></i>
          
            </div>
        </div>
    </div>
  </div> 


   <!--Modal Show Inventaris-->
<div class="modal fade" id="inventarisphoto" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <h5 type="button" class="close" data-dismiss="modal" aria-label="Close" >
                  <span aria-hidden="true">&times;</span>
                </h5>
            </div>
            <div class="modal-body">
              <i class="fa fa-spinner fa-spin"></i>
          
            </div>
        </div>
    </div>
  </div> 






@foreach ($inventaris as $inve)
<div class="modal fade" id="inventarisupdate{{ $inve->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-lg" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLabel">Barang Update </h5>
       <h5 type="button" class="close" data-dismiss="modal" aria-label="Close" >
         <span aria-hidden="true">&times;</span>
       </h5>
     </div>
     <div class="modal-body">
        <form action="{{ route('inventaris.update',$inve->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="nama" class="form-control-label text-uppercase opacity-7">Nama Jenis</label>
                <input  type="text"
                        name="nama"
                        value="{{old('nama') ? old('nama') : $inve->nama}}"
                        class="form-control @error('nama') is-invalid @enderror" placeholder="Masukan Nama Jenis...."/>
                        @error('nama') <div class="text-muted">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="kode_inventaris" class="form-control-label text-uppercase opacity-7">Kode Inventaris</label>
                <input  type="text"
                        name="kode_inventaris"
                        value="{{old('kode_inventaris') ? old('kode_inventaris') : $inve->kode_inventaris}}"
                        class="form-control @error('kode_inventaris') is-invalid @enderror" placeholder="Masukan Kode Jenis...."/>
                        @error('kode_inventaris') <div class="text-muted">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="jumlah" class="form-control-label text-uppercase opacity-7">jumlah</label>
                <input  type="text"
                        name="jumlah"
                        value="{{old('jumlah') ? old('jumlah') : $inve->jumlah}}"
                        class="form-control @error('jumlah') is-invalid @enderror" placeholder="Masukan Keterangan..">
                        @error('jumlah') <div class="text-muted">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="kondisi" class="form-control-label text-uppercase opacity-7">kondisi</label>
                <input  type="text"
                        name="kondisi"
                        value="{{old('kondisi') ? old('kondisi') : $inve->kondisi}}"
                        class="form-control @error('kondisi') is-invalid @enderror" placeholder="Masukan Kondisi..">
                        @error('kondisi') <div class="text-muted">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="tanggal_register" class="form-control-label text-uppercase opacity-7">tanggal_register</label>
                <input  type="date"
                        name="tanggal_register"
                        value="{{old('tanggal_register') ? old('tanggal_register') : $inve->tanggal_register}}"
                        class="form-control @error('tanggal_register') is-invalid @enderror" placeholder="Masukan Keterangan..">
                        @error('tanggal_register') <div class="text-muted">{{ $message }}</div> @enderror
            </div>
        
            <div class="form-group">
                <label for="keterangan" class="form-control-label text-uppercase opacity-7">keterangan</label>
                <input  type="text"
                        name="keterangan"
                        value="{{old('keterangan') ? old('keterangan') : $inve->keterangan}}"
                        class="form-control @error('keterangan') is-invalid @enderror" placeholder="Masukan Keterangan">
                        @error('keterangan') <div class="text-muted">{{ $message }}</div> @enderror
            </div>
            
        
            <div class="form-group">
                <label for="id_jenis" class="form-control-label text-uppercase opacity-7">Jenis</label>
                <select name="id_jenis" required class="form-control" @error('id_jenis') is-invalid @enderror>
                    <option value="" disabled selected >Pilih Jenis.>> </option>
                        @foreach ($inventaris as $inve )
                        <option value="{{ $inve->jenis->id }}" {{ $inve->jenis->id == $inve->jenis->id ? 'selected':'' }}>{{ $inve->jenis->nama_jenis }}</option>
                        @endforeach
                        
                </select>
            </div>
            <div class="form-group">
                <label for="id_ruang" class="form-control-label text-uppercase opacity-7">Ruang</label>
                <select name="id_ruang" required class="form-control" @error('id_ruang') is-invalid @enderror>
                    <option value="" disabled selected >Pilih Ruang.>> </option>
                    @foreach ($inventaris as $inve)
                        <option value="{{ $inve->ruang->id }}" {{ $inve->ruang->id == $inve->ruang->id ? 'selected' :'' }}>{{ $ruang->nama_ruang }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="id_petugas" class="form-control-label text-uppercase opacity-7">Petugas</label>
                <select name="id_petugas" required class="form-control" @error('id_petugas') is-invalid @enderror>
                    <option value="" disabled selected >Pilih Petugas.>> </option>
                    @foreach ($inventaris as $inve)
                        <option value="{{ $inve->petugas->id }}"{{ $inve->petugas->id == $inve->petugas->id ? 'selected' : '' }}>{{ $petugas->nama_petugas }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="photo_barang" class="form-control-label text-uppercase opacity-7">Photo Barang</label>
                <input 
                value="{{old('photo_barang') ? old('photo_barang') : $inve->photo_barang}}"
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


<div class="modal fade" id="inventarisphoto{{ $inve->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="#">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Photo Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <td>
                    <img src="{{ $inve->photo_barang }}" alt="">
                </td>
              </div>
            </div>
          </div>
    </form>
  </div> 
  @endforeach

@foreach ($inventaris as $inve)
<div class="modal fade" id="inventarisdelete{{ $inve->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{ route('inventaris.destroy',$inve->id) }}" method="delete">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data ? </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Klik "Delete" untuk menghapus data
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Delete</button>
              </div>
            </div>
          </div>
    </form>
  </div> 
@endforeach
@endsection


@push('addon-script')
<script>
$(function(){
  @if (session('status') == 'create')
  $("#inventariscreate").modal('show');
    $("#inventariscreate .close").click(function(){
      $("#inventariscreate").modal('hide');
    });  
  @endif

  @if (session('status') == 'edit')
  $("#inventarisupdate{{ request()->id }}").modal('show');
    $("#inventarisupdate{{ request()->id }} .close").click(function(){
      $("#inventarisupdate{{ request()->id }}").modal('hide');
    });  
  @endif
  
})
</script>
@endpush

