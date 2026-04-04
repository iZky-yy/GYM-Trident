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
        Schema::create('memberships', function (Blueprint $table) {
            $table->id();

            $table->foreignId('member_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('paket_id')->constrained('paket_gyms')->cascadeOnDelete();

            $table->foreignId('personal_trainer_id')
                ->nullable()
                ->constrained('personal_trainers')
                ->nullOnDelete();

            $table->date('tanggal_mulai');
            $table->date('tanggal_akhir')->nullable();

            $table->enum('status', ['active','expired'])->default('active');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memberships');
    }
};
