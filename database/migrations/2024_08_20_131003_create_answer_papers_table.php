<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('answer_papers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('exam_participant_id')->index()->nullable();
            $table->foreign('exam_participant_id')->references('id')->on('exam_participants');
            $table->unsignedBigInteger('question_id')->index()->nullable();
            $table->foreign('question_id')->references('id')->on('questions');
            $table->string('type')->default('SAQ')->comment('SAQ, MCQ, BOOLEAN, SORT_QUESTION');
            $table->text('correct_answer')->nullable();
            $table->string('given_answer')->nullable();
            $table->float('marks', 8, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('answer_papers');
    }
};
