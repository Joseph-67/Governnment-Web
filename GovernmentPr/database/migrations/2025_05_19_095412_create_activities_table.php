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
        Schema::create('activities', function (Blueprint $table) {
            $table->id('ActivityID');
            $table->unsignedBigInteger('LogID');
            $table->string('ActivityName', 255);
            $table->unsignedBigInteger('OperationTypeId');
            $table->date('ActivityStartDate');
            $table->date('ActivityEndDate');
            $table->text('Objective')->nullable();
            $table->text('Description')->nullable();
            $table->json('MaterialUsage')->nullable();
            $table->json('ChemicalUsage')->nullable();
            $table->decimal('WaterUsage', 12, 2)->nullable();
            $table->enum('Priority', ['Low', 'Medium', 'High'])->default('Medium');
            $table->json('Tags')->nullable();
            $table->string('ExternalReference', 255)->nullable();
            $table->timestamps();
            $table->foreign('LogID')->references('annual_op_metadata_ID')->on('annual_operation_metadata');
            $table->foreign('OperationTypeId')->references('operation_type_id')->on('operation_types')->onDelete('cascade');
            $table->boolean('is_deleted')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
};
