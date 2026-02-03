<?php

namespace App\Filament\Resources\ServiceResource\Pages;

use App\Filament\Resources\ServiceResource;
use App\Models\MaterialBlock;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditService extends EditRecord
{
    protected static string $resource = ServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        // Load blocks
        $blocks = $this->record->contentBlocks->map(function ($block) {
            return [
                'type' => $block->type,
                'data' => $block->content,
            ];
        })->toArray();

        $data['content_blocks'] = $blocks;

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $this->blocksData = $data['content_blocks'] ?? [];
        unset($data['content_blocks']);

        return $data;
    }

    protected function afterSave(): void
    {
        // Delete existing blocks
        $this->record->contentBlocks()->delete();

        // Create new blocks
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

        activity_log('service_updated', null, [
            'title' => $this->record->title,
        ], serviceId: $this->record->id);
    }

    private array $blocksData = [];
}
