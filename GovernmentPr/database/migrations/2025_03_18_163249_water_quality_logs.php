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
        //
        Schema::create('water_quality_logs', function (Blueprint $table) {
            $table->id('quality_id');
            $table->unsignedBigInteger('companyID');
            $table->date('test_date');
            $table->decimal('ph_level', 10, 2);
            $table->decimal('turbidity', 10, 2);
            $table->text('contaminants');
            $table->text('test_results');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
            $table->foreign('companyID')->references('company_id')->on('companies');
    });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
