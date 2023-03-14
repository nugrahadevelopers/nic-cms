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
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('title');
            $table->string('slug')->unique();
            $table->text('excerpt');
            $table->longText('content');
            $table->dateTime('post_date');
            $table->tinyInteger('post_status')->default(1);
            $table->tinyInteger('post_comment_status')->default(1);
            $table->bigInteger('post_comment_count')->default(0);

            $table->string('seo_title', 60)->nullable();
            $table->string('seo_type')->nullable();
            $table->string('seo_description', 156)->nullable();
            $table->string('seo_keyword')->nullable();
            $table->string('seo_image')->nullable();
            $table->string('seo_site_name', 60)->nullable();

            $table->foreignUuid('created_by')->nullable();
            $table->foreignUuid('updated_by')->nullable();
            $table->timestamps();
        });

        Schema::table('blog_posts', function (Blueprint $table) {
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_posts');
    }
};
