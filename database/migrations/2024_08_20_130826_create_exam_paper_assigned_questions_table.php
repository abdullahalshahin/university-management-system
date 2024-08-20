<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('exam_paper_assigned_questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('exam_paper_id')->index()->nullable();
            $table->foreign('exam_paper_id')->references('id')->on('exam_papers');
            $table->unsignedBigInteger('question_id')->index()->nullable();
            $table->foreign('question_id')->references('id')->on('questions');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('exam_paper_assigned_questions');
    }
};
