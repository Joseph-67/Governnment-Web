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
        Schema::create('production_batch_tracking', function (Blueprint $table) {
            $table->id('batch_id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('product_id');
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->integer('total_quantity');
            $table->integer('defective_quantity');
            $table->decimal('yield_percentage', 5, 2)->nullable();
            $table->unsignedBigInteger('created_by');
            $table->string('geolocation')->nullable();
            $table->unsignedBigInteger('iot_device_id')->nullable();
            $table->decimal('predicted_defect_rate', 5, 2)->nullable();
            $table->unsignedBigInteger('audit_trail_id')->nullable();
            $table->string('status');

            $table->foreign('company_id')->references('company_id')->on('companies')->onDelete('cascade');
            $table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade');
            $table->foreign('iot_device_id')->references('id')->on('iot_devices')->onDelete('set null');
            $table->foreign('audit_trail_id')->references('id')->on('audit_trails')->onDelete('set null');

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
        //
    }
};
