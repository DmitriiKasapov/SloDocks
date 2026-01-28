<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::create([
            'slug' => 'school-enrollment',
            'title' => 'Оформление ребёнка в школу в Словении',
            'description_public' => 'Подробная инструкция по оформлению ребёнка в словенскую школу. Включает пошаговое руководство, список необходимых документов, заполненные образцы и практические советы.',
            'price' => 2900, // 29 EUR в центах
            'access_duration_days' => 30,
            'seo_title' => 'Оформление ребёнка в школу в Словении | Пошаговая инструкция',
            'seo_description' => 'Полное руководство по зачислению ребёнка в школу в Словении для русскоговорящих родителей. Документы, сроки, образцы заявлений.',
            'is_active' => true,
        ]);
    }
}
