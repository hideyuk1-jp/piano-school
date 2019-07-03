<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerformancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performances', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('event_id')->unsigned();
            $table->foreign('event_id') // 外部キー制約
                  ->references('id')->on('events')
                  ->onDelete('cascade');

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id') // 外部キー制約
                  ->references('id')->on('users')
                  ->onDelete('cascade');

            $table->bigInteger('performer_id')->unsigned();
            $table->foreign('performer_id') // 外部キー制約
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->bigInteger('music_id')->unsigned();
            $table->foreign('music_id') // 外部キー制約
                ->references('id')->on('musics')
                ->onDelete('cascade');

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
        Schema::dropIfExists('performances');
    }
}
