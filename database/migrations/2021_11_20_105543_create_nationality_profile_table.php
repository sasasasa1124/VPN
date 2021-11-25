<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNationalityProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nationality_profile', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('nationality_id');
            $table->unsignedInteger('profile_id');
            $table->timestamps();
            
            $table->foreign('nationality_id')->references('id')->on('nationalities')->onDelete('cascade');
            $table->foreign('profile_id')->references('id')->on('profiles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nationality_profile');
    }
}
