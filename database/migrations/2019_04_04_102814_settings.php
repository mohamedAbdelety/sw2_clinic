<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Settings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('settings', function (Blueprint $table) {
             $table->increments('id');
            $table->string('sitename');
            $table->string('logo')->nullable();
            $table->string('main_lang')->default('en');
            $table->longtext('description')->nullable();
            $table->longtext('keywords')->nullable();
            // 1 open
            // 2 close
            // 3 close for patient
            // 4 close for hr
            // 5 close for fr
            // 6 close for doctor
            // 7 close for secratry
            // 8 close for specific mail
            $table->enum('status',['1','2','3','4','5','6','7'])->default('1');
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instgram')->nullable();
            $table->string('location')->nullable();
            $table->string('phone')->nullable();
            $table->longtext('message_maintance_frontend')->nullable();
            $table->longtext('message_maintance_backend')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
