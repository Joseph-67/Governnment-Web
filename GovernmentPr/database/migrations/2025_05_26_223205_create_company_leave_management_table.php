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
        Schema::create('company_leave_management', function (Blueprint $table) {
            $table->id('LeaveRequestID');
            $table->unsignedBigInteger('EmployeeID');
            $table->enum('LeaveType', ['Sick Leave', 'Casual Leave', 'Paid Leave', 'Unpaid Leave']);
            $table->date('StartDate');
            $table->date('EndDate');
            $table->enum('Status', ['Pending', 'Approved', 'Rejected']);
            $table->text('Remarks')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('CompanyID');
            $table->foreign('CompanyID')->references('CompanyID')->on('Companies');
            $table->foreign('EmployeeID')->references('EmployeeID')->on('Employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_leave_management');
    }
};
