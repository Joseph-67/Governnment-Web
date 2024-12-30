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
        Schema::create('materials', function (Blueprint $table) {
            $table->id('materialID');
            $table->unsignedBigInteger('categoryID');
            $table->string('material', 255);
            $table->string('description', 500)->nullable();
            $table->enum('status', ['active', 'inactive']);
            $table->foreign('categoryID')
            ->references('categoryID')
            ->on('categories')
            ->onDelete('cascade');
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
        Schema::dropIfExists('materials');
    }
};
