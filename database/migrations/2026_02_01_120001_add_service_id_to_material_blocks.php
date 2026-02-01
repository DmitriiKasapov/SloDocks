<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('material_blocks', function (Blueprint $table) {
            $table->foreignId('service_id')->nullable()->after('material_id')->constrained()->cascadeOnDelete();

            // Make material_id nullable since block can belong to either Material or Service
            $table->foreignId('material_id')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('material_blocks', function (Blueprint $table) {
            $table->dropForeign(['service_id']);
            $table->dropColumn('service_id');
        });
    }
};
