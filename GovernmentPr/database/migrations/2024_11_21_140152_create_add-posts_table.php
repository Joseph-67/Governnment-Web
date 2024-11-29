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
        Schema::create('add-posts', function (Blueprint $table) {
            $table->id('posts_id');
            $table->string('title');
            $table->string('tag') -> nullable;
            $table->string('category')-> nullable;
            $table->string('author')-> nullable;
            $table->string('date');
            $table->string('status')->default(1);
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
        Schema::dropIfExists('add-posts');
    }
};
