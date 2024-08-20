<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('exam_participants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->index()->nullable();
            $table->foreign('student_id')->references('id')->on('students');
            $table->unsignedBigInteger('exam_paper_id')->index()->nullable();
            $table->foreign('exam_paper_id')->references('id')->on('exam_papers');
            $table->timestamp('entry_time')->nullable();
            $table->timestamp('submit_time')->nullable();
            $table->float('obtained_marks', 8, 2)->nullable();
            $table->float('negative_marks', 8, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('exam_participants');
    }
};
