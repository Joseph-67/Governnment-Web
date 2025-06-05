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
     Schema::create('productionprocesses', function (Blueprint $table) {
    $table->bigIncrements('process_id');
    $table->unsignedBigInteger('company_id'); // Added company_id
    $table->unsignedBigInteger('batch_id');
    $table->string('operation_type');
    $table->timestamp('start_time');
    $table->timestamp('end_time');
    $table->unsignedBigInteger('operator_id');
    $table->enum('status', ['Pending', 'In Progress', 'Completed'])->default('Completed');
    $table->text('remarks')->nullable();

    // Foreign key constraints
    $table->foreign('company_id')->references('company_id')->on('companies')->onDelete('cascade');
    $table->foreign('batch_id')->references('batch_id')->on('production_batch_tracking')->onDelete('cascade');
    $table->foreign('operator_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('productionprocesses');
    }
};
