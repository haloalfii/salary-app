<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_salaries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('salary_id');
            $table->foreignId('deduction_id');
            $table->foreignId('emp_id');
            $table->string('period');
            $table->integer('period_effective');
            $table->integer('emp_presence');
            $table->integer('emp_non_presence');
            $table->integer('emp_leave');
            $table->integer('total');
            $table->integer('total_after_deduction');
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
        Schema::dropIfExists('employee_salaries');
    }
};
