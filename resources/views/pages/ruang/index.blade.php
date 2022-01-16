@extends('layouts.main')
@section('page-content')
    Ruang
@endsection
@section('title')
    Daftar Ruang
@endsection
@section('daftar-content')
    Daftar Ruang
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
        <div class="input-group-append text-end" data-modal-type="type4" style="margin-top:-40px " >
            <a href="#ruangcreate"data-toggle="modal"
            data-target="#ruangcreate" data-title="Tambah Ruang Baru" class="btn btn-primary mb-0"><i class="fas fa-plus"></i>&nbsp;Tambah Ruang</a>
          </div>   
         
    </div>
    <div class="card-body px-0 pt-0 pb-2">
    <div class="table-responsive p-0" >
    <table class="table align-items-center mb-0">
    <thead>
        <tr>
        <th class="text-uppercase text-xs font-weight-bolder opacity-10">No</th>
        <th class="text-uppercase text-xs font-weight-bolder opacity-10 ps-2">Nama Ruang</th>
        <th class="text-uppercase text-xs font-weight-bolder opacity-10 ps-2">Kode Ruang</th>
        <th class="text-uppercase text-xs font-weight-bolder opacity-10 ps-2">Keterangan</th>
        <th class="text-center text-uppercase text-xs font-weight-bolder opacity-10">Action</th>
        <th class="text-secondary opacity-7"></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($ruang as $ruangs)
        <tr>
            <td>
                <div class="d-flex flex-column justify-content-center px-3">
                    <h6 class="mb-0 text-sm ">{{ $ruangs->id }}</h6>
                </div>
            </td>
            <td>
                <div class="d-flex flex-column">
                    <h6 class="mb-0 text-sm ">{{ $ruangs->nama_ruang }}</h6>
                </div>
            </td>
            <td>
                <div class="d-flex flex-column">
                    <h6 class="mb-0 text-sm ">{{ $ruangs->kode_ruang }}</h6>
                </div>
            </td>
            <td>
                <div class="d-flex flex-column">
                    <h6 class="mb-0 text-sm ">{{ $ruangs->keterangan }}</h6>
                </div>
            </td>
            <td class="align-middle text-center">
              <a class="btn btn-link text-dark px-3 mb-0 edit" 
              data-toggle="modal"
              data-target="#ruangupdate{{ $ruangs->id }}">
              <i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
          </td>
            <td class="align-middle">
              <a class="btn btn-link text-danger text-gradient px-3 mb-0 " 
              data-target="#ruangdelete{{ $ruangs->id }}" data-toggle="modal"><i class="far fa-trash-alt me-2"></i>Delete</a>
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
        {{ $ruang->links() }}
    </div>
    </div>
    </div>
</div>
</div>
</div>

{{-- Section Modal Create Ruang --}}
<div class="modal fade" id="ruangcreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Ruang Baru</h5>
        <h5 type="button" class="close" data-dismiss="modal" aria-label="Close" >
          <span aria-hidden="true">&times;</span>
        </h5>
      </h5>
      </div>
      <div class="modal-body">
        <form action="{{ route('ruang.store') }}" method="POST">
          @csrf
          <div class="form-group">
              <label for="nama_ruang" class="form-control-label text-uppercase opacity-7">Nama Ruang</label>
              <input  type="text"
                      name="nama_ruang"
                      value="{{ old('nama_ruang') }}"
                      class="form-control @error('nama_ruang') is-invalid @enderror" placeholder="Masukan Nama Ruang...."/>
                      @error('nama_ruang') <div class="text-muted">{{ $message }}</div> @enderror
          </div>
          <div class="form-group">
              <label for="kode_ruang" class="form-control-label text-uppercase opacity-7">Kode Ruang</label>
              <input  type="text"
                      name="kode_ruang"
                      value="{{ old('kode_jenis') }}"
                      class="form-control @error('kode_ruang') is-invalid @enderror" placeholder="Masukan Kode Ruang...."/>
                      @error('kode_ruang') <div class="text-muted">{{ $message }}</div> @enderror
          </div>
          <div class="form-group">
              <label for="keterangan" class="form-control-label text-uppercase opacity-7">Keterangan</label>
              <input  type="text"
                      name="keterangan"
                      value="{{ old('keterangan') }}"
                      class="form-control @error('keterangan') is-invalid @enderror" placeholder="Masukan Keterangan..">
                      @error('keterangan') <div class="text-muted">{{ $message }}</div> @enderror
          </div>
          <div class="form-group d-grid py-2 ">
              <button type="submit" class="btn btn-primary ">
                  Tambah Ruang Baru
              </button>
          </div>
          </form>
  </div>
  </div>
</div>
</div>


 <!-- Pegawai Modal Create  -->
 @foreach ($ruang as $ruangs)
 <div class="modal fade" id="ruangupdate{{ $ruangs->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">Update Ruang</h5>
           <h5 type="button" class="close" data-dismiss="modal" aria-label="Close" >
             <span aria-hidden="true">&times;</span>
           </h5>
         </div>
         <div class="modal-body">
          <form action="{{ route('ruang.update',$ruangs->id) }}" method="PUT">
            @csrf
            <div class="form-group">
                <label for="nama_ruang" class="form-control-label text-uppercase opacity-7">Nama Ruang</label>
                <input  type="text"
                        name="nama_ruang"
                        value="{{old('nama_ruang') ? old('nama_ruang') : $ruangs->nama_ruang}}"
                        class="form-control @error('nama_ruang') is-invalid @enderror" placeholder="Masukan Nama Ruang...."/>
                        @error('nama_jenis') <div class="text-muted">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="kode_ruang" class="form-control-label text-uppercase opacity-7">Kode Ruang</label>
                <input  type="text"
                        name="kode_ruang"
                        value="{{old('kode_ruang') ? old('kode_ruang') : $ruangs->kode_ruang}}"
                        class="form-control @error('kode_ruang') is-invalid @enderror" placeholder="Masukan Kode Ruang...."/>
                        @error('kode_ruang') <div class="text-muted">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="keterangan" class="form-control-label text-uppercase opacity-7">Keterangan</label>
                <input  type="text"
                        value="{{old('keterangan') ? old('keterangan') : $ruangs->keterangan}}"
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
   </div>

   
 
 
 
  {{-- Modal Delete --}}
  <div class="modal fade" id="ruangdelete{{ $ruangs->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <form action="{{ route('ruang.destroy',$ruangs->id) }}" method="delete">
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
  $("#ruangcreate").modal('show');
    $("#ruangcreate .close").click(function(){
      $("#ruangcreate").modal('hide');
    });  
  @endif

  @if (session('status') == 'edit')
  $("#ruangupdate{{ request()->id }}").modal('show');
    $("#ruangupdate{{ request()->id }} .close").click(function(){
      $("#ruangupdate{{ request()->id }}").modal('hide');
    });  
  @endif
  
})
</script>
@endpush

