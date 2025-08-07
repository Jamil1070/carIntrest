<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('model')->nullable();
            $table->text('description')->nullable();
            $table->string('photo_url')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
