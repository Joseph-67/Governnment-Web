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
        Schema::create('company_chemicals', function (Blueprint $table) {
            $table->id('company_chemical_id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('chemical_id');
            $table->string('unit')->nullable();
            $table->string('threshold')->nullable();
            $table->enum('status', ['active', 'inactive', 'banned'])->default('active');
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();
            $table->foreign('company_id')->references('company_id')->on('companies')->onDelete('cascade');
            $table->foreign('chemical_id')->references('chemical_id')->on('chemicals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_chemicals');
    }
};
