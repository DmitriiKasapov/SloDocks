<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = [
            // Topic tags (тема)
            ['name' => 'Школа', 'type' => 'topic', 'order' => 10],
            ['name' => 'Детский сад', 'type' => 'topic', 'order' => 20],
            ['name' => 'Налоги', 'type' => 'topic', 'order' => 30],
            ['name' => 'Документы', 'type' => 'topic', 'order' => 40],
            ['name' => 'Пособия', 'type' => 'topic', 'order' => 50],
            ['name' => 'Переезд', 'type' => 'topic', 'order' => 60],
            ['name' => 'Работа', 'type' => 'topic', 'order' => 70],
            ['name' => 'Жильё', 'type' => 'topic', 'order' => 80],

            // Audience tags (для кого)
            ['name' => 'Родителям', 'type' => 'audience', 'order' => 10],
            ['name' => 'Семьям', 'type' => 'audience', 'order' => 20],
            ['name' => 'Студентам', 'type' => 'audience', 'order' => 30],
            ['name' => 'Иностранцам', 'type' => 'audience', 'order' => 40],
            ['name' => 'Фрилансерам', 'type' => 'audience', 'order' => 50],

            // Document tags (формат)
            ['name' => 'Бланки', 'type' => 'document', 'order' => 10],
            ['name' => 'Инструкции', 'type' => 'document', 'order' => 20],
            ['name' => 'Примеры заполнения', 'type' => 'document', 'order' => 30],
            ['name' => 'Чек-листы', 'type' => 'document', 'order' => 40],
            ['name' => 'Шаблоны', 'type' => 'document', 'order' => 50],
        ];

        foreach ($tags as $tag) {
            Tag::create([
                'name' => $tag['name'],
                'slug' => Str::slug($tag['name']),
                'type' => $tag['type'],
                'order' => $tag['order'],
            ]);
        }
    }
}
