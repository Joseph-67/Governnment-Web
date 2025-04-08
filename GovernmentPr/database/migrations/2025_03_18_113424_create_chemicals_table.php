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
        Schema::create('chemicals', function (Blueprint $table) {
            $table->id('chemical_id');
            $table->string('name');
            $table->unsignedBigInteger('chemical_category_id');
            $table->foreign('chemical_category_id')->references('categoryID')->on('categories')->onDelete('cascade');
            $table->string('chemical_image')->nullable();
            $table->string('cas_number')->nullable();
            $table->string('ec_number')->nullable();
            $table->string('reach_registration_number')->nullable();
            $table->string('ghs_classification')->nullable();
            $table->text('description')->nullable();
            $table->string('formula')->nullable();
            $table->string('hazard_information')->nullable();
            $table->string('first_aid')->nullable();
            $table->string('fire_fighting')->nullable();
            $table->string('accidental_release')->nullable();
            $table->string('storage_handling')->nullable();
            $table->string('disposal')->nullable();
            $table->boolean('is_deleted')->default(false);
            $table->string('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->enum('approve_rejected_status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->string('approved_rejected_comment')->nullable();
            $table->timestamp('approved_reject_at')->nullable();
            $table->string('approved_rejected_by')->nullable();
            $table->enum('status', ['active', 'inactive', 'banned'])->default('active');
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
        Schema::dropIfExists('chemicals');
    }
};
