<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('title');
            $table->string('link');
            $table->string('sh_desc')->nullable();
            $table->text('desc');
            $table->string('price');
            $table->boolean('is_sale')->default(0);
            $table->boolean('is_new')->default(0);
            $table->boolean('is_main_catalog')->default(0);
            $table->integer('sorting')->default(0);
            $table->integer('category_id')->default(0);
            $table->boolean('status')->default(1);
            $table->softDeletes();
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
