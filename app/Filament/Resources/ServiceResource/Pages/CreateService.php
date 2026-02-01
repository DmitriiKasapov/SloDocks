<?php

namespace App\Filament\Resources\ServiceResource\Pages;

use App\Filament\Resources\ServiceResource;
use App\Models\MaterialBlock;
use App\Models\ServiceContent;
use Filament\Resources\Pages\CreateRecord;

class CreateService extends CreateRecord
{
    protected static string $resource = ServiceResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Extract blocks and content data
        $this->blocksData = $data['content_blocks'] ?? [];
        $this->contentData = $data['serviceContent'] ?? [];

        unset($data['content_blocks']);
        unset($data['serviceContent']);

        return $data;
    }

    protected function afterCreate(): void
    {
        // Create associated ServiceContent (old system)
        if (!empty($this->contentData)) {
            $this->record->serviceContent()->create($this->contentData);
        }

        // Create blocks (new system)
        foreach ($this->blocksData as $index => $blockData) {
            $type = $blockData['type'];
            $content = $blockData['data'] ?? [];

            MaterialBlock::create([
                'service_id' => $this->record->id,
                'material_id' => null,
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
    private array $contentData = [];
}
