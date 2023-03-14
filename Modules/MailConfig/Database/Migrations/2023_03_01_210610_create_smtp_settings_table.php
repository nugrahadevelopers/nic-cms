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
        Schema::create('mail_config_smtp_settings', function (Blueprint $table) {
            $table->id();
            $table->string('from_email_address')->default(env('MAIL_FROM_ADDRESS', 'mail@example.com'));
            $table->string('from_name')->default(env('MAIL_FROM_NAME', config('app.name')));
            $table->string('smtp_host')->default(env('MAIL_HOST', 'mailhog'));
            $table->string('smtp_port')->default("465");
            $table->tinyInteger('type_of_encryption')->default(2);
            $table->string('smtp_username')->nullable();
            $table->longText('smtp_password')->nullable();
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
        Schema::dropIfExists('smtp_settings');
    }
};
