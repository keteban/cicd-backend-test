<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 70)->nullable(false);
            $table->string('last_name', 70)->nullable(false);
            $table->string('phone', 15)->nullable(true);
            $table->string('email', 50)->nullable(true);
            $table->float('work_hours')->nullable(false);
            $table->integer('hourly_rate')->nullable(false)->default(0);
            $table->integer('salary_type')->nullable(false);
            $table->integer('salary')->nullable(false);
            $table->integer('department')->nullable(false);
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
