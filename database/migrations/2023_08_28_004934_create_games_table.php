<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->foreign('white')->nullable()->references('id')->on('users')->onDelete('restrict');
            $table->foreign('black')->nullable()->references('id')->on('users')->onDelete('restrict');
            $table->foreign('winner')->nullable()->references('id')->on('users')->onDelete('restrict');
            $table->timestamp('game_time');
            $table->integer('whiteMoves')->nullable();
            $table->integer('blackMoves')->nullable();
            $table->integer('minMovesGame')->nullable();
            $table->timestamps();
            $table->foreign('id')->nullable()->references('id')->on('users')->onDelete('restrict');;

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
