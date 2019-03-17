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
        Schema::create('staff', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->text('mobile')->nullable();
            $table->text('address')->nullable();
            $table->text('image')->nullable();
            $table->enum('role',['1','2','3']);
            $table->enum('gender',['male','female']);
            $table->date('birthDate');
            $table->time('start_at');
            $table->time('end_at');
            $table->enum('weekend',['friday','saturday','sunday','monday','tuesday','thursday','wednsday'])->nullable();
            $table->enum('lang',['en','ar','fr','es'])->nullable();

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
        Schema::dropIfExists('staff');
    }
}
