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
        Schema::create('perusahaan_data', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('kode');
            $table->string('alamat');
            $table->string('kota');
            $table->string('email');
            $table->string('no_telp');
            $table->year('tahun_gabung');
            $table->string('standar');
            $table->boolean('mou');
            $table->string('mou_file')->nullable();
            $table->boolean('umkm');
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
        Schema::dropIfExists('perusahaan_data');
    }
};
