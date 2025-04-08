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
        Schema::create('waste_disposals', function (Blueprint $table) {
            $table->id('waste_disposal_id');
            $table->string('waste_type');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('company_waste_id');
            $table->unsignedBigInteger('operation_id');
            $table->unsignedBigInteger('calendar_year_id');
            $table->integer('quantity');
            $table->string('disposal_method');
            $table->date('disposal_date');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->foreign('operation_id')->references('company_operation_id')->on('company_operations');
            $table->foreign('calendar_year_id')->references('calendar_year_id')->on('calendar_years');
            $table->foreign('company_waste_id')->references('company_waste_id')->on('company_wastes');
            $table->foreign('company_id')->references('company_id')->on('companies');
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
        Schema::dropIfExists('waste_disposals');
    }
};
