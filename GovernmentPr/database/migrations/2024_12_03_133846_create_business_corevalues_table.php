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
        Schema::create('business_corevalues', function (Blueprint $table) {
            $table->id('CorevaluesID');
            $table->unsignedBigInteger('businessID');
            $table->string('core_values_title');
            $table->enum('status', ['active', 'inactive']);
            $table->foreign('businessID')
            ->references('business_id')
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
        Schema::dropIfExists('business_corevalues');
    }
};
