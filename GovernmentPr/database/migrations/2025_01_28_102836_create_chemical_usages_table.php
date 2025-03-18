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
        Schema::create('chemical_usages', function (Blueprint $table) {
            $table->id('usage_id');
            $table->foreignId('chemical_id')->constrained('chemicals');
            $table->foreignId('company_id')->constrained('companies');
            $table->integer('quantity_used');
            $table->string('unit')->nullable();
            $table->text('purpose')->nullable();
            $table->date('usage_date');
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
        Schema::dropIfExists('chemical_usages');
    }
};
