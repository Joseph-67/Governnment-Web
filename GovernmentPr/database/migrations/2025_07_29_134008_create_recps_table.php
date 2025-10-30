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
        Schema::create('recps', function (Blueprint $table) {
            $table->id('recp_id'); // Primary key for the recps table
            $table->unsignedBigInteger('company_id'); // Foreign key to companies table
            $table->enum('status', ['approved', 'disapproved', 'pending']); // Add your desired columns here
            $table->string('remark')->nullable(); // Name of the RECP
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
        Schema::dropIfExists('recps');
    }
};
