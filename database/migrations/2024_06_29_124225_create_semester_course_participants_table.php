<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('semester_course_participants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('semester_course_id')->index();
            $table->foreign('semester_course_id')->references('id')->on('semester_courses');
            $table->unsignedBigInteger('student_id')->index();
            $table->foreign('student_id')->references('id')->on('students');
            $table->double('grade_point')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('semester_course_participants');
    }
};
