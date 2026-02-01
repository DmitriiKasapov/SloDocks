<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            // Публичный контент
            $table->longText('content')->nullable()->after('description_public');
            $table->string('image')->nullable()->after('content');

            // Скрытый контент (после оплаты)
            $table->longText('hidden_text_1')->nullable()->after('seo_description');
            $table->string('hidden_file_path_1')->nullable()->after('hidden_text_1');
            $table->string('hidden_file_path_2')->nullable()->after('hidden_file_path_1');
            $table->json('hidden_links')->nullable()->after('hidden_file_path_2');
            $table->longText('hidden_text_2')->nullable()->after('hidden_links');
            $table->string('hidden_image')->nullable()->after('hidden_text_2');
        });
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn([
                'content',
                'image',
                'hidden_text_1',
                'hidden_file_path_1',
                'hidden_file_path_2',
                'hidden_links',
                'hidden_text_2',
                'hidden_image',
            ]);
        });
    }
};
