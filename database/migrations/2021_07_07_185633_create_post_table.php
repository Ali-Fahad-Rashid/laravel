<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('post_title');
            $table->string('post_user');
            $table->string('post_content');
            $table->integer('post_user_id');
            $table->string('post_desc');
            $table->string('post_image');
            $table->string('post_tags');
            $table->string('post_status');
            $table->json('images');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post');
    }
}
