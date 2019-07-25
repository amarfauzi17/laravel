<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->text('content')->nullable();
            $table->string('image')->nullable();
            $table->UnsignedInteger('category_id')->nullable();
            $table->integer('visit_count')->default(0);
            $table->UnsignedInteger('author_id')->nullable();
            $table->timestamps();

            $table->foreign("category_id")->references("id")->on("categories")->onUpdate("CASCADE")->onDelete("set null");
            $table->foreign('author_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropForeign(['author_id']);
        });
        Schema::dropIfExists('posts');
    }
}
