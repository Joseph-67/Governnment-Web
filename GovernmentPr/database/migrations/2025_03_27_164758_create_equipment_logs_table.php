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
            $table->id();
            $table->unsignedBigInteger('equipment_id');
            $table->unsignedBigInteger('user_id');
            $table->string('action');
            $table->string('equipment_type')->nullable();
            $table->text('description')->nullable();
            $table->integer('capacity')->nullable();
            $table->enum('equipment_status', ['operational', 'under service', 'out of service'])->default('active'); // Added status column
            $table->date('purchase_date')->nullable();
            $table->boolean('is_deleted')->default(false); // Added is_deleted column
            $table->timestamp('logged_at')->useCurrent();
            $table->timestamps();

            $table->foreign('equipment_id')->references('id')->on('equipment')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
