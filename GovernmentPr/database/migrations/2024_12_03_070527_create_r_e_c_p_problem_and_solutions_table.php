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
        Schema::create('recp_problem_and_solutions', function (Blueprint $table) {
            $table->id('problemSolutionID');
            $table->unsignedBigInteger('companyID');
            $table->string('problem_title', 500);
            $table->string('solution_title', 500);
            $table->enum('status', ['active', 'inactive']);
            $table->foreign('companyID')
            ->references('company_id')
            ->on('companies')
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
        Schema::dropIfExists('recp_problem_and_solutions');
    }
};
