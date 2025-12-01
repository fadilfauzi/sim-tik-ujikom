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
       Schema::create('tickets', function (Blueprint $table) {
    $table->id();
    $table->string('subject');
    $table->text('description');
    $table->foreignId('reporter_id')->constrained('users'); // Siapa yang Melapor
    $table->foreignId('technician_id')->nullable()->constrained('users'); // Siapa yang Ditugaskan
    $table->enum('priority', ['Low', 'Medium', 'High'])->default('Medium');
    $table->enum('status', ['Pending', 'Processing', 'Done', 'Canceled'])->default('Pending');
    $table->string('asset_tag')->nullable(); // Bisa merujuk ke aset yang rusak
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
