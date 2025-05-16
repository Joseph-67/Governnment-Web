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
        Schema::create('annual_operation_metadata', function (Blueprint $table) {
            $table->id('annual_op_metadata_ID');
            $table->bigInteger('company_id')->notNullable();
            $table->string('OperationName');
            $table->bigInteger('year')->notNullable();
            $table->integer('annual_no_of_operation')->nullable();
            $table->json('PreparedBy')->notNullable();
            $table->timestamp('DateCreated')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('LastUpdated')->default(DB::raw('CURRENT_TIMESTAMP'))->useCurrentOnUpdate();
            $table->boolean('is_deleted')->default(false);
            $table->foreign('year')->references('calendar_year_id')->on('calendar_years')->onDelete('cascade');
            $table->foreign('company_id')->references('company_id')->on('companies')->onDelete('cascade');
            $table->enum('Status', ['Draft', 'Published', 'Archived'])->default('Draft');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('metadatatas');
    }
};
