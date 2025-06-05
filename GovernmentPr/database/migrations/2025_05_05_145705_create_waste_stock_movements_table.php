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
        Schema::create('waste_stock_movements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('waste_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->enum('movement_type', ['in', 'out']);
            $table->decimal('quantity', 15, 3);
            $table->string('unit', 50);
            $table->text('description')->nullable();
            $table->timestamp('movement_date')->useCurrent();
            $table->timestamps();

            $table->unsignedBigInteger('company_id')->nullable();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('set null');
            $table->foreign('waste_id')->references('id')->on('wastes')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('waste_stock_movements');
    }
};
