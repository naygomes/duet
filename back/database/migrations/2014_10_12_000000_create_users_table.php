<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('date_of_birth')->nullable();
            $table->string('image_url')->default('https://us.123rf.com/450wm/alexlaplun/alexlaplun1804/alexlaplun180400001/98626020-stock-vector-cute-funny-man-with-headphones-music-tune-or-song-pleasure-and-relaxation-cartoon-vector-illustratio.jpg?ver=6')->nullable();
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
