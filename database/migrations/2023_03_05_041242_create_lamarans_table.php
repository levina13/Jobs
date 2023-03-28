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
        Schema::create('lamarans', function (Blueprint $table) {
            $table->id();
            // Status 0 jika belum diputuskan, 1 jika diterima, 2 jika ditolak
            $table->char('status', 1)->default('0');
            $table->string('cv');
            $table->string('additional1')->nullable();
            $table->string('additional2')->nullable();
            $table->unsignedBigInteger('id_pelamar');
            $table->unsignedBigInteger('id_loker');
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
        Schema::dropIfExists('lamarans');
    }
};
