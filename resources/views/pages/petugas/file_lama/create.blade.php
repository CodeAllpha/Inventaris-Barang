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
