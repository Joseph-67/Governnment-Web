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
        Schema::create('business_brochures', function (Blueprint $table) {
            $table->id('brochuresID');
            $table->unsignedBigInteger('businessID');
            $table->string('file_url');
            $table->enum('status', ['active', 'inactive']);
            $table->foreign('businessID')
            ->references('businessID')
            ->on('businesses')
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
        Schema::dropIfExists('business_brochures');
    }
};
