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
        Schema::create('equipment_logs', function (Blueprint $table) {
            $table->id('equipment_log_id');
            $table->string('equipment_name')->nullable();
            $table->string('equipment_code')->nullable();
            $table->unsignedBigInteger('equipment_type_id');
            $table->string('equipment_model')->nullable();
            $table->string('equipment_serial_number')->nullable();
            $table->string('equipment_brand')->nullable();
            $table->string('equipment_location')->nullable();
            $table->string('equipment_image')->nullable();
            $table->string('equipment_color')->nullable();
            $table->string('equipment_size')->nullable();
            $table->string('equipment_weight')->nullable();
            $table->enum('equipment_condition', ['new', 'good', 'fair', 'poor'])->nullable();
            $table->string('equipment_warranty')->nullable();
            $table->string('equipment_maintenance_schedule')->nullable();
            $table->string('equipment_maintenance_status')->nullable();
            $table->string('equipment_maintenance_notes')->nullable();
            $table->string('equipment_maintenance_date')->nullable();
            $table->string('equipment_maintenance_cost')->nullable();
            $table->string('equipment_maintenance_provider')->nullable();
            $table->string('equipment_maintenance_contact')->nullable();
            $table->string('equipment_maintenance_phone')->nullable();
            $table->string('equipment_maintenance_email')->nullable();
            $table->text('description')->nullable();
            $table->enum('equipment_status', ['operational', 'under service', 'out of service'])->nullable(); // Added status column
            $table->date('purchase_date')->nullable();
            $table->boolean('is_deleted')->default(false); // Added is_deleted column
            $table->unsignedBigInteger('company_id'); // Added company_id column
            $table->timestamp('logged_at')->useCurrent();
            $table->timestamps();

            $table->foreign('equipment_type_id')->references('equipment_type_id')->on('equipment_types')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade'); // Added foreign key for company_id
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipment_logs');
    }
};
