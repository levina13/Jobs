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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('headline', 30)->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('telepon')->unique();
            $table->timestamp('telepon_verified_at')->nullable();
            $table->unsignedBigInteger('id_city')->nullable();
            $table->unsignedBigInteger('id_education')->nullable();
            $table->string('photo')->nullable();
            // Role=> A untuk pencari loker, B untuk pembuat loker
            $table->char('role', 1);
            // Status tervirifikasi (0=> belum, 1=> telepon, 2=>email, 3=> lengkap)
            $table->char('status', 1)->default('0');
            $table->string('password');
    
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
