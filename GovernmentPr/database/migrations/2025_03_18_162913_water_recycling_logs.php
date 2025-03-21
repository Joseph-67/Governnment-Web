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
        //
        Schema::create('water_recycling_logs', function (Blueprint $table) {
            $table->id('recycling_id');
            $table->unsignedBigInteger('companyID');
            $table->decimal('quantity_recycled', 10, 2);
            $table->string('unit', 20);
            $table->date('recycling_date');
            $table->string('method', 100);

            $table->foreign('companyID')->references('company_id')
            ->on('companies')
            ->onDelete('cascade');
            $table->enum('status', ['active', 'inactive'])->default('active');});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
