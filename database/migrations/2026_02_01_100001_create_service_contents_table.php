<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('service_contents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained()->cascadeOnDelete();

            // Public content
            $table->longText('content')->nullable();
            $table->string('image')->nullable();

            // Hidden content (after payment)
            $table->longText('hidden_text_1')->nullable(); // instruction
            $table->string('hidden_file_path_1')->nullable(); // PDF document 1
            $table->string('hidden_file_path_2')->nullable(); // PDF document 2
            $table->json('hidden_links')->nullable(); // list of links
            $table->longText('hidden_text_2')->nullable(); // practical tips
            $table->string('hidden_image')->nullable(); // hidden image

            // Status
            $table->enum('status', ['draft', 'published'])->default('published');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_contents');
    }
};
