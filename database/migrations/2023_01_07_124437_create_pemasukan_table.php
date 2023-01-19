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
        Schema::create('pemasukan', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique();
            $table->integer('id_siswa');
            $table->string('uraian')->nullable();
            $table->integer('id_laba_rugi');
            $table->bigInteger('jumlah_masuk');
            $table->bigInteger('jumlah_keluar')->nullable();
            $table->integer('id_neraca');
            $table->text('keterangan')->nullable();
            $table->date('tanggal_pemasukan');
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
        Schema::dropIfExists('pemasukan');
    }
};
