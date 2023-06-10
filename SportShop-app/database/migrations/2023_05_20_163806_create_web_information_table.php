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
        Schema::create('web_information', function (Blueprint $table) {
            $table->id();
            $table->string('logo_img')->nullable();
            $table->string('web_name')->nullable();
            $table->string('address',255)->nullable();
            $table->string('phone',14)->nullable();
            $table->string('email',255)->nullable()->default('test@gmail.com');
            $table->string('facebook_link',255)->nullable();
            $table->string('gg_map_link',512)->nullable();
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
        Schema::dropIfExists('web_information');
    }
};
