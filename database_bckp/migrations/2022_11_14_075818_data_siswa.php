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
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nama_siswa');
            $table->string('nisn');
            $table->string('no_induk');
            $table->string('komli');
            $table->string('ttl');
            $table->string('kelamin');
            $table->string('agama');
            // $table->string('asal_sekolah');
            // $table->string('tahun');
            // $table->string('anak_ke');
            // $table->string('saudara');
            // $table->string('tinggi');
            // $table->string('berat');
            // $table->string('nama');
            $table->text('alamat');
            $table->string('no_telp');
            $table->string('kacamatan');
            $table->string('kabupaten');
            // $table->string('nama_ayah');
            // $table->string('nama_ibu');
            // $table->string('nama_wali');
            // $table->string('pekerjaan_ayah');
            // $table->string('pekerjaan_ibu');
            $table->string('tahun_masuk');
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
        Schema::dropIfExists('siswa');
    }
};
