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
        Schema::create('water_usage_logs', function (Blueprint $table) {
            $table->id('WaterUsageLogsID');
            $table->unsignedBigInteger('companyID');
            $table->unsignedBigInteger('WaterSources_id');
            $table->decimal('quantity_used', 10, 2);
            $table->string('unit', 20)->nullable();
            $table->date('usage_date')->nullable();
            $table->text('purpose');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
            $table->foreign('companyID')->references('company_id')->on('companies');
            $table->foreign('WaterSourcesId')->references('WaterSourcesId')->on('water_sources');
          
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('water_usage_logs');
    }
};
