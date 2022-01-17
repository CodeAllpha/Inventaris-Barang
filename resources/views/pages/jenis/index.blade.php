@extends('layouts.main')
@section('page-content')
    Jenis
@endsection
@section('title')
    Daftar Jenis
@endsection
@section('daftar-content')
    Daftar Jenis
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
        <div class="input-group-append text-end" data-modal-type="type3" style="margin-top:-40px ">
            <a href="#jeniscreate" data-toggle="modal"
            data-target="#jeniscreate" data-title="Tambah Jenis Baru" class="btn btn-primary mb-0"><i class="fas fa-plus"></i>&nbsp;Tambah Jenis</a>
          </div> 
         
    </div>
    <div class="card-body px-0 pt-0 pb-2">
    <div class="table-responsive p-0" >
    <table class="table align-items-center mb-0">
    <thead>
        <tr>
        <th class="text-uppercase text-xs font-weight-bolder opacity-10">No</th>
        <th class="text-uppercase text-xs font-weight-bolder opacity-10 ps-2">Nama Jenis</th>
        <th class="text-uppercase text-xs font-weight-bolder opacity-10 ps-2">Kode Jenis</th>
        <th class="text-uppercase text-xs font-weight-bolder opacity-10 ps-2">Keterangan</th>
        <th class="text-center text-uppercase text-xs font-weight-bolder opacity-10">Action</th>
        <th class="text-secondary opacity-7"></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($jenis as $jens)
        <tr>
            <td>
                <div class="d-flex flex-column justify-content-center px-3">
                    <h6 class="mb-0 text-sm ">{{ $jens->id }}</h6>
                </div>
            </td>
            <td>
                <div class="d-flex flex-column">
                    <h6 class="mb-0 text-sm ">{{ $jens->nama_jenis }}</h6>
                </div>
            </td>
            <td>
                <div class="d-flex flex-column">
                    <h6 class="mb-0 text-sm ">{{ $jens->kode_jenis }}</h6>
                </div>
            </td>
            <td>
                <div class="d-flex flex-column">
                    <h6 class="mb-0 text-sm ">{{ $jens->keterangan }}</h6>
                </div>
            </td>
            <td class="align-middle text-center">
                <a class="btn btn-link text-dark px-3 mb-0 edit" 
                data-toggle="modal"
                data-target="#jenisupdate{{ $jens->id }}">
                <i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
            </td>
            <td class="align-middle">
                <a class="btn btn-link text-danger text-gradient px-3 mb-0 " 
                data-target="#jenisdelete{{ $jens->id }}" data-toggle="modal"><i class="far fa-trash-alt me-2"></i>Delete</a>
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
        {{ $jenis->links() }}
    </div>
    </div>
    </div>
</div>
</div>




{{-- Section Jenis Create Modals --}}
<div class="modal fade" id="jeniscreate" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Jenis Baru</h5>
                <h5 type="button" class="close" data-dismiss="modal" aria-label="Close" >
                  <span aria-hidden="true">&times;</span>
                </h5>
            </div>
            <div class="modal-body">
              
    <form action="{{ route('jenis.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_jenis" class="form-control-label text-uppercase opacity-7">Nama Jenis</label>
            <input  type="text"
                    name="nama_jenis"
                    value="{{ old('nama_jenis') }}"
                    class="form-control @error('nama_jenis') is-invalid @enderror" placeholder="Masukan Nama Jenis...."/>
                    @error('nama_jenis') <div class="text-muted">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="kode_jenis" class="form-control-label text-uppercase opacity-7">Kode Jenis</label>
            <input  type="text"z
                    name="kode_jenis"
                    value="{{ old('kode_jenis') }}"
                    class="form-control @error('kode_jenis') is-invalid @enderror" placeholder="Masukan Kode Jenis...."/>
                    @error('kode_jenis') <div class="text-muted">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="keterangan" class="form-control-label text-uppercase opacity-7">Keterangan</label>
            <input  type="text"
                    name="keterangan"
                    class="form-control @error('keterangan') is-invalid @enderror" placeholder="Masukan Keterangan..">
                    @error('keterangan') <div class="text-muted">{{ $message }}</div> @enderror
        </div>
        <div class="form-group d-grid py-2 ">
            <button type="submit" class="btn btn-primary">
                Tambah Jenis Baru
            </button>
        </div>
        </form>
            </div>
        </div>
    </div>
  </div>




{{-- Section Jenis Update Modals --}}
@foreach ($jenis as $jeanis)
<div class="modal fade" id="jenisupdate{{ $jeanis->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-lg" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLabel">Update Jenis</h5>
       <h5 type="button" class="close" data-dismiss="modal" aria-label="Close" >
         <span aria-hidden="true">&times;</span>
       </h5>
     </div>
     <div class="modal-body">
        <form action="{{ route('jenis.update',$jeanis->id) }}" method="PUT">
            @csrf
            <div class="form-group">
                <label for="nama_jenis" class="form-control-label text-uppercase opacity-7">Nama Jenis</label>
                <input  type="text"
                        name="nama_jenis"
                        value="{{old('nama_jenis') ? old('nama_jenis') : $jeanis->nama_jenis}}"
                        class="form-control @error('nama_jenis') is-invalid @enderror" placeholder="Masukan Nama Jenis...."/>
                        @error('nama_jenis') <div class="text-muted">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="kode_jenis" class="form-control-label text-uppercase opacity-7">Kode Jenis</label>
                <input  type="text"
                        name="kode_jenis"
                        value="{{old('kode_jenis') ? old('kode_jenis') : $jeanis->kode_jenis}}"
                        class="form-control @error('kode_jenis') is-invalid @enderror" placeholder="Masukan Kode Jenis...."/>
                        @error('kode_jenis') <div class="text-muted">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="keterangan" class="form-control-label text-uppercase opacity-7">Keterangan</label>
                <input  type="text"
                        name="keterangan"
                        value="{{old('keterangan') ? old('keterangan') : $jeanis->keterangan}}"
                        class="form-control @error('keterangan') is-invalid @enderror" placeholder="Masukan Keterangan..">
                        @error('keterangan') <div class="text-muted">{{ $message }}</div> @enderror
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
{{-- Section Jenis Delete Modals --}}
  <div class="modal fade" id="jenisdelete{{ $jeanis->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{ route('jenis.destroy',$jeanis->id) }}" method="delete">
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
  $("#jeniscreate").modal('show');
    $("#jeniscreate .close").click(function(){
      $("#jeniscreate").modal('hide');
    });  
  @endif

  @if (session('status') == 'edit')
  $("#jenisupdate{{ request()->id }}").modal('show');
    $("#jenisupdate{{ request()->id }} .close").click(function(){
      $("#jenisupdate{{ request()->id }}").modal('hide');
    });  
  @endif
  
})
</script>
@endpush
