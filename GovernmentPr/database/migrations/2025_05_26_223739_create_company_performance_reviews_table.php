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
        Schema::create('company_performance_reviews', function (Blueprint $table) {
            $table->id('ReviewID');
            $table->unsignedBigInteger('EmployeeID');
            $table->date('ReviewDate');
            $table->unsignedBigInteger('ReviewerID');
            $table->decimal('Rating', 3, 2);
            $table->text('Comments')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('CompanyID');
            $table->foreign('CompanyID')->references('CompanyID')->on('companies');
            $table->foreign('EmployeeID')->references('EmployeeID')->on('employees');
            $table->foreign('ReviewerID')->references('EmployeeID')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_performance_reviews');
    }
};
