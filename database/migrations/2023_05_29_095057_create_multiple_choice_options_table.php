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
        Schema::create('multiple_choice_options', function (Blueprint $table) {
            $table->id('option_id');
            $table->unsignedBigInteger('question_id');
            $table->string('option_text');
            $table->boolean('is_correct')->default(false);
            // Add other multiple-choice fields here
            $table->timestamps();

            $table->foreign('question_id')->references('question_id')->on('questions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('multiple_choice_options');
    }
};
