<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articles_promos', function (Blueprint $table) {
            $table->bigInteger('articles_id')->unsigned()->nullable();
            $table->foreign('articles_id')
                    ->references('id')
                    ->on('articles');
            $table->bigInteger('promos_id')->unsigned()->nullable();
            $table->foreign('promos_id')
                    ->references('id')
                    ->on('promos');
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles_promos');
    }
};
