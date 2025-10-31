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
            $table->decimal('quantity_per_unit', 15, 2)->nullable();
            $table->string('unit')->nullable();
            $table->string('minimum_threshold')->nullable();
            $table->string('maximum_threshold')->nullable();
            $table->string('storage_location')->nullable();
            $table->boolean('hazardous')->default(false);
            $table->enum('status', ['active', 'inactive', 'banned'])->default('active');
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();
            $table->foreign('companyID')->references('company_id')->on('companies')->onDelete('cascade');
            $table->foreign('materialID')->references('materialID')->on('materials')->onDelete('cascade');
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
