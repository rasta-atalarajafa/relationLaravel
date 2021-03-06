<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('article');
            $table->string('slug');
            $table->string('file');
            $table->unsignedbigInteger('author_id');
            $table->unsignedbigInteger('category_id');
            $table->date('date');
            $table->integer('views')->default(0);
            $table->timestamps();

            $table->foreign('author_id')->references('id')->on('authors');
            // $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
