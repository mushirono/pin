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
        Schema::create('area_startegies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('area_goal_id')->references('id')->on('area_goals');
            $table->foreignId('area_id')->references('id')->on('areas');
            $table->foreignId('budget_year_id')->references('id')->on('budget_years');
            $table->longText('detail');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('area_startegies');
    }
};
