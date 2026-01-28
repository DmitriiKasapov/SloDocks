<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('accesses', function (Blueprint $table) {
            $table->id();

            $table->foreignId('service_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('purchase_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('email');

            // Access token for URL-based access
            $table->string('access_token')->unique();

            // Access time window
            $table->timestamp('starts_at');
            $table->timestamp('expires_at');

            // Manual access control
            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->index(['email', 'is_active']);
            $table->index('expires_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('accesses');
    }
};
