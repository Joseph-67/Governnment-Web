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
        Schema::create('company_employees', function (Blueprint $table) {
            $table->id('EmployeeID');
            $table->unsignedBigInteger('CompanyID');
            $table->string('FirstName', 50);
            $table->string('LastName', 50);
            $table->string('Email', 100)->unique();
            $table->string('PhoneNumber', 20)->nullable();
            $table->date('DateOfBirth')->nullable();
            $table->enum('Gender', ['Male', 'Female', 'Other'])->nullable();
            $table->string('JobTitle', 100)->nullable();
            $table->unsignedBigInteger('DepartmentID')->nullable();
            $table->unsignedBigInteger('ManagerID')->nullable();
            $table->date('HireDate')->nullable();
            $table->enum('Status', ['Active', 'Inactive', 'On Leave', 'Terminated'])->default('Active');
            $table->text('Address')->nullable();
            $table->string('City', 50)->nullable();
            $table->string('State', 50)->nullable();
            $table->string('ZipCode', 10)->nullable();
            $table->string('Country', 50)->nullable();
            $table->string('EmergencyContact', 100)->nullable();
            $table->string('EmergencyPhone', 20)->nullable();
            $table->string('ProfilePicture')->nullable();
            $table->string('EmployeeNumber', 30)->nullable();
            $table->string('password');
            $table->timestamp('LastLogin')->nullable();
            $table->timestamps();

            $table->foreign('CompanyID')->references('CompanyID')->on('companies')->onDelete('cascade');
            $table->foreign('DepartmentID')->references('DepartmentID')->on('departments')->onDelete('set null');
            $table->foreign('ManagerID')->references('EmployeeID')->on('company_employees')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_employees');
    }
};
