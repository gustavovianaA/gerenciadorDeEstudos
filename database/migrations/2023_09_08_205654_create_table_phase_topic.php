<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePhaseTopic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phase_topic', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('topic_id');
            $table->unsignedBigInteger('phase_id');

            $table->foreign('topic_id')->references('id')->on('topics');
            $table->foreign('phase_id')->references('id')->on('phases');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phase_topic');
    }
}
