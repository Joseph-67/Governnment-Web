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
         Schema::create('waste_items', function (Blueprint $table) {
            $table->id('waste_item_id');
            $table->string('name')->unique();
            $table->string('description')->nullable();
            $table->string('icon')->nullable();
            $table->string('color')->nullable();
            $table->string('unit')->nullable();
            $table->decimal('quantity_per_unit', 10, 2)->default(1.00);
            $table->unsignedBigInteger('waste_sub_category_id');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('waste_sub_category_id')
                ->references('waste_sub_category_id')
                ->on('waste_sub_categories')
                ->onDelete('cascade');
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
