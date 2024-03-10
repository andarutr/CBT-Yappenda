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
        Schema::create('ash_results', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('lesson_id');
            $table->unsignedBigInteger('ash_purpose_id');
            $table->tinyInteger('tp_1')->nullable();
            $table->tinyInteger('tp_2')->nullable();
            $table->tinyInteger('tp_3')->nullable();
            $table->tinyInteger('tp_4')->nullable();
            $table->tinyInteger('tp_5')->nullable();
            $table->tinyInteger('tp_6')->nullable();
            $table->tinyInteger('tp_7')->nullable();
            $table->tinyInteger('tp_8')->nullable();
            $table->tinyInteger('total')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');

            $table->foreign('lesson_id')
                    ->references('id')
                    ->on('lessons')
                    ->onDelete('cascade');

            $table->foreign('ash_purpose_id')
                    ->references('id')
                    ->on('ash_purposes')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ash_results');
    }
};
