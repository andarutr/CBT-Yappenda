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
        Schema::create('content_rapor', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('rapor_id');
            $table->unsignedBigInteger('exam_id');
            $table->string('kelompok_mpl', 128);
            $table->integer('nilai');
            $table->text('description');
            $table->timestamps();

            $table->foreign('rapor_id')
                    ->references('id')
                    ->on('rapor')
                    ->onDelete('cascade');
            
            $table->foreign('exam_id')
                    ->references('id')
                    ->on('exams')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content_rapor');
    }
};
