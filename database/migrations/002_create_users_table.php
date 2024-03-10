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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->index();
            $table->string('name', 128);
            $table->string('nis', 25)->nullable();
            $table->string('nisn', 25)->nullable();
            $table->enum('kelas', ['X-1','X-2','X-3','X-4','X-5','X-6','X-7','X-8','XI-1','XI-2','XI-3','XI-4','XI-5','XI-6','XI-7','XI-8','XII-1','XII-2','XII-3','XII-4','XII-5','XII-6','XII-7','XII-8'])->nullable();
            $table->enum('fase', ['A','B','C','D','E','F','G','H'])->nullable();
            $table->string('email', 128)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('picture', 128)->default('user.png');
            $table->unsignedBigInteger('role_id');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('role_id')
                    ->references('id')
                    ->on('roles')
                    ->onDelete('cascade');
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
