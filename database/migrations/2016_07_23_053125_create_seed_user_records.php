<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\User;

class CreateSeedUserRecords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $user = new User();
        $user->name = "Johnny Doe";
        $user->email = "admin@example.com";
        $user->biography = "I am Jonathan Doe!";
        $user->password = bcrypt("1");
        $user->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        User::where('id', 1)->get()->first()->delete();
    }
}
