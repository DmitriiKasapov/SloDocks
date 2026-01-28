<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();

            // URL / идентификация
            $table->string('slug')->unique();
            $table->string('title');

            // Публичное описание (до оплаты)
            $table->text('description_public');

            // Цена и срок доступа
            $table->unsignedInteger('price'); // в центах
            $table->unsignedInteger('access_duration_days');

            // SEO
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();

            // Состояние услуги
            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->index('is_active');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
