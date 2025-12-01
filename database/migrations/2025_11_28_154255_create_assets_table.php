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
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('asset_tag', 50)->unique(); // Untuk QR Code/ID unik aset
            $table->string('name');
            $table->foreignId('category_id')->constrained('categories'); // Relasi ke Kategori
            $table->string('serial_number')->nullable();
            $table->enum('status', ['Baik', 'Rusak Ringan', 'Rusak Berat', 'Afkir'])->default('Baik');
            $table->string('location')->nullable();
            $table->date('purchase_date')->nullable();
            $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
