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
        Schema::create('company_recruitments', function (Blueprint $table) {
            $table->id('RecruitmentID');
            $table->string('JobTitle', 100);
            $table->unsignedBigInteger('DepartmentID');
            $table->integer('VacancyCount');
            $table->text('JobDescription')->nullable();
            $table->date('PostingDate');
            $table->date('ClosingDate');
            $table->enum('Status', ['Open', 'Closed', 'Paused']);
            $table->timestamps();
            $table->unsignedBigInteger('CompanyID');
            $table->foreign('CompanyID')->references('CompanyID')->on('Companies');
            $table->foreign('DepartmentID')->references('DepartmentID')->on('Departments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_recruitments');
    }
};
