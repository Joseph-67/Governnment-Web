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
        Schema::create('waste_sub_categories', function (Blueprint $table) {
            $table->id('waste_sub_category_id');
            $table->unsignedBigInteger('waste_category_id');
            $table->foreign('waste_category_id')->references('waste_category_id')->on('waste_categories')->onDelete('cascade');
            $table->string('waste_sub_category_name');
            $table->string('waste_sub_category_description')->nullable();
            $table->string('waste_sub_category_icon')->nullable();
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
        Schema::dropIfExists('waste_sub_categories');
    }
};
