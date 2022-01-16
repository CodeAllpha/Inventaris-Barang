
<form action="{{ route('pegawai.store') }}" method="POST">
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
            <textarea class="form-control" placeholder="Masukan Alamat Anda..." name="alamat"
            @error('alamat') is-invalid @enderror></textarea>
        @error('alamat') <div class="text-muted">{{$message}}</div> @enderror
        </div>
        <div class="form-group">
            <label for="password" class="form-control-label text-uppercase opacity-7">Password</label>
            <input  type="password"
                    name="password"
                    class="form-control @error('password') is-invalid @enderror" placeholder="Masukan Password.."/>
                    @error('password') <div class="text-muted">{{ $message }}</div> @enderror
        </div> 
        </div>
        <div class="form-group">
        <label for="password_confirmation" class="form-control-label text-uppercase opacity-7">Confirm Password</label>
        <input  type="password"
                name="password_confirmation"
                class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Ulangi Password.."/>
                @error('password_confirmation') <div class="text-muted">{{ $message }}</div> @enderror
        </div>
            <div class="form-group d-grid ">
            <button type="submit" class="btn btn-primary ">
                Tambah Pegawai
            </button>
        </div>
    </div>
</form>