    <form action="{{ route('inventaris.store') }}" method="POST">
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
            <label for="kode_inventaris" class="form-control-label text-uppercase opacity-7">Kode Jenis</label>
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
            <label for="tanggal_register" class="form-control-label text-uppercase opacity-7">Tanggal Register</label>
            <input  type="date"
                    name="tanggal_register"
                    class="form-control @error('tanggal_register') is-invalid @enderror" placeholder="Tanggal Register..">
                    @error('tanggal_register') <div class="text-muted">{{ $message }}</div> @enderror
        </div>

        <script>
            var id_jenis= document.getElementById('id_jenis');
            id_jenis.value = 'Jenis';
        </script>
        <div class="form-group">
            <label for="id_jenis" class="form-control-label">Level</label>
            <select name="id_jenis" required class="form-control" @error('id_jenis') is-invalid @enderror>
                @foreach ($inventaris as $inventaris)
                    <option value="Jenis"></option>
                    <option value="{{ $inventaris->id }}">{{ $inventaris->nama_jenis }}</option>
                @endforeach
            </select>
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
                Tambah Jenis Baru
            </button>
        </div>
    </form>



