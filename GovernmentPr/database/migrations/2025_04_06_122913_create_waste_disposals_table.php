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
            $table->unsignedBigInteger('operation_type_id');
            $table->integer('quantity');
            $table->string('disposal_method');
            $table->unsignedBigInteger('calendar_year_id');
            $table->date('disposal_date');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->foreign('operation_type_id')->references('operation_type_id')->on('operation_types');
            $table->foreign('calendar_year_id')->references('calendar_year_id')->on('calendar_years');
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
