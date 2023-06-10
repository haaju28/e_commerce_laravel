<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('phone',255)->nullable();
            $table->string('address',512)->nullable();
            $table->string('email')->unique();
            $table->boolean('status')->default(1);
            $table->boolean('role')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('google_id',255)->nullable();
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
};
