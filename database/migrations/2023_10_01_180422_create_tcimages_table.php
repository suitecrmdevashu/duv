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
        Schema::create('tcimages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sequence_id');
            $table->string('image_path');
            $table->timestamps();
            $table->foreign('sequence_id')->references('id')->on('sequences');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tcimages');
    }
};
