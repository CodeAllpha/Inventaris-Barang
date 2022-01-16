<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_barang');
            $table->string('peminjam');
            $table->date('tanggal_pinjam');
            // $table->date('tanggal_kembali');
            // $table->integer('jumlah_pinjam');
            $table->string('status_peminjaman');
            $table->integer('id_inventaris')->nullable();
            $table->integer('id_pegawai')->nullable();
            $table->integer('id_petugas')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjaman');
    }
}
