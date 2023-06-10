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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title',255);
            $table->string('slug',255);
            $table->string('author',255)->nullable();
            $table->string('image',255)->nullable();
            $table->text('short_description',255)->nullable();
            $table->text('description',255);
            $table->boolean('status')->default(1);
            $table->boolean('is_approved')->default(1);
            $table->timestamps();
            $table->unsignedBigInteger('article_category_id')->nullable();
            $table->foreign('article_category_id')->references('id')->on('article_categories')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
};
