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
        Schema::create('audit_trails', function (Blueprint $table) {
            $table->id('audit_trail_id');
            $table->string('record_type');
            $table->unsignedBigInteger('record_id');
            $table->string('action_type');
            $table->text('previous_value')->nullable();
            $table->text('new_value')->nullable();
            $table->unsignedBigInteger('performed_by');
            $table->string('ip_address')->nullable();
            $table->text('reason')->nullable();
            $table->string('geolocation')->nullable();
            $table->unsignedBigInteger('company_id');
            $table->timestamps();

            // Foreign keys
            $table->foreign('performed_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('company_id')->references('company_id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('audit_trails');
    }
};
