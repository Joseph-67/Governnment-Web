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
        Schema::create('company_wastes', function (Blueprint $table) {
            $table->id('company_waste_id');
            $table->unsignedBigInteger('company_id');
            $table->string('waste_name');
            $table->string('waste_type');
            $table->string('unit'); // Retained unit column
            $table->boolean('is_active')->default(true); // Added is_active column
            $table->boolean('is_delete')->default(false); // Added is_delete column
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_wastes');
    }
};
