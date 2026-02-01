<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g., "Школа", "Родителям"
            $table->string('slug')->unique(); // e.g., "school", "parents"
            $table->enum('type', ['topic', 'audience', 'document']); // Tag type
            $table->integer('order')->default(0); // Display order
            $table->timestamps();

            $table->index('type');
            $table->index('order');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tags');
    }
};
