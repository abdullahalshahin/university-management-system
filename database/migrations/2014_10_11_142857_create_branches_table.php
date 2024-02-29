<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('code')->index();
            $table->string('name');
            $table->string('contact_number_1');
            $table->string('contact_number_2')->nullable();
            $table->string('email')->nullable();
            $table->string('domain')->nullable();
            $table->string('thumbnail_image')->nullable();
            $table->text('address');
            $table->json('google_map_code')->nullable();
            $table->string('is_central_branch')->default('no')->comment('yes, no');
            $table->string('status')->default('active')->comment('active, inactive, closed');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('branches');
    }
};
