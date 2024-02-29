<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('date_of_birth')->nullable();
            $table->string('gender')->nullable()->comment('Male, Female, Oters');
            $table->string('degree')->nullable();
            $table->string('position')->nullable();
            $table->string('mobile_number');
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('security')->nullable();
            $table->unsignedBigInteger('department_id')->index()->nullable();
            $table->foreign('department_id')->references('id')->on('departments');
            $table->text('address')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('status')->default('active')->comment('active, inactive, blocked');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
