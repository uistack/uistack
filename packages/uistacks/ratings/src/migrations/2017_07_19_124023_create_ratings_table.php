<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('created_by')->unsigned()->index()->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->integer('updated_by')->unsigned()->index()->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->integer('store_id')->unsigned()->index()->nullable();
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
            $table->boolean('active');
            $table->timestamps();
        });

        Schema::create('ratings_trans', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('rating_id')->unsigned()->index()->nullable();
            $table->foreign('rating_id')->references('id')->on('ratings')->onDelete('cascade');
            $table->decimal('rating')->nullable();
            $table->longText('comment')->nullable();
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
        Schema::dropIfExists('ratings_trans');
        Schema::dropIfExists('ratings');
    }
}
