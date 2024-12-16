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
        Schema::create('recp_product_recovery_methods', function (Blueprint $table) {
            $table->id('productRecoveryID');
            $table->unsignedBigInteger('companyID');
            $table->string('recovery_method_title');
            $table->enum('status', ['active', 'inactive']);
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
        Schema::dropIfExists('r_e_c_p_product_recovery_methods');
    }
};