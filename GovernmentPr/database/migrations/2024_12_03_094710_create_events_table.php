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
        Schema::create('events', function (Blueprint $table) {
            $table->id('EventID');
            // $table->unsignedBigInteger('categoryID');
            // $table->string('Event', 255);
            // $table->string('UrlName', 255);
            // $table->string('content', 500)->nullable();
            // $table->string('description', 500)->nullable();
            // $table->timestamps('StartDate');
            // $table->timestamps('EndDate');
            // $table->enum('status', ['active', 'inactive']);
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
        Schema::dropIfExists('events');
    }
};
