<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title_ar');
            $table->string('title_en');
            $table->string('body_ar');
            $table->string('body_en');
            $table->integer('type');
            $table->integer('seen');

            $table -> integer( 's_id' ) -> unsigned() -> index();
            $table -> foreign( 's_id' ) -> references( 'id' ) -> on( 'users' ) -> onDelete( 'cascade' );

            $table -> integer( 'r_id' ) -> unsigned() -> index();
            $table -> foreign( 'r_id' ) -> references( 'id' ) -> on( 'users' ) -> onDelete( 'cascade' );

            $table -> integer( 'service_id' ) -> unsigned() -> index();
            $table -> foreign( 'service_id' ) -> references( 'id' ) -> on( 'services' ) -> onDelete( 'cascade' );

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
        Schema::dropIfExists('notifications');
    }
}
