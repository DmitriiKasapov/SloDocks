<?php

namespace Database\Seeders;

use App\Models\MaterialBlock;
use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceBlocksSeeder extends Seeder
{
    public function run(): void
    {
        // Find service by slug or first service
        $service = Service::where('slug', 'school-enrollment')->first()
            ?? Service::first();

        if (!$service) {
            $this->command->error('No services found!');
            return;
        }

        $this->command->info("Adding blocks to service: {$service->title}");

        // Delete existing blocks
        $service->contentBlocks()->delete();

        // Block 1: Intro
        MaterialBlock::create([
            'service_id' => $service->id,
            'material_id' => null,
            'type' => 'intro',
            'content' => [
                'text' => 'Полные материалы и инструкции',
                'badge' => 'Актуально на 2026',
            ],
            'order' => 0,
            'is_active' => true,
        ]);

        // Block 2: Process Overview
        MaterialBlock::create([
            'service_id' => $service->id,
            'material_id' => null,
            'type' => 'process_overview',
            'content' => [
                'steps' => [
                    ['step' => 'Подготовить документы'],
                    ['step' => 'Определить школу'],
                    ['step' => 'Записать ребёнка'],
                ],
            ],
            'order' => 1,
            'is_active' => true,
        ]);

        // Block 3: Steps - Подготовка документов
        MaterialBlock::create([
            'service_id' => $service->id,
            'material_id' => null,
            'type' => 'steps',
            'content' => [
                'steps' => [
                    [
                        'number' => 1,
                        'title' => 'Подготовка документов',
                        'description' => '<p>Перед началом процесса оформления ребёнка в школу необходимо подготовить следующие документы:</p>',
                        'items' => [
                            ['item' => 'Свидетельство о рождении ребёнка (оригинал и нотариально заверенный перевод на словенский язык)'],
                            ['item' => 'Справка о прививках (заверенная печатью врача)'],
                            ['item' => 'Документ, подтверждающий место проживания (договор аренды или подтверждение от собственника)'],
                            ['item' => 'Паспорта родителей (копии страниц с фото и регистрацией)'],
                            ['item' => 'Разрешение на временное проживание (если применимо)'],
                        ],
                    ],
                ],
            ],
            'order' => 2,
            'is_active' => true,
        ]);

        // Block 4: Steps - Определение школьного округа
        MaterialBlock::create([
            'service_id' => $service->id,
            'material_id' => null,
            'type' => 'steps',
            'content' => [
                'steps' => [
                    [
                        'number' => 2,
                        'title' => 'Определение школьного округа',
                        'description' => '<p>В Словении дети посещают школу по месту фактического проживания. Чтобы узнать, к какой школе относится ваш адрес:</p>',
                        'items' => [
                            ['item' => 'Зайдите на сайт муниципалитета вашего города'],
                            ['item' => 'Найдите раздел "Osnovna šola" (Начальная школа)'],
                            ['item' => 'Введите ваш адрес в поиск школьного округа'],
                            ['item' => 'Запишите название и контакты школы'],
                        ],
                    ],
                ],
            ],
            'order' => 3,
            'is_active' => true,
        ]);

        // Block 5: Tip
        MaterialBlock::create([
            'service_id' => $service->id,
            'material_id' => null,
            'type' => 'tip',
            'content' => [
                'level' => 'info',
                'text' => '<p><strong>Полезный совет:</strong> Если ваш ребёнок не говорит по-словенски, школа обязана предоставить дополнительные уроки словенского языка бесплатно (обычно 2-3 раза в неделю). Обязательно уточните это при записи.</p>',
            ],
            'order' => 4,
            'is_active' => true,
        ]);

        // Block 6: Steps - Запись в школу
        MaterialBlock::create([
            'service_id' => $service->id,
            'material_id' => null,
            'type' => 'steps',
            'content' => [
                'steps' => [
                    [
                        'number' => 3,
                        'title' => 'Запись в школу',
                        'description' => '<p>После определения школы необходимо записать ребёнка:</p>',
                        'items' => [
                            ['item' => 'Свяжитесь со школой по телефону или email (контакты на сайте школы)'],
                            ['item' => 'Договоритесь о встрече с директором или секретарём'],
                            ['item' => 'Принесите все подготовленные документы на встречу'],
                            ['item' => 'Заполните заявление о приёме (вам дадут бланк в школе)'],
                        ],
                    ],
                ],
            ],
            'order' => 5,
            'is_active' => true,
        ]);

        // Block 7: FAQ
        MaterialBlock::create([
            'service_id' => $service->id,
            'material_id' => null,
            'type' => 'faq',
            'content' => [
                'items' => [
                    [
                        'q' => 'Можно ли записаться в школу в течение учебного года?',
                        'a' => 'Да, при переезде в Словению это допускается. Обратитесь в школу как можно скорее после прибытия.',
                    ],
                    [
                        'q' => 'Нужно ли платить за обучение в государственной школе?',
                        'a' => 'Нет, обучение в государственных начальных школах Словении бесплатное для всех детей, включая иностранцев с видом на жительство.',
                    ],
                    [
                        'q' => 'Что делать, если ребёнок не знает словенского языка?',
                        'a' => 'Школа обязана предоставить бесплатные дополнительные уроки словенского языка. Обычно это 2-3 занятия в неделю в течение первого года.',
                    ],
                ],
            ],
            'order' => 6,
            'is_active' => true,
        ]);

        // Block 8: Help CTA
        MaterialBlock::create([
            'service_id' => $service->id,
            'material_id' => null,
            'type' => 'help_cta',
            'content' => [
                'text' => '<p>Если у вас возникли сложности с каким-либо из шагов, обратитесь в школу напрямую — словенские школы обычно очень доброжелательны к иностранным семьям и помогут во всём разобраться.</p>',
                'link' => '/contact',
            ],
            'order' => 7,
            'is_active' => true,
        ]);

        $this->command->info('✅ Successfully created 8 content blocks!');
    }
}
