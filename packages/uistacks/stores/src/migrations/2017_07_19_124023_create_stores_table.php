<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('created_by')->unsigned()->index()->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->integer('updated_by')->unsigned()->index()->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
            $table->integer('activity_id')->unsigned()->index()->nullable();
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
            $table->boolean('active');
            $table->bigInteger('search_count')->nullable();
            $table->bigInteger('view_count')->nullable();
            $table->decimal('avg_rating')->nullable();
            $table->bigInteger('rating_count')->nullable();
            $table->timestamps();
        });

        Schema::create('stores_trans', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('store_id')->unsigned()->index();
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('country')->nullable();
            $table->string('area')->nullable();
            $table->string('location')->nullable();
            $table->string('store_lat')->nullable();
            $table->string('store_lng')->nullable();
            $table->string('main_image')->nullable();
            $table->boolean('is_instagram')->default('0');
            $table->string('instagram_link')->nullable();
            $table->string('instagram_media')->nullable();
            $table->boolean('is_additional_media')->default('0')->comment("0=> No, 1=> Yes");
            $table->string('facebook_media')->nullable();
            $table->string('google_media')->nullable();
            $table->string('youtube_media')->nullable();
            $table->string('twitter_media')->nullable();
            $table->string('snapchat_media')->nullable();
            $table->string('googleplus_media')->nullable();
            $table->string('website_url')->nullable();
            $table->string('email')->nullable();
            $table->boolean('active')->default('1')->comment("0=> No, 1=> Yes");
            $table->boolean('is_approved')->default('0')->comment("0=> No, 1=> Yes");
            $table->boolean('is_featured')->default('0')->comment("0=> No, 1=> Yes");
            $table->boolean('is_social')->default('0')->comment("0=> No, 1=> Yes");
            $table->boolean('provider')->default('0')->comment("0=> Normal,1=> Facebook,2=> Instagram");
            $table->string('lang');
            $table->integer('order_id')->nullable();
            $table->timestamps();
        });

        Schema::create('stores_images', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('store_id')->unsigned()->index();
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
            $table->string('options',1000)->nullable();
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
        Schema::dropIfExists('stores_trans');
        Schema::dropIfExists('stores');
    }
}
