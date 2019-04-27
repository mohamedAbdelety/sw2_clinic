<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Detections extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('observation')->default('0');
            $table->string('finish')->default('0');
            $table->string('send')->default('0');
            $table->string('pull')->default('0');
            $table->float('price');
            $table->longtext('prescription');
            $table->integer('doctor_id')->unsigned();
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('patient_id')->unsigned();
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('detection_id')->unsigned()->nullable();
            $table->foreign('detection_id')->references('id')->on('detections')->onDelete('cascade')->onUpdate('cascade');
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
         Schema::dropIfExists('detections');
    }
}
