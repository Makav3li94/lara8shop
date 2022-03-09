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
            $table->id();
            $table->unsignedBigInteger('brand_id')->index();
            $table->unsignedBigInteger('category_id')->index();
            $table->unsignedBigInteger('sub_category_id')->index();
            $table->unsignedBigInteger('sub_sub_category_id')->index();
            $table->string('name');
            $table->string('name_fa');
            $table->string('slug');
            $table->string('slug_fa');
            $table->string('code');
            $table->string('qty');
            $table->string('tags');
            $table->string('tags_fa');
            $table->string('size')->nullable();
            $table->string('size_fa')->nullable();
            $table->string('color');
            $table->string('color_fa');
            $table->string('selling_prize');
            $table->string('discount')->nullable();
            $table->string('excerpt');
            $table->string('excerpt_fa');
            $table->text('description');
            $table->text('description_fa');
            $table->string('image');
            $table->integer('hot_deals')->nullable();
            $table->integer('featured')->nullable();
            $table->integer('special_offer')->nullable();
            $table->integer('special_deal')->nullable();
            $table->integer('status')->default(0);
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
