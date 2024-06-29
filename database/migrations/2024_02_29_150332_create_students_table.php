<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('department_id')->index()->nullable();
            $table->foreign('department_id')->references('id')->on('departments');
            $table->string('registration_number')->unique()->index();
            $table->string('full_name');
            $table->string('date_of_birth')->nullable();
            $table->string('gender')->nullable()->comment('Male, Female, Oters');
            $table->string('mobile_number')->index();
            $table->string('email')->index();
            $table->string('password');
            $table->string('security')->nullable();
            $table->string('guardian_name');
            $table->string('guardian_mobile');
            $table->string('address');
            $table->string('biography')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('status')->default('active')->comment('active, inactive, blocked');
            $table->timestamp('verified_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('students');
    }
};
