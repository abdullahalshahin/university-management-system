<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::table('departments', function (Blueprint $table) {
            $table->unsignedBigInteger('department_head_id')->index()->nullable();
            $table->foreign('department_head_id')->references('id')->on('users');
            $table->unsignedBigInteger('department_assistant_head_id')->index()->nullable();
            $table->foreign('department_assistant_head_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::table('departments', function (Blueprint $table) {
            $table->dropForeign(['department_head_id']);
            $table->dropIndex(['department_head_id']);
            $table->dropColumn('department_head_id');
            
            $table->dropForeign(['department_assistant_head_id']);
            $table->dropIndex(['department_assistant_head_id']);
            $table->dropColumn('department_assistant_head_id');
        });
    }
};
