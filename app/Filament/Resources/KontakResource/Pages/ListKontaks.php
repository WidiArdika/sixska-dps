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
            CreateAction::make()
            ->label('Tambah Informasi Kontak'),
        ] : [];
    }

    // protected function getRedirectUrl(): string
    // {
    //     $record = \App\Models\Kontak::first();

    //     return $record
    //         ? static::$resource::getUrl('edit', ['record' => $record])
    //         : static::$resource::getUrl('create');
    // }

    public function mount(): void
    {
        parent::mount();

        // Cek apakah sudah ada data
        $kontak = \App\Models\Kontak::first();
        if ($kontak) {
            // Redirect ke halaman edit
            $this->redirect(KontakResource::getUrl('edit', ['record' => $kontak->getKey()]));
        }
    }
}
