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
        Schema::create('sequences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tcyear_id'); // Make sure the data type matches the 'id' in 'tcyears'
            $table->integer('sequence_number');
            $table->timestamps();
            $table->foreign('tcyear_id')->references('id')->on('tcyears'); // Ensure the table name is correct ('tcyears')
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sequences');
    }
};
