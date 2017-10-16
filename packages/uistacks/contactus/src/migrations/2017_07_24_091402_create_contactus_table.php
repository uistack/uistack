<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //contact section
        Schema::create('contactus_sections', function(Blueprint $table)
        {
            $table->increments('id');
            $table->boolean('active')->default(0);
            $table->timestamps();
        });

        Schema::create('contactus_sections_trans', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('section_id')->unsigned()->index();
            $table->foreign('section_id')->references('id')->on('contactus_sections')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('lang');
            $table->timestamps();
        });
        //contact Us
        Schema::create('contact_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('active')->default(0);
            $table->integer('section_id')->unsigned()->index();
            $table->foreign('section_id')->references('id')->on('contactus_sections')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('contact_request_trans', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('contact_id')->unsigned()->index();
            $table->foreign('contact_id')->references('id')->on('contact_requests')->onDelete('cascade');
            $table->integer('section_id')->unsigned()->index();
            $table->foreign('section_id')->references('id')->on('contactus_sections')->onDelete('cascade');
            $table->string('store_name')->nullable();
            $table->string('store_url')->nullable();
            $table->string('other_info', 1000)->nullable();
            $table->string('contact_subject')->nullable();
            $table->string('contact_message',1000)->nullable();
            $table->string('contact_attachment')->nullable();
            $table->string('contact_request_category')->nullable();
            $table->string('contacted_by')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('reference_no')->nullable();
            $table->boolean('is_read')->default(0);
            $table->boolean('is_reply')->default(0);
            $table->string('lang');
            $table->timestamps();
        });
        //contact Us reply
        Schema::create('contact_request_replies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contact_request_id')->unsigned()->index();
            $table->foreign('contact_request_id')->references('id')->on('contact_requests')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('contact_request_replies_trans', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('contact_request_id')->unsigned()->index();
            $table->foreign('contact_request_id')->references('id')->on('contact_requests')->onDelete('cascade');
            $table->integer('from_user_id')->unsigned()->index();
            $table->foreign('from_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('reply_subject')->nullable();
            $table->string('reply_message',1000)->nullable();
            $table->string('reply_attachment')->nullable();
            $table->string('reply_email')->nullable();
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
        Schema::dropIfExists('contact_request_replies_trans');
        Schema::dropIfExists('contact_request_replies');
        Schema::dropIfExists('contact_request_trans');
        Schema::dropIfExists('contact_requests');
        Schema::dropIfExists('contactus_sections_trans');
        Schema::dropIfExists('contactus_sections');
    }
}
