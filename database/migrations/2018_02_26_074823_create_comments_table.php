<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->text('comment');
            $table->UnsignedInteger('post_id');
            $table->timestamps();

            $table->foreign("post_id")->references("id")->on("posts")->onUpdate("cascade")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign(["post_id"]);
        });
        Schema::dropIfExists('comments');
    }

}
