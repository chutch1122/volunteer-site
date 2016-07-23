<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('organization_id');
            $table->integer('creator_id');
            $table->integer('address_id');
            $table->string('title');
            $table->text('description');
            //$table->integer('volunteer_quantity');
            $table->timestamp('starts_at');
            $table->timestamp('ends_at');
            $table->timestamp('closed_at');
            $table->softDeletes(); 
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
        Schema::drop('listings');
    }
}
