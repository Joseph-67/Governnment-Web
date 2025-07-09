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
        Schema::create('company_policies', function (Blueprint $table) {
            $table->id('companypolicyID');
            $table->unsignedBigInteger('companyID');
            $table->unsignedBigInteger('policy_id');
            $table->foreign('policy_id')
                  ->references('policy_id')
                  ->on('policies')
                  ->onDelete('cascade');
            $table->foreign('companyID')
                    ->references('company_id')
                    ->on('companies')
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
        Schema::dropIfExists('company_policies');
    }
};
