<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('registration_answers', function (Blueprint $table) {
            $table->integer('submission_id')->default(0);
            $table->longText('status_reason')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('registration_answers', function (Blueprint $table) {
            $table->dropColumn('submission_id');
            $table->dropColumn('status_reason');
        });
    }
};
