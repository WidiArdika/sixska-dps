<?php

namespace App\Filament\Widgets;

use App\Models\Pengumuman;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables;
use Filament\Tables\Table;

class PengumumanTerbaru extends BaseWidget
{
    protected static ?string $heading = 'Pengumuman Terbaru';
    protected static ?int $sort = 3;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Pengumuman::latest()->limit(5) // Hanya ambil 5 Pengumuman
            )
            ->paginated(false)
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul')
                    ->limit(40),

                Tables\Columns\TextColumn::make('tanggal')
                    ->label('Tanggal')
                    ->date()
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->since(),
            ]);
    }
}
