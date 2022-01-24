@extends('layouts.main')
@section('page-content')
    Pegawai
@endsection
@section('title')
    Daftar Pegawai
@endsection
@section('daftar-content')
    Daftar Pegawai
@endsection

@section('content')

{{-- Section Index Table --}}

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
          <div class="input-group-append text-end" data-modal-type="type1" style="margin-top:-40px " >
            <a href="#pegawaicreate" data-toggle="modal"
            data-target="#pegawaicreate" data-title="Tambah Pegawai Baru" class="btn btn-primary mb-0"><i class="fas fa-plus"></i>&nbsp;Tambah Pegawai</a>
          </div> 
    </div>
    <div class="card-body px-0 pt-0 pb-2">
    <div class="table-responsive p-0" >
    <table class="table align-items-center mb-0">
    <thead>
        <tr>
        <th class="text-uppercase text-xs font-weight-bolder opacity-10">No</th>
        <th class="text-uppercase text-xs font-weight-bolder opacity-10 ps-2">Nama Pegawai</th>
        <th class="text-uppercase text-xs font-weight-bolder opacity-10 ps-2">Username</th>
        <th class="text-uppercase text-xs font-weight-bolder opacity-10 ps-2">Nip</th>
        <th class="text-center text-uppercase text-xs font-weight-bolder opacity-10">Action</th>
        <th class="text-secondary opacity-7"></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($pegawai as $pegawais)
        <tr>
            <td>
                <div class="d-flex flex-column justify-content-center px-3">
                    <h6 class="mb-0 text-sm ">{{ $pegawais->id }}</h6>
                </div>
            </td>
            <td>
                <div class="d-flex flex-column">
                    <h6 class="mb-0 text-sm ">{{ $pegawais->nama_pegawai }}</h6>
                </div>
            </td>
            <td>
                <div class="d-flex flex-column">
                    <h6 class="mb-0 text-sm ">{{ $pegawais->username }}</h6>
                </div>
            </td>
            <td>
                <div class="d-flex flex-column">
                    <h6 class="mb-0 text-sm ">{{ $pegawais->nip }}</h6>
                </div>
            </td>
            <td class="align-middle text-center">
                <a class="btn btn-link text-dark px-3 mb-0 edit" 
                data-toggle="modal"
                data-target="#pegawaiupdate{{ $pegawais->id }}">
                <i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
            </td>
            {{-- <td class="align-middle text-center">
                <a class="btn btn-link text-dark px-3 mb-0" href="{{ route('pegawai.edit',$pegawais->id) }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
            </td> --}}
            <td class="align-middle text-center">
                <a class="btn btn-link text-dark px-3 mb-0" href="#pegawai"
                data-remote="{{ route('pegawai.show',$pegawais->id) }}" data-toggle="modal" data-target="#pegawai"
                data-title="Pegawai Detail"><i class="fas fa-eye text-dark me-2" aria-hidden="true"></i>Show</a>
            </td>

            <td class="align-middle">
                <a class="btn btn-link text-danger text-gradient px-3 mb-0 " 
                data-target="#pegawaidelete{{ $pegawais->id }}" data-toggle="modal"><i class="far fa-trash-alt me-2"></i>Delete</a>
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
        {{ $pegawai->links() }}
    </div>
    </div>
    </div>
</div>
    </div>
    </div>
</div>


<div class="modal fade" id="pegawaicreate" tabindex="-1" role="dialog"aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Pegawai Baru</h5>
                <h5 type="button" class="close" data-dismiss="modal" aria-label="Close" >
                  <span aria-hidden="true">&times;</span>
                </h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('pegawai.store') }}" method="POST" >
                    @csrf
                    <div class="form-group">
                        <label for="nama_pegawai" class="form-control-label text-uppercase opacity-7">Nama Pegawai</label>
                        <input  type="text"
                                name="nama_pegawai"
                                value="{{ old('nama_pegawai') }}"
                                class="form-control @error('nama_pegawai') is-invalid @enderror" placeholder="Masukan Nama Pegawai...."/>
                                @error('nama_pegawai') <div class="text-muted">{{ $message }}</div> @enderror
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
                        <label for="nip" class="form-control-label text-uppercase opacity-7">Nip</label>
                        <input  type="text"
                                name="nip"
                                class="form-control @error('nip') is-invalid @enderror" placeholder="Masukan Nip.."/>
                                @error('nip') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                        <div class="form-group">
                            <label for="alamat" class="form-control-label text-uppercase opacity-7">Alamat</label>
                           
                            <textarea class="form-control
                            @error('alamat') is-invalid @enderror" placeholder="Masukan Alamat Anda..." name="alamat">{{ old('alamat') }}</textarea>
                            
                            @error('alamat') <div class="text-muted">{{$message}}</div> @enderror
                        </div>
                           
                          
                        {{-- <div class="form-group">
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
                            </div> --}}

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password" class="form-control-label text-uppercase opacity-7">Password</label>
                                        <input  type="password"
                                        name="password"
                                        class="form-control @error('password') is-invalid @enderror" placeholder="Masukan Password.."/>
                                        @error('password') <div class="text-muted">{{ $message }}</div> @enderror
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password_confirmation" class="form-control-label text-uppercase opacity-7">Confirm Password</label>
                            <input  type="password"
                                    name="password_confirmation"
                                    class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Ulangi Password.."/>
                                    @error('password_confirmation') <div class="text-muted">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group d-grid ">
                                <button type="submit" class="btn btn-primary">
                                    Tambah Pegawai
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
          
            </div>
        </div>
    </div>
  </div>


 {{-- Modal Update --}}
  @foreach ($pegawai as $data)
   <div class="modal fade" id="pegawaiupdate{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Pegawai</h5>
          <h5 type="button" class="close" data-dismiss="modal" aria-label="Close" >
            <span aria-hidden="true">&times;</span>
          </h5>
        </div>
        <div class="modal-body">
            <form action="{{ route('pegawai.update',$data->id) }}" method="PUT">
                @csrf
                <div class="form-group">
                    <label for="nama_pegawai" class="form-control-label text-uppercase opacity-7">Nama Pegawai</label>
                    <input  type="text"
                            name="nama_pegawai"
                            value="{{old('nama_pegawai') ? old('nama_pegawai') : $data->nama_pegawai}}"
                            class="form-control @error('nama_pegawai') is-invalid @enderror" placeholder="Masukan Nama Petugas...."/>
                            @error('nama_pegawai') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="username" class="form-control-label text-uppercase opacity-7">Username</label>
                    <input  type="text"
                            name="username"
                            value="{{old('username') ? old('username') : $data->username}}"
                            class="form-control @error('username') is-invalid @enderror" placeholder="Masukan Username...."/>
                            @error('username') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="nip" class="form-control-label text-uppercase opacity-7">Nip</label>
                    <input  type="text"
                            name="nip"
                            value="{{old('nip') ? old('nip') : $data->nip}}"
                            class="form-control @error('nip') is-invalid @enderror" placeholder="Masukan Nip...."/>
                            @error('nip') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="alamat" class="form-control-label text-uppercase opacity-7">Alamat</label>
                    <textarea class="form-control" placeholder="Masukan Alamat Anda..." name="alamat"
                    @error('alamat') is-invalid @enderror>  {{old('alamat') ? old('alamat') : $data->alamat}}</textarea>
                @error('alamat') <div class="text-muted">{{$message}}</div> @enderror
                </div>
    
                <div class="form-group">
                    <label for="password" class="form-control-label text-uppercase opacity-7">Password</label>
                    <input  type="password"
                            name="password"
                            value="{{old('password') ? old('password') : $data->password}}"
                            class="form-control @error('password') is-invalid @enderror" placeholder="Masukan Password.."/>
                            @error('password') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation" class="form-control-label text-uppercase opacity-7">Confirm Password</label>
                    <input  type="password"
                            name="password_confirmation"
                            class="form-control @error('password_confirmation') is-invalid @enderror" 
                            value="{{old('password') ? old('password') : $data->password}}"
                            placeholder="Ulangi Password.."/>
                            @error('password_confirmation') <div class="text-muted">{{ $message }}</div> @enderror
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
  </div>

  {{-- Modal Delete --}}
<div class="modal fade" id="pegawaidelete{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{ route('pegawai.destroy',$data->id) }}" method="delete">
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

  </div>
  
   <!--Modal Show Pegawai-->
<div class="modal fade" id="pegawai" tabindex="-1" role="dialog">
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
  
  
  @endforeach
@endsection

@push('addon-script')
<script>
$(function(){
  @if (session('status') == 'create')
  $("#pegawaicreate").modal('show');
    $("#pegawaicreate .close").click(function(){
      $("#pegawaicreate").modal('hide');
    });  
  @endif

  @if (session('status') == 'edit')
  $("#pegawaiupdate{{ request()->id }}").modal('show');
    $("#pegawaiupdate{{ request()->id }} .close").click(function(){
      $("#pegawaiupdate{{ request()->id }}").modal('hide');
    });  
  @endif
  
})
</script>
@endpush





