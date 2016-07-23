<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPivotTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certification_user', function(Blueprint $table){
            $table->integer('certification_id');
            $table->integer('user_id');
        });

        Schema::create('skill_user', function(Blueprint $table){
            $table->integer('skill_id');
            $table->integer('user_id');
        });

        Schema::create('category_user', function(Blueprint $table){
            $table->integer('category_id');
            $table->integer('user_id');
        });

        Schema::create('contact_user', function(Blueprint $table){
            $table->integer('contact_id');
            $table->integer('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('certification_user');
        Schema::drop('skill_user');
        Schema::drop('category_user');
        Schema::drop('contact_user');
    }
}
