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
        Schema::create('company_payrolls', function (Blueprint $table) {
            $table->id('PayrollID');
            $table->unsignedBigInteger('CompanyID');
            $table->unsignedBigInteger('EmployeeID');
            $table->decimal('BasicSalary', 10, 2);
            $table->decimal('Allowances', 10, 2);
            $table->decimal('Deductions', 10, 2);
            $table->decimal('NetPay', 10, 2);
            $table->date('PayDate');
            $table->date('PayPeriodStart');
            $table->date('PayPeriodEnd');
            $table->timestamps();

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
        Schema::dropIfExists('company_payrolls');
    }
};
