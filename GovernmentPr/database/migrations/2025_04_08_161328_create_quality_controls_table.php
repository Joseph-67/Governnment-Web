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
        Schema::create('quality_controls', function (Blueprint $table) {
            $table->id('quality_control_id');
            $table->unsignedBigInteger('company_id');
            $table->string('quality_metric');
            $table->string('acceptable_range');
            $table->string('measurement_frequency');
            $table->string('responsible_person');
            $table->enum('status', ['active', 'inactive'])->default('active');

        $table->foreign('company_id')->references('company_id')->on('companies')->onDelete('cascade');

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
        Schema::dropIfExists('quality_controls');
    }
};
