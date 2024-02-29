<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('student_academic_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->index()->nullable();
            $table->foreign('student_id')->references('id')->on('students');
            $table->string('institute_name');
            $table->string('department')->nullable();
            $table->year('start_year');
            $table->year('passing_year');
            $table->string('outof_gpa');
            $table->string('gpa')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('student_academic_histories');
    }
};
