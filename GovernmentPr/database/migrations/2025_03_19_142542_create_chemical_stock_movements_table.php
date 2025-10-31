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
        Schema::create('chemical_stock_movements', function (Blueprint $table) {
            $table->id('stockID');
            $table->unsignedBigInteger('company_chemical_id');
            $table->unsignedBigInteger('chemical_id');
            $table->unsignedBigInteger('company_id');
            $table->enum('movement_type', ['in', 'out', 'transfer', 'adjustment'])->nullable();
            $table->string('quantity');
            $table->string('calendar_year');
            $table->date('movement_date');
            $table->string('remark')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->foreign('company_chemical_id')->references('company_chemical_id')->on('company_chemicals');
            $table->foreign('chemical_id')->references('chemical_id')->on('chemicals')->onDelete('cascade');
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
        Schema::dropIfExists('chemical_stock_movements');
    }
};
