<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('phone')->unique();
            $table->string('email')->unique()->nullable();
            $table->string('password');
            $table->enum('type'  , ['user','admin','provider'])->nullable();
            $table->decimal('Latitude', 16,14)->nullable();
            $table->decimal('Longitude', 16,14)->nullable();
            $table->integer('isNotify')->default(1);
            $table->string('code')->nullable();
            $table->integer('active')->default(0);
            $table->integer('ban')->default(0);
            $table->integer('key')->nullable(0);
            $table->integer('role')->default('0');
            $table->string('whatsapp')->unique()->nullable();
            $table->string('avatar')->default('default.png');
            $table->string('lang')->default('ar');
            $table->text('token')->nullable();

            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            $table->integer('sub_category_id')->unsigned()->nullable();
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade');
           
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
