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
            $table->unsignedBigInteger('company_id');
            $table->string('movement_type');
            $table->string('quantity');
            $table->string('calendar_year');
            $table->string('movement_date');
            $table->string('remark');
            $table->enum('status', ['active', 'inactive']);
            $table->foreign('companyMaterialId')->references('companyMaterialId')->on('company_materials');
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
        Schema::dropIfExists('stock_movements');
    }
};
