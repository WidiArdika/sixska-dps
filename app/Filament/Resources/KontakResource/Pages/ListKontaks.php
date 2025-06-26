<?php

namespace App\Filament\Resources\KontakResource\Pages;

use Filament\Actions;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\KontakResource;

class ListKontaks extends ListRecords
{
    protected static string $resource = KontakResource::class;

    protected function getHeaderActions(): array
    {
        // Sembunyikan tombol Create jika sudah ada data
        return \App\Models\Kontak::count() === 0 ? [
            CreateAction::make(),
        ] : [];
    }

    protected function getRedirectUrl(): string
    {
        $record = \App\Models\Kontak::first();

        return $record
            ? static::$resource::getUrl('edit', ['record' => $record])
            : static::$resource::getUrl('create');
    }
}
