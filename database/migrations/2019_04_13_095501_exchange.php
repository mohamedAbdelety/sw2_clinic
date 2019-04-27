<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Exchange extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exchanges', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->float('value')->default(0.0);
            $table->enum('type',['standard','varient']);
            $table->enum('peroid_type',['daily','monthly','yearly']);
            $table->enum('category',['maintenance','rent','water','electricity','Charity','medical consumption','other']);
            $table->integer('day')->nullable();
            $table->integer('month')->nullable();
            $table->integer('year')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exchanges');
    }
}
