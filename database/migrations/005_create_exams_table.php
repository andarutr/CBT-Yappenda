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
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->index();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('lesson_id');
            $table->enum('exam_type', ['ASH','ASTS','ASAS','PAS']);
            $table->enum('grade', ['X-1','X-2','X-3','X-4','X-5','X-6','X-7','X-8','XI-1','XI-2','XI-3','XI-4','XI-5','XI-6','XI-7','XI-8','XII-1','XII-2','XII-3','XII-4','XII-5','XII-6','XII-7','XII-8']);
            $table->enum('major', ['IPA','IPS']);
            $table->enum('semester', ['1 (Ganjil)','2 (Genap)']);
            $table->enum('th_ajaran', ['2024/2025','2025/2026','2026/2027']);
            $table->integer('duration');
            $table->timestamp('start_time')->nullable();
            $table->timestamp('end_time')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');

            $table->foreign('lesson_id')
                    ->references('id')
                    ->on('lessons')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
