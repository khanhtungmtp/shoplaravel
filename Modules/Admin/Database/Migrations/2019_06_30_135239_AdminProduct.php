<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdminProduct extends Migration
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
            $table->string('name')->unique();
            $table->string('slug')->index();
            $table->string('description')->nullable();
            $table->longText('content');
            $table->integer('category_id')->index()->default(0);
            $table->integer('price')->default(0);
            $table->integer('price_sale')->default(0)->nullable();
            $table->integer('author_id')->default(0)->index();
            $table->string('avatar')->nullable();
            $table->tinyInteger('active')->default(1)->index();
            $table->tinyInteger('hot')->default(0);
            $table->integer('view')->default(0);
            $table->string('title_seo')->nullable();
            $table->string('keyword_seo')->nullable();
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
