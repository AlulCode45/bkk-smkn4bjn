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
        Schema::create('kepuasan_pelanggan',function(Blueprint $table){
            $table->id();
            $table->integer('id_user');
            $table->integer('id_survery');
            $table->integer('status_kepuasan');
        });
     }

        /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kepuasan_pelanggan');
    }
};
