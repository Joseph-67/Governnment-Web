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
         Schema::create('waste_types', function (Blueprint $table) {
            $table->bigIncrements('WasteID');
            $table->unsignedBigInteger('waste_category_id');
            $table->unsignedBigInteger('waste_sub_category_id');
            $table->unsignedBigInteger('waste_source_id');
            $table->string('WasteTitle', 255);
            $table->float('Quantity');
            $table->string('Unit', 50);
            $table->date('DateGenerated');
            $table->date('DisposalDate')->nullable();
            $table->enum('status', ['active', 'inactivate'])->default('active');
            $table->timestamps();

            $table->foreign('waste_category_id')->references('waste_category_id')->on('waste_categories');
            $table->foreign('waste_sub_category_id')->references('waste_sub_category_id')->on('waste_sub_categories');
            $table->foreign('waste_source_id')->references('waste_source_id')->on('waste_sources');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('waste_types');
    }
};
