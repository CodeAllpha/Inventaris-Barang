
<table class="table mt-4 ">
    <tbody>
      <tr>
        <th scope="row">Nama Barang</th>
        <td>{{$inventaris->nama}}</td>
      </tr>
      <tr>
        <th scope="row">Jumlah</th>
        <td>{{$inventaris->jumlah}}</td>
      </tr>
      <tr>
        <th scope="row">Kode Barang</th>
        <td>{{$inventaris->kode_inventaris}}</td>
      </tr>
      <tr>
        <th scope="row">Kondisi</th>
        <td>{{$inventaris->kondisi}}</td>
      </tr>
      <tr>
        <th scope="row">Tanggal Register</th>
        <td>{{$inventaris->tanggal_register}}</td>
      </tr>
      <tr>
        <th scope="row">Keterangan</th>
        <td>{{$inventaris->keterangan}}</td>
      </tr>
      <tr>
        <th scope="row">Nama Ruang</th>
        <td>{{$inventaris->ruang->nama_ruang}}</td>
      </tr>
      <tr>
        <th scope="row">Jenis Barang</th>
        <td>{{$inventaris->jenis->nama_jenis}}</td>
      </tr>
      <tr>
        <th scope="row">Petugas</th>
        <td>{{$inventaris->petugas->nama_petugas}}</td>
      </tr>
    </tbody>
  </table>
  
  