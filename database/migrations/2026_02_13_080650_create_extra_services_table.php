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
        Schema::create('extra_services', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama tampilan: "Kavling Tenda 2m x 2m"
            $table->string('slug')->unique(); // Slug: "kavling_2x2"
            $table->unsignedBigInteger('price'); // Harga: 50000
            $table->boolean('is_active')->default(true); // Aktif/non-aktif
            $table->foreignId('ticket_id')->nullable()->constrained()->onDelete('cascade'); // Untuk ticket tertentu (opsional)
            $table->text('description')->nullable(); // Deskripsi tambahan
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('extra_services');
    }
};