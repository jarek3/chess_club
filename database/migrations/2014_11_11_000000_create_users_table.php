<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('date_of_entry');
            $table->string('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->unsignedBigInteger('gamesCount')->nullable();
            $table->unsignedBigInteger('winCount');
            $table->unsignedBigInteger('lossCount');
            $table->unsignedBigInteger('countWinWhite')->nullable();
            $table->unsignedBigInteger('countWinBlack')->nullable();
            $table->float('ratio')->nullable();

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
}
