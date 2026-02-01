<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            // Remove old category field
            $table->dropIndex(['category']);
            $table->dropColumn('category');

            // Add category_id foreign key
            $table->foreignId('category_id')
                ->nullable()
                ->after('title')
                ->constrained('categories')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');

            $table->string('category')->default('Общее')->after('title');
            $table->index('category');
        });
    }
};
