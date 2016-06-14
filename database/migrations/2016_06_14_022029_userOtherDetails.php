<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserOtherDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_other_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('profile_image');
            $table->string('designation');
            $table->longText('about');
            $table->string('skype_id');
            $table->string('address');
            $table->string('phine_number');
            $table->string('employee_id');
            $table->string('team_lead');
            $table->string('hod');
            $table->string('facebook_link');
            $table->string('web_link');
            $table->string('github_link');
            $table->integer('is_active')->default('1');
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
        Schema::drop('user_other_detail');
    }
}
