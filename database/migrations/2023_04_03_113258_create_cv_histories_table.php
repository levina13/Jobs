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
        Schema::create('cv_histories', function (Blueprint $table) {
            $table->string('id',15);
            $table->unsignedBigInteger('id_user');
            $table->string('first_name',15);
            $table->string('last_name', 15);
            $table->string('email', 50);
            $table->string('phone_number',15);
            $table->text('education');
            $table->text('address');
            $table->text('working_experience');
            $table->text('skill');
            $table->string('photo',50);
            $table->text('profile');
            $table->unsignedBigInteger('id_cv');
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
        Schema::dropIfExists('cv_histories');
    }
};
