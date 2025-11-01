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
        Schema::create('chemical_stock_movements', function (Blueprint $table) {
            $table->id('chemicalStockID');

            // relationships
            $table->unsignedBigInteger('company_chemical_id');
            $table->unsignedBigInteger('chemical_id');
            $table->unsignedBigInteger('company_id');
            $table->string('batch_number')->nullable()->index();

            // Transaction details
            $table->enum('transaction_type', ['checkin', 'checkout', 'transfer', 'adjustment', 'disposal', 'return'])->nullable();
            $table->enum('adjustment_type', ['increase', 'decrease'])->nullable();
            
            $table->decimal('quantity', 15, 2)->default(0);
            
            // Transfer/Storage locations
            $table->string('source_location')->nullable();
            $table->string('destination_location')->nullable();
            
            // reference data
            $table->unsignedBigInteger('reference_id')->nullable()->comment('References related records, e.g., transfer ID, disposal ID');
            $table->string('reference_type')->nullable()->comment('Type of reference, e.g., transfer, disposal');
            $table->string('production_batch_number')->nullable()->comment('Human-readable reference number');

            // transaction metadata
            $table->string('guard')->nullable();
            $table->unsignedBigInteger('performed_by')->nullable();
            $table->string('calendar_year');
            $table->timestamp('transaction_date')->useCurrent();

            // disposal method
            $table->unsignedBigInteger('disposal_method_id')->nullable();


            $table->string('remark')->nullable();
            $table->string('reason')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->foreign('company_chemical_id')->references('company_chemical_id')->on('company_chemicals');
            $table->foreign('chemical_id')->references('chemical_id')->on('chemicals')->onDelete('cascade');
            $table->foreign('company_id')->references('company_id')->on('companies');
            $table->foreign('disposal_method_id')->references('disposal_method_id')->on('disposal_methods');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chemical_stock_movements');
    }
};
