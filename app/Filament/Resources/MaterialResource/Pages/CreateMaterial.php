<?php

namespace App\Filament\Resources\MaterialResource\Pages;

use App\Filament\Resources\MaterialResource;
use App\Models\MaterialBlock;
use Filament\Resources\Pages\CreateRecord;

class CreateMaterial extends CreateRecord
{
    protected static string $resource = MaterialResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Extract blocks and store separately
        $this->blocksData = $data['blocks'] ?? [];
        unset($data['blocks']);

        return $data;
    }

    protected function afterCreate(): void
    {
        // Create blocks
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
