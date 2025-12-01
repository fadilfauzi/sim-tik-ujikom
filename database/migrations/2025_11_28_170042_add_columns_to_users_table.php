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
        Schema::table('users', function (Blueprint $table) { 
            // 2. Tambahkan kolom division_id (Foreign Key)
            $table->foreignId('division_id')->nullable()->after('role')->constrained('divisions')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Saat rollback, hapus foreign key terlebih dahulu
            $table->dropForeign(['division_id']); 
            $table->dropColumn('division_id');
        });
    }
};
