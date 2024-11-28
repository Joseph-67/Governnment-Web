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
        Schema::create('companies', function (Blueprint $table) {
            $table->id('company_id');
            $table->string('company_name')->unique();
            $table->string('industry');
            $table->string('industry_process')->nullable();
            $table->string('email');
            $table->string('primary_phone_number');
            $table->string('secondary_phone_number')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('gis_location')->nullable();
            $table->string('website_url')->nullable();
            $table->string('date_of_establishment')->nullable();
            $table->string('number_of_employees')->nullable();
            $table->string('operations_manager')->nullable();
            $table->string('contact_person_full_name')->nullable();
            $table->string('contact_person_position')->nullable();
            $table->string('contact_person_contact_number')->nullable();
            $table->enum('is_sharable', ['active', 'inactive']);
            $table->enum('status', ['active', 'inactive']);
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
        Schema::dropIfExists('companies');
    }
};
