<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->integer('brand_id');

            $table->string('product_name');
            $table->string('product_code');
            $table->integer('product_quantity');
            $table->string('product_size');
            $table->string('product_color');
            $table->integer('selling_price');
            $table->integer('discount_price');
            $table->text('product_detail');
            
            $table->string('image_1')->nullable();
            $table->string('image_2')->nullable();
            $table->string('image_3')->nullable();
            $table->string('video_link')->nullable();

            $table->integer('main_slider');
            $table->integer('hot_deal');
            $table->integer('best_rated');
            $table->integer('mid_slider');
            $table->integer('hot_new');
            $table->integer('trend');
            
            $table->integer('status');
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
        Schema::dropIfExists('products');
    }
}
