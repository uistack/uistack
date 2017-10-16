<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('created_by')->unsigned()->index()->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->integer('updated_by')->unsigned()->index()->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('active');
            $table->timestamps();
        });

        Schema::create('countries_trans', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('country_id')->unsigned()->index();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('iso_code',20)->nullable();
            $table->string('iso3',20)->nullable();
            $table->string('phone_code',20)->nullable();
            $table->string('numcode',20)->nullable();
            $table->string('phone_length',20)->nullable();
            $table->string('phone_starting_number',20)->nullable();
            $table->string('flag',255)->nullable();
            $table->string('lang');
            $table->timestamps();
        });

        Schema::create('areas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('country_id')->unsigned()->index()->nullable();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->integer('created_by')->unsigned()->index()->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->integer('updated_by')->unsigned()->index()->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('active');
            $table->timestamps();
        });

        Schema::create('areas_trans', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('area_id')->unsigned()->index()->nullable();
            $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade');
            $table->string('name');
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
        Schema::dropIfExists('areas_trans');
        Schema::dropIfExists('areas');
        Schema::dropIfExists('countries_trans');
        Schema::dropIfExists('countries');
    }
}
