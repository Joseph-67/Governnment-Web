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
            $table->string('batch_name');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('product_id');
            $table->timestamp('start_date');
            $table->timestamp('end_date');
            $table->integer('total_quantity')->nullable();
            $table->integer('defective_quantity')->nullable();
            $table->decimal('yield_percentage', 5, 2)->nullable();
            $table->string('created_by');
            $table->string('geolocation')->nullable();
            $table->unsignedBigInteger('iot_device_id')->nullable();
            $table->decimal('predicted_defect_rate', 5, 2)->nullable();
            $table->unsignedBigInteger('audit_trail_id')->nullable();
            $table->enum('status', ['In Progress', 'Completed', 'Rejected'])->default('Completed');

            $table->foreign('company_id')->references('company_id')->on('companies');
            $table->foreign('product_id')->references('product_id')->on('products');
            $table->foreign('iot_device_id')->references('iot_device_id')->on('iot_devices')->onDelete('set null');
            $table->foreign('audit_trail_id')->references('audit_trail_id')->on('audit_trails')->onDelete('set null');

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
