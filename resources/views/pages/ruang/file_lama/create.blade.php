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
                class="form-control @error('keterangan') is-invalid @enderror" placeholder="Masukan Keterangan..">
                @error('keterangan') <div class="text-muted">{{ $message }}</div> @enderror
    </div>
    <div class="form-group d-grid py-2 ">
        <button type="submit" class="btn btn-primary ">
            Tambah Ruang Baru
        </button>
    </div>
    </form>