<?php

namespace App\Filament\Resources\ServiceResource\Pages;

use App\Filament\Resources\ServiceResource;
use App\Models\MaterialBlock;
use Filament\Resources\Pages\CreateRecord;

class CreateService extends CreateRecord
{
    protected static string $resource = ServiceResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $this->blocksData = $data['content_blocks'] ?? [];
        unset($data['content_blocks']);

        return $data;
    }

    protected function afterCreate(): void
    {
        // Create blocks
        foreach ($this->blocksData as $index => $blockData) {
            $type = $blockData['type'];
            $content = $blockData['data'] ?? [];

            MaterialBlock::create([
                'service_id' => $this->record->id,
                'type' => $type,
                'title' => null,
                'content' => $content,
                'order' => $index,
                'is_active' => true,
            ]);
        }

        activity_log('service_created', null, [
            'title' => $this->record->title,
        ], serviceId: $this->record->id);
    }

    private array $blocksData = [];
}
