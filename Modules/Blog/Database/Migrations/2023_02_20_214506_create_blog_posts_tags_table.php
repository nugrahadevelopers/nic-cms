<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_posts_tags', function (Blueprint $table) {
            $table->foreignUuid('post_id');
            $table->foreignUuid('tag_id');
            $table->timestamps();
        });

        Schema::table('blog_posts_tags', function (Blueprint $table) {
            $table->foreign('post_id')->references('id')->on('blog_posts');
            $table->foreign('tag_id')->references('id')->on('blog_tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_posts_tags');
    }
};
