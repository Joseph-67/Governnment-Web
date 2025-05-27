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
        Schema::create('company_employees_attendances', function (Blueprint $table) {
            $table->id('AttendanceID');
            $table->unsignedBigInteger('CompanyID');
            $table->unsignedBigInteger('EmployeeID');
            $table->dateTime('CheckIn')->nullable();
            $table->dateTime('CheckOut')->nullable();
            $table->enum('Status', ['Present', 'Absent', 'On Leave', 'Late']);
            $table->text('Remarks')->nullable();
            $table->timestamps();
$table->foreign('CompanyID')->references('CompanyID')->on('companies');
            $table->foreign('EmployeeID')->references('EmployeeID')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_employees_attendances');
    }
};
