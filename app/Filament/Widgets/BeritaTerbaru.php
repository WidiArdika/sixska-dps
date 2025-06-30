<?php

namespace App\Filament\Widgets;

use App\Models\Berita;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables;
use Filament\Tables\Table;

class BeritaTerbaru extends BaseWidget
{
    protected static ?string $heading = 'Berita Terbaru';
    protected static ?int $sort = 3;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Berita::latest()->limit(5) // Hanya ambil 5 berita
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
