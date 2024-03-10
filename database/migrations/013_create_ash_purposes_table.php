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
        Schema::create('ash_purposes', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('title', 128);
            $table->string('tp_1', 25)->nullable();
            $table->string('tp_2', 25)->nullable();
            $table->string('tp_3', 25)->nullable();
            $table->string('tp_4', 25)->nullable();
            $table->string('tp_5', 25)->nullable();
            $table->string('tp_6', 25)->nullable();
            $table->string('tp_7', 25)->nullable();
            $table->string('tp_8', 25)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ash_purposes');
    }
};
