<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('student_transfers', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('transfer_by')->index();
            $table->foreign('transfer_by')->references('id')->on('users');
            $table->unsignedBigInteger('student_id')->index();
            $table->foreign('student_id')->references('id')->on('students');
            $table->unsignedBigInteger('from_branch_id')->index();
            $table->foreign('from_branch_id')->references('id')->on('branches');
            $table->unsignedBigInteger('to_branch_id')->index();
            $table->foreign('to_branch_id')->references('id')->on('branches');
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('student_transfers');
    }
};
