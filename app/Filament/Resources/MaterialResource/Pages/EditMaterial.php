<?php

namespace App\Filament\Resources\MaterialResource\Pages;

use App\Filament\Resources\MaterialResource;
use App\Models\MaterialBlock;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMaterial extends EditRecord
{
    protected static string $resource = MaterialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        // Load blocks
        $blocks = $this->record->blocks->map(function ($block) {
            return [
                'type' => $block->type,
                'data' => $block->content,
            ];
        })->toArray();

        $data['blocks'] = $blocks;

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Extract blocks and store separately
        $this->blocksData = $data['blocks'] ?? [];
        unset($data['blocks']);

        return $data;
    }

    protected function afterSave(): void
    {
        // Delete existing blocks
        $this->record->blocks()->delete();

        // Create new blocks
        foreach ($this->blocksData as $index => $blockData) {
            $type = $blockData['type'];
            $content = $blockData['data'] ?? [];

            MaterialBlock::create([
                'material_id' => $this->record->id,
                'type' => $type,
                'title' => null,
                'content' => $content,
                'order' => $index,
                'is_active' => true,
            ]);
        }
    }

    private array $blocksData = [];
}
