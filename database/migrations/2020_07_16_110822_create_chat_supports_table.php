<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatSupportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_supports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('room');
            $table->text('message');
            $table->boolean('admin_seen')->default(0);
            $table->boolean('user_seen')->default(0);

            $table->integer('s_id')->unsigned()->index();
            $table->foreign('s_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('r_id')->unsigned()->index();
            $table->foreign('r_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('chat_supports');
    }
}
