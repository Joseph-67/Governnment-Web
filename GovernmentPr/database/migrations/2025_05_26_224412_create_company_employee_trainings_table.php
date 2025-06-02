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
        Schema::create('company_employee_trainings', function (Blueprint $table) {
            $table->id('TrainingID');
            $table->unsignedBigInteger('EmployeeID');
            $table->unsignedBigInteger('ProgramID');
            $table->enum('CompletionStatus', ['Not Started', 'In Progress', 'Completed']);
            $table->timestamps();
            $table->unsignedBigInteger('CompanyID');
            $table->foreign('CompanyID')->references('CompanyID')->on('Companies');
            $table->foreign('EmployeeID')->references('EmployeeID')->on('Employees');
            $table->foreign('ProgramID')->references('ProgramID')->on('TrainingPrograms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_employee_trainings');
    }
};
