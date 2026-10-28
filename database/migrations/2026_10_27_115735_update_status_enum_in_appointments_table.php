<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       DB::statement("ALTER TABLE appointments MODIFY COLUMN status ENUM('scheduled', 'cancelled', 'completed', 'planifier', 'annuler', 'terminer') DEFAULT 'planifier'");

        DB::table('appointments')->where('status', 'scheduled')->update(['status' => 'planifier']);
        DB::table('appointments')->where('status', 'cancelled')->update(['status' => 'annuler']);
        DB::table('appointments')->where('status', 'completed')->update(['status' => 'terminer']);

        DB::statement("ALTER TABLE appointments MODIFY COLUMN status ENUM('planifier', 'annuler', 'terminer') DEFAULT 'planifier'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("ALTER TABLE appointments MODIFY COLUMN status ENUM('scheduled', 'cancelled', 'completed', 'planifier', 'annuler', 'terminer') DEFAULT 'scheduled'");

        DB::table('appointments')->where('status', 'planifier')->update(['status' => 'scheduled']);
        DB::table('appointments')->where('status', 'annuler')->update(['status' => 'cancelled']);
        DB::table('appointments')->where('status', 'terminer')->update(['status' => 'completed']);

        DB::statement("ALTER TABLE appointments MODIFY COLUMN status ENUM('scheduled', 'cancelled', 'completed') DEFAULT 'scheduled'");
    }
};
