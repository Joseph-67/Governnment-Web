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
        Schema::create('company_materials', function (Blueprint $table) {
            $table->id('companyMaterialId');
            $table->unsignedBigInteger('companyID');
            $table->unsignedBigInteger('materialID');
            $table->string('serial_number', 225)->nullable();
            $table->string('unit_of_measure')->nullable();
            $table->string('threshold_quantity', 225)->nullable();
            $table->enum('status', ['active', 'inactive']);
            $table->foreign('companyID')
            ->references('company_id')
            ->on('companies')
            ->onDelete('cascade');
            $table->foreign('materialID')
            ->references('materialID')
            ->on('materials')
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
        Schema::dropIfExists('company_materials');
    }
};
