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
        Schema::create('setup_identitas', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->text('alamat')->nullable();
            $table->string('kota')->nullable();
            $table->string('provinsi')->nullable();
            $table->integer('kodepos')->nullable();
            $table->string('no_telepon')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('webstite')->nullable();
            $table->string('email')->nullable();
            $table->date('tgl_awal_periode')->nullable();
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
        Schema::dropIfExists('setup_identitas');
    }
};
