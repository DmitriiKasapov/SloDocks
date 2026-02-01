<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        // Create categories
        $categories = [
            [
                'name' => 'Дети',
                'slug' => 'deti',
                'icon' => 'heroicon-o-academic-cap',
                'order' => 1,
            ],
            [
                'name' => 'Документы',
                'slug' => 'dokumenty',
                'icon' => 'heroicon-o-document-text',
                'order' => 2,
            ],
            [
                'name' => 'Жильё',
                'slug' => 'zhilyo',
                'icon' => 'heroicon-o-home',
                'order' => 3,
            ],
            [
                'name' => 'Работа',
                'slug' => 'rabota',
                'icon' => 'heroicon-o-briefcase',
                'order' => 4,
            ],
        ];

        foreach ($categories as $categoryData) {
            Category::updateOrCreate(
                ['slug' => $categoryData['slug']],
                $categoryData
            );
        }

        // Assign first service to first category if exists
        $firstCategory = Category::where('slug', 'deti')->first();
        if ($firstCategory) {
            Service::where('category_id', null)
                ->limit(1)
                ->update(['category_id' => $firstCategory->id]);
        }
    }
}
