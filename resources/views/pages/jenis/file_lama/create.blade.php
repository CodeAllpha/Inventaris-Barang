
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
        <input  type="text"
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