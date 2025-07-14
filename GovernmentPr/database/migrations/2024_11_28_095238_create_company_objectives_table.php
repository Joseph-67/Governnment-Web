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
        Schema::create('company_objectives', function (Blueprint $table) {
            $table->id('companyobjectiveID');
            $table->unsignedBigInteger('companyID');
            $table->unsignedBigInteger('objective_id')->unique();
            $table->foreign('objective_id')
                  ->references('objective_id')
                  ->on('objectives')
                  ->onDelete('cascade');
            $table->foreign('companyID')
                    ->references('company_id')
                    ->on('companies')
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
        Schema::dropIfExists('company_objectives');
    }
};
