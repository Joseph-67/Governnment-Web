<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('recurrence_rules', function (Blueprint $table) {
            $table->id('recurrence_rule_id');
            $table->unsignedBigInteger('company_id'); // Foreign key to the event this rule
            $table->string('frequency'); // e.g., daily, weekly, monthly
            $table->integer('interval')->default(1); // interval between recurrences
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->json('by_day')->nullable(); // days of week, e.g., ["MO", "WE"]
            $table->json('by_month')->nullable(); // months, e.g., [1, 3, 12]
            $table->integer('count')->nullable(); // number of occurrences
            $table->boolean('is_active')->default(true); // whether the rule is active
            $table->foreign('company_id')->references('company_id')->on('companies')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recurrence_rules');
    }
};
