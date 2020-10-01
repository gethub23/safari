<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rate');
            
            $table -> integer( 'user_id' ) -> unsigned() -> index();
            $table -> foreign( 'user_id' ) -> references( 'id' ) -> on( 'users' ) -> onDelete( 'cascade' );

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
        Schema::dropIfExists('rates');
    }
}