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
        Schema::table('lokers', function (Blueprint $table) {
            // Foreign Key
            $table->foreign('id_perusahaan')->references('id')->on('perusahaans');
            $table->foreign('id_pekerjaan')->references('id')->on('pekerjaans');
        });
        Schema::table('perusahaans', function (Blueprint $table) {
            // Foreign Key
            $table->foreign('id_owner')->references('id')->on('users');
            $table->foreign('id_jenis_perusahaan')->references('id')->on('jenis_perusahaans');
        });
        Schema::table('lamarans', function (Blueprint $table) {
            // Foreign Key
            $table->foreign('id_pelamar')->references('id')->on('users');
            $table->foreign('id_loker')->references('id')->on('lokers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
