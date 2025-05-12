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
        Schema::create('iot_devices', function (Blueprint $table) {
            $table->id("iot_device_id");
            $table->string('device_name');
            $table->unsignedBigInteger('company_id');
            $table->string('device_location');
            $table->enum('status', ['Active', 'Offline'])->default('Active');
            $table->timestamp('last_maintenance_date')->nullable();
            $table->foreign('company_id')->references('company_id')->on('companies');
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
        Schema::dropIfExists('iot_devices');
    }
};
