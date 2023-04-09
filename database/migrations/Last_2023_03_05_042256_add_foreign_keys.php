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
        Schema::table('users', function(Blueprint $table){
            $table->foreign('id_city')->references('id')->on('cities');
            $table->foreign('id_education')->references('id')->on('education');
        });
        Schema::table('lokers', function (Blueprint $table) {
            // Foreign Key
            $table->foreign('id_contract')->references('id')->on('contracts');
            $table->foreign('id_perusahaan')->references('id')->on('perusahaans');
            $table->foreign('id_pekerjaan')->references('id')->on('pekerjaans');
            $table->foreign('id_salary_category')->references('id')->on('salary_categories');
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
        Schema::table('cities',function(Blueprint $table){
            $table->foreign('id_province')->references('id')->on('provinces');
        });
        Schema::table('favorites', function(Blueprint $table){
            $table->foreign('id_pelamar')->references('id')->on('users');
            $table->foreign('id_loker')->references('id')->on('lokers');
        });
        Schema::table('cv_histories',function(Blueprint $table){
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_cv')->references('id')->on('cvs');
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
