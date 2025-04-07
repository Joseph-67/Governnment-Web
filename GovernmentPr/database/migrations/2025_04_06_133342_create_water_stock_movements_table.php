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
        Schema::create('water_stock_movements', function (Blueprint $table) {
            $table->id('waterStockID');
            $table->unsignedBigInteger('water_source_id');
            $table->unsignedBigInteger('company_id');
            $table->enum('movement_type', ['in', 'out', 'transfer', 'recycling'])->nullable();
            $table->decimal('volume', 10, 2);
            $table->unsignedBigInteger('calendar_year_id');
            $table->foreign('calendar_year_id')->references('calendar_year_id')->on('calendar_years')->onDelete('cascade');
            $table->date('movement_date');
            $table->text('remark')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->foreign('water_source_id')->references('id')->on('water_sources')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
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
        Schema::dropIfExists('water_stock_movements');
    }
};
