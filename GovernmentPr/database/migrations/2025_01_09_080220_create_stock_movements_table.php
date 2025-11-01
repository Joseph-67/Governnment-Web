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
        Schema::create('stock_movements', function (Blueprint $table) {
            $table->id('stockID');
            $table->unsignedBigInteger('companyMaterialId');
            $table->unsignedBigInteger('materialID');
            $table->unsignedBigInteger('companyID');
            $table->enum('movement_type', ['in', 'out', 'transfer', 'adjustment'])->nullable();
            $table->string('quantity');
            $table->string('batch_number')->nullable();
            $table->string('source')->nullable();
            $table->string('usage_reason')->nullable();
            $table->string('calendar_year');
            $table->string('movement_date');
            $table->string('remark')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->foreign('companyMaterialId')->references('companyMaterialId')->on('company_materials');
            $table->foreign('materialID')->references('materialID')->on('materials');
            $table->foreign('companyID')->references('company_id')->on('companies');
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
        Schema::dropIfExists('stock_movements');
    }
};
