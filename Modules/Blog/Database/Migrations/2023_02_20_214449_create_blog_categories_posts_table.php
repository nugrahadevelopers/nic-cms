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
        Schema::create('blog_categories_posts', function (Blueprint $table) {
            $table->foreignUuid('category_id');
            $table->foreignUuid('post_id');
            $table->timestamps();
        });

        Schema::table('blog_categories_posts', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('blog_categories');
            $table->foreign('post_id')->references('id')->on('blog_posts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_categories_posts');
    }
};
