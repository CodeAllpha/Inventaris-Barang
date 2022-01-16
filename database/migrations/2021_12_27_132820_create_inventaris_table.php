<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventaris', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('kondisi');
            $table->string('keterangan');
            $table->integer('jumlah');
            $table->char('kode_inventaris');
            $table->date('tanggal_register');
            $table->string('photo_barang')->nullable();
            $table->integer('id_jenis');
            $table->integer('id_ruang');
            $table->integer('id_petugas');
            

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
        Schema::dropIfExists('inventaris');
    }
}
