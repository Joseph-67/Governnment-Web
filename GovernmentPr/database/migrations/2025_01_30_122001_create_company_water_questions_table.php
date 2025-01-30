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
        Schema::create('company_water_questions', function (Blueprint $table) {
            $table->id('companyWaterQuestionID');
            $table->unsignedBigInteger('companyID');
            $table->unsignedBigInteger('questionID');
            $table->foreign('companyID')
                    ->references('company_id')
                    ->on('companies')
                    ->onDelete('cascade');
            $table->foreign('questionID')
                    ->references('questionId')
                    ->on('water_questionaires')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('company_water_questions');
    }
};
