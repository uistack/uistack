<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('created_by')->unsigned()->index()->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->integer('updated_by')->unsigned()->index()->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->longText('article_url')->nullable();
            $table->boolean('active')->default(1);
            $table->boolean('article_type')->default(1);
            $table->boolean('published');
            $table->timestamps();
        });

        Schema::create('articles_trans', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('article_id')->unsigned()->index();
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->text('options')->nullable();//json
            $table->text('article_seo_title')->nullable();
            $table->text('article_meta_keywords')->nullable();
            $table->text('article_meta_descriptions')->nullable();
            $table->string('lang');
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
        Schema::dropIfExists('articles_trans');
        Schema::dropIfExists('articles');
    }
}
