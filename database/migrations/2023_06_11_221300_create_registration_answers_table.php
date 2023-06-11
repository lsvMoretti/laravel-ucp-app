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
        Schema::create('registration_answers', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('question_id')->unsigned(); // This will create the question_id column
            $table->unsignedBigInteger('user_id')->unsigned(); // This will create the user_id column

            $table->foreign('question_id')->references('id')->on('registration_questions');
            $table->foreign('user_id')->references('id')->on('users');
            $table->longText('answer');
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registration_answers');
    }
};
