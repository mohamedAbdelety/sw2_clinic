<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Doctors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('id');
            $table->float('Dectsalary')->default(0.0);
            $table->tinyInteger('experience')->default(0);
            $table->text('qualification')->nullable();

            $table->enum('specail',['Dentist','Surgeon','Psychiatrist','Internist','pediatrician','Dermatologist','Anesthetist']);
            $table->enum('position',['specialist','Advisory']);

            $table->integer('staff_id')->unsigned();
            $table->foreign('staff_id')->references('id')->on('staff')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('doctors');
    }
}
