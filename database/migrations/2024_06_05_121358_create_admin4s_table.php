<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('admin4s', function (Blueprint $table) {
            $table->id();
            // Add your columns
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('admin4s');
    }
};
