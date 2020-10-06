<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('comments');

            $table->BigInteger('user_id')->unsigned();
            // Create foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->BigInteger('post_id')->unsigned();
            // Create foreign key constraints
            $table->foreign('post_id')->references('id')->on('blogposts')->onDelete('cascade');

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
        Schema::dropIfExists('comments');
    }
}
