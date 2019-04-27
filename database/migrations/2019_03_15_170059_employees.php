<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Employees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('mobile')->nullable();
            $table->text('address')->nullable();
            $table->float('salary')->default(0.0);
            $table->enum('gender',['male','female']);
            $table->date('birthDate')->nullable();
            $table->time('start_at');
            $table->time('end_at');
            $table->integer('last_month')->default(0);
            $table->integer('last_year')->default(0);
            $table->integer('month_number')->default(0);
            $table->enum('weekend',['friday','saturday','sunday','monday','tuesday','thursday','wednsday'])->nullable();
            $table->enum('title',['security','nurse','office boy','cleaning','techniql','reception','call center','other']);
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
        Schema::dropIfExists('employees');
    }
}
