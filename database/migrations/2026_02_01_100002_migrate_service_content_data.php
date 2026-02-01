<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Migrate existing content data from services to service_contents
        $services = DB::table('services')->get();

        foreach ($services as $service) {
            DB::table('service_contents')->insert([
                'service_id' => $service->id,
                'content' => $service->content,
                'image' => $service->image,
                'hidden_text_1' => $service->hidden_text_1,
                'hidden_file_path_1' => $service->hidden_file_path_1,
                'hidden_file_path_2' => $service->hidden_file_path_2,
                'hidden_links' => $service->hidden_links,
                'hidden_text_2' => $service->hidden_text_2,
                'hidden_image' => $service->hidden_image,
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    public function down(): void
    {
        // Restore data back to services table if needed
        $contents = DB::table('service_contents')->get();

        foreach ($contents as $content) {
            DB::table('services')
                ->where('id', $content->service_id)
                ->update([
                    'content' => $content->content,
                    'image' => $content->image,
                    'hidden_text_1' => $content->hidden_text_1,
                    'hidden_file_path_1' => $content->hidden_file_path_1,
                    'hidden_file_path_2' => $content->hidden_file_path_2,
                    'hidden_links' => $content->hidden_links,
                    'hidden_text_2' => $content->hidden_text_2,
                    'hidden_image' => $content->hidden_image,
                ]);
        }

        DB::table('service_contents')->truncate();
    }
};
