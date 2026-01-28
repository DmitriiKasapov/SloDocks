<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();

            $table->foreignId('service_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('email');

            // Платёж
            $table->string('payment_provider');
            $table->string('payment_id')->unique();

            $table->unsignedInteger('amount'); // в центах
            $table->string('currency', 3)->default('EUR');

            // Статус оплаты
            $table->enum('status', ['pending', 'paid', 'failed'])
                ->default('pending');

            $table->timestamps();

            $table->index(['email', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
