<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_templates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('created_by')->unsigned()->index()->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->integer('updated_by')->unsigned()->index()->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('active');
            $table->timestamps();
        });
        Schema::create('email_templates_trans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('etemplate_id')->unsigned()->index()->nullable();
            $table->foreign('etemplate_id')->references('id')->on('email_templates')->onDelete('cascade');
            $table->string('subject',255)->nullable();
            $table->string('lang',20)->nullable();
            $table->text('html_content',5000)->nullable();
            $table->string('template_key',500)->nullable();
            $table->string('template_keywords',1000)->nullable();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('email_templates');
    }
}
