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
        Schema::create('sub_category_disposals', function (Blueprint $table) {
            $table->id('sub_category_disposal_id');
            $table->unsignedBigInteger('waste_sub_category_id');
            $table->foreign('waste_sub_category_id')->references('waste_sub_category_id')->on('waste_sub_categories')->onDelete('cascade');
            $table->unsignedBigInteger('waste_disposal_method_id');
            $table->foreign('waste_disposal_method_id')->references('waste_disposal_method_id')->on('waste_disposal_methods')->onDelete('cascade');
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
        Schema::dropIfExists('sub_category_disposals');
    }
};
