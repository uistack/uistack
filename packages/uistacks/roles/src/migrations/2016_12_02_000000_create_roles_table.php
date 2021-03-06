<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Roles table
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('created_by')->unsigned()->index()->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->integer('updated_by')->unsigned()->index()->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('active')->default(1);
            $table->timestamps();
        });

        // Roles translation table
        Schema::create('roles_trans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id')->unsigned()->index()->nullable();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('lang');
            $table->timestamps();
        });

        // Roles and users relation table
        Schema::create('users_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id')->unsigned()->index()->nullable();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_roles');
        Schema::dropIfExists('roles_trans');
        Schema::dropIfExists('roles');        
    }
}
