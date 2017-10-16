<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->boolean('email_show')->default(0);
            $table->boolean('email_confirmed')->default(0);
            $table->string('iso2',5)->nullable();
            $table->string('phone')->unique()->nullable();
            $table->boolean('phone_show')->default(0);
            $table->boolean('phone_confirmed')->default(0);
            $table->integer('country_id')->unsigned()->index()->nullable();
            $table->integer('area_id')->unsigned()->index()->nullable();
            $table->string('confirmation_code')->nullable();
            $table->string('email_code')->nullable();
            $table->integer('created_by')->unsigned()->index()->nullable();
            $table->integer('updated_by')->unsigned()->index()->nullable();
            $table->string('password', 60);
            $table->text('options')->nullable();//json
            $table->boolean('confirmed')->default(0);
            $table->boolean('active')->default(0);
            $table->string('username')->nullable();
            $table->string('phone_code')->nullable();
            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
