<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesSeatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies_seat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('books_id')->unsigned();
            $table->foreign('books_id')->references('id')->on('books');
            $table->unsignedBigInteger('seat_id')->unsigned();
            $table->foreign('seat_id')->references('id')->on('seats');
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
        Schema::dropIfExists('movies_seat');
    }
}
