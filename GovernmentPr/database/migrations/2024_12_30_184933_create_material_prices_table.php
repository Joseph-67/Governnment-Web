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
        Schema::create('material_prices', function (Blueprint $table) {
            $table->id('materialPriceID');
            $table->unsignedBigInteger('companyMaterialID');
            $table->string('units')->nullable();
            $table->string('price');
            $table->string('date')->nullable();
            $table->enum('status', ['active', 'inactive']);

            $table->foreign('companyMaterialID')
            ->references('companyMaterialId')
            ->on('company_materials')
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
        Schema::dropIfExists('material_prices');
    }
};
