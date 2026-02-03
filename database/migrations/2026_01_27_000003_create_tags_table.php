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
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('type'); // topic, audience, document
            $table->integer('order')->default(0);
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
