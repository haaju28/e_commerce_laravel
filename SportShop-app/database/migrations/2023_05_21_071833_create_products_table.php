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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('image_url')->nullable();
            $table->tinyText('short_description')->nullable();
            $table->text('description')->nullable();
            $table->integer('price')->nullable();
            $table->integer('discount_price')->nullable();
            $table->integer('qty')->nullable();
            $table->float('weight')->nullable();
            $table->string('dimensions',255)->nullable();
            $table->string('materials',255)->nullable();
            $table->boolean('status')->nullable()->default(1);
            $table->string('slug')->nullable();
            $table->timestamps();
            $table->bigInteger('product_categories_id')->unsigned()->nullable();
            $table->foreign('product_categories_id')->references('id')->on('product_categories')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
