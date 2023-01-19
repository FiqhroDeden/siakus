<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengeluaran', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique();
            $table->string('no_kontrak')->nullable();
            $table->string('uraian');
            $table->integer('id_kategori');
            $table->bigInteger('jumlah_masuk')->nullable();
            $table->bigInteger('jumlah_pengeluaran')->nullable();
            $table->integer('id_rekening');
            $table->bigInteger('jumlah_utang')->nullable();
            $table->integer('id_rekening_utang')->nullable();
            $table->bigInteger('jumlah_piutang')->nullable();
            $table->integer('id_rekening_piutang')->nullable();
            $table->integer('id_siswa')->nullable();
            $table->text('keterangan')->nullable();
            $table->date('tanggal_pengeluaran');
            $table->softDeletes();
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
        Schema::dropIfExists('pengeluaran');
    }
};
