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

            // relasi member
            $table->foreignId('member_id')
                  ->constrained('users')
                  ->cascadeOnDelete();

            // relasi paket gym
            $table->foreignId('paket_id')
                  ->constrained('paket_gyms')
                  ->cascadeOnDelete();

            // relasi personal trainer
            $table->foreignId('personal_trainer_id')
                  ->constrained('personal_trainers')
                  ->cascadeOnDelete();

            // tanggal membership
            $table->date('tanggal_mulai');

            // sisa kunjungan
            $table->integer('sisa_kunjungan')->nullable();

            // status membership
            $table->enum('status', ['active', 'expired'])
                  ->default('active');

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
