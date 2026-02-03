<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->string('event_type');
            $table->string('email')->nullable();
            $table->foreignId('service_id')->nullable()->constrained('services')->nullOnDelete();
            $table->foreignId('purchase_id')->nullable()->constrained('purchases')->nullOnDelete();
            $table->json('metadata')->nullable();
            $table->timestamps();

            $table->index('event_type');
            $table->index('email');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
    }
};
