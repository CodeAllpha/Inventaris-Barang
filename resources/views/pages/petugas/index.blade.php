@extends('layouts.main')
@section('page-content')
    Petugas
@endsection
@section('title')
    Daftar Petugas
@endsection
@section('daftar-content')
    Daftar Petugas
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
        <div class="input-group-append text-end" data-modal-type="type2" style="margin-top:-40px " >
            <a href="#petugascreate" data-toggle="modal"
            data-target="#petugascreate" data-title="Tambah Petugas Baru" class="btn btn-primary mb-0"><i class="fas fa-plus"></i>&nbsp;Tambah Petugas</a>
          </div>  
         
    </div>
    <div class="card-body px-0 pt-0 pb-2">
    <div class="table-responsive p-0" >
    <table class="table align-items-center mb-0">
    <thead>
        <tr>
        <th class="text-uppercase text-xs font-weight-bolder opacity-10">No</th>
        <th class="text-uppercase text-xs font-weight-bolder opacity-10 ps-2">Nama Petugas</th>
        <th class="text-uppercase text-xs font-weight-bolder opacity-10 ps-2">Username</th>
        <th class="text-uppercase text-xs font-weight-bolder opacity-10 ps-2">Level</th>
        <th class="text-center text-uppercase text-xs font-weight-bolder opacity-10">Action</th>
        <th class="text-secondary opacity-7"></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($petugas as $petugaes)
        <tr>
            <td>
                <div class="d-flex flex-column justify-content-center px-3">
                    <h6 class="mb-0 text-sm ">{{ $petugaes->id }}</h6>
                </div>
            </td>
            <td>
                <div class="d-flex flex-column">
                    <h6 class="mb-0 text-sm ">{{ $petugaes->nama_petugas }}</h6>
                </div>
            </td>
            <td>
                <div class="d-flex flex-column">
                    <h6 class="mb-0 text-sm ">{{ $petugaes->username }}</h6>
                </div>
            </td>
            <td>
                <div class="d-flex flex-column">
                    <h6 class="mb-0 text-sm ">{{ $petugaes->level }}</h6>
                </div>
            </td>
            <td class="align-middle text-center">
                <a class="btn btn-link text-dark px-3 mb-0 edit" 
                data-toggle="modal"
                data-target="#petugasupdate{{ $petugaes->id }}">
                <i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
            </td>
            {{-- <td class="align-middle text-center">
                <a class="btn btn-link text-dark px-3 mb-0" href="{{ route('petugas.edit',$peg->id) }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
            </td> --}}
            <td class="align-middle">
                <a class="btn btn-link text-danger text-gradient px-3 mb-0" 
                data-target="#petugasdelete{{ $petugaes->id }}"
                data-toggle="modal"><i class="far fa-trash-alt me-2"></i>Delete</a>
                </a>
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
        {{ $petugas->links() }}
    </div>
    </div>
    </div>
</div>
</div>
</div>
</div>



{{-- Section Petugas Create Modals --}}
<div class="modal fade" id="petugascreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Petugas Baru</h5>
        <h5 type="button" class="close" data-dismiss="modal" aria-label="Close" >
          <span aria-hidden="true">&times;</span>
        </h5>
      </h5>
      </div>
      <div class="modal-body">
        <form action="{{ route('petugas.store') }}" method="POST" id="createpetugas">
          @csrf
          <div class="form-group">
              <label for="nama_petugas" class="form-control-label text-uppercase opacity-7">Nama Petugas</label>
              <input  type="text"
                      name="nama_petugas"
                      value="{{ old('nama_petugas') }}"
                      class="form-control @error('nama_petugas') is-invalid @enderror" placeholder="Masukan Nama Petugas...."/>
                      @error('nama_petugas') <div class="text-muted">{{ $message }}</div> @enderror
          </div>
          <div class="form-group">
              <label for="username" class="form-control-label text-uppercase opacity-7">Username</label>
              <input  type="text"
                      name="username"
                      value="{{ old('username') }}"
                      class="form-control @error('username') is-invalid @enderror" placeholder="Masukan Username...."/>
                      @error('username') <div class="text-muted">{{ $message }}</div> @enderror
          </div>
          <div class="form-group">
              <label for="password" class="form-control-label text-uppercase opacity-7">Password</label>
              <input  type="password"
                      name="password"
                      class="form-control @error('password') is-invalid @enderror" placeholder="Masukan Password.."/>
                      @error('password') <div class="text-muted">{{ $message }}</div> @enderror
          </div>
          <div class="form-group">
              <label for="password_confirmation" class="form-control-label text-uppercase opacity-7">Confirm Password</label>
              <input  type="password"
                      name="password_confirmation"
                      class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Ulangi Password.."/>
                      @error('password_confirmation') <div class="text-muted">{{ $message }}</div> @enderror
          </div>
          <div class="form-group d-grid py-2 ">
              <button type="submit" class="btn btn-primary ">
                  Tambah Petugas Baru
              </button>
          </div>
          </form>      
  </div>
  </div>
</div>
</div>



{{-- Section Petugas Update Modals --}}
  @foreach ($petugas as $peg)
<div class="modal fade" id="petugasupdate{{ $peg->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Petugas</h5>
          <h5 type="button" class="close" data-dismiss="modal" aria-label="Close" >
            <span aria-hidden="true">&times;</span>
          </h5>
        </div>
        <div class="modal-body">
             <form action="{{ route('petugas.update',$peg->id) }}" method="PUT">
            @csrf
            <div class="form-group">
                <label for="nama_petugas" class="form-control-label text-uppercase opacity-7">Nama Petugas</label>
                <input  type="text"
                        name="nama_petugas"
                        value="{{old('nama_petugas') ? old('nama_petugas') : $peg->nama_petugas}}"
                        class="form-control @error('nama_petugas') is-invalid @enderror" placeholder="Masukan Nama Petugas...."/>
                        @error('nama_petugas') <div class="text-muted">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="username" class="form-control-label text-uppercase opacity-7">Username</label>
                <input  type="text"
                        name="username"
                        value="{{old('username') ? old('username') : $peg->username}}"
                        class="form-control @error('username') is-invalid @enderror" placeholder="Masukan Username...."/>
                        @error('username') <div class="text-muted">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="password" class="form-control-label text-uppercase opacity-7">Password</label>
                <input  type="password"
                        name="password"
                        value="{{old('password') ? old('password') : $peg->password}}"
                        class="form-control @error('password') is-invalid @enderror" placeholder="Masukan Password.."/>
                        @error('password') <div class="text-muted">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
              <label for="password_confirmation" class="form-control-label text-uppercase opacity-7">Confirm Password</label>
              <input  type="password"
                      name="password_confirmation"
                      class="form-control @error('password_confirmation') is-invalid @enderror" 
                      value="{{old('password') ? old('password') : $peg->password}}"
                      placeholder="Ulangi Password.."/>
                      @error('password_confirmation') <div class="text-muted">{{ $message }}</div> @enderror
          </div>
            <div class="form-group d-grid ">
                <button type="submit" class="btn btn-primary ">
                    Update Petugas
                </button>
            </div>
            </form>
        </div>
      </div>
    </div>
  </div>



 {{-- Modal Delete --}}
 <div class="modal fade" id="petugasdelete{{ $peg->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{ route('petugas.destroy',$peg->id) }}" method="delete">
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
  $("#petugascreate").modal('show');
    $("#petugascreate .close").click(function(){
      $("#petugascreate").modal('hide');
    });  
  @endif

  @if (session('status') == 'edit')
  $("#petugasupdate{{ request()->id }}").modal('show');
    $("#petugasupdate{{ request()->id }} .close").click(function(){
      $("#petugasupdate{{ request()->id }}").modal('hide');
    });  
  @endif
  
})
</script>
@endpush