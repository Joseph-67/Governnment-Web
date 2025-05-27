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
        // Check if the table does not already exist
        if (!Schema::hasTable('recp_areas_of_benefits')) {
            Schema::create('recp_areas_of_benefits', function (Blueprint $table) {
                $table->id('areaBenefitID');
                $table->unsignedBigInteger('companyID');
                $table->string('benefit_title', 500);
                $table->enum('status', ['active', 'inactive']);
                
                // Foreign key constraint
                $table->foreign('companyID')
                    ->references('company_id')
                    ->on('companies')
                    ->onDelete('cascade');

                // Timestamps
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recp_areas_of_benefits');
    }
};
