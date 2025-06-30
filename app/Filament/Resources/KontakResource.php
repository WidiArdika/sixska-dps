<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KontakResource\Pages;
use App\Filament\Resources\KontakResource\RelationManagers;
use App\Models\Kontak;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KontakResource extends Resource
{
    protected static ?string $model = Kontak::class;

    protected static ?string $navigationIcon = 'heroicon-o-identification';
    protected static ?string $navigationLabel = 'Kontak';
    protected static ?string $navigationGroup = 'Kontak';
    protected static ?string $modelLabel = 'Kontak';
    protected static ?string $pluralModelLabel = 'Kontak';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('alamat')
                    ->label('Alamat')
                    ->rows(3)
                    ->columnSpanFull()
                    ->nullable(),
                Forms\Components\TextInput::make('telepon')
                    ->label('Telepon')
                    ->nullable(),
                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->nullable(),
                Forms\Components\TextInput::make('hari_kerja')
                    ->label('Hari Kerja')
                    ->nullable(),
                Forms\Components\TextInput::make('jam_kerja')
                    ->label('Jam Kerja')
                    ->nullable(),

                Forms\Components\Textarea::make('google_maps_embed')
                    ->label('Embed Google Maps')
                    ->rows(3)
                    ->columnSpanFull()
                    ->nullable(),
                Forms\Components\TextInput::make('instagram')
                    ->label('Username Instagram')
                    ->nullable(),
                Forms\Components\TextInput::make('facebook')
                    ->label('Username Facebook')
                    ->nullable(),
                Forms\Components\TextInput::make('tiktok')
                    ->label('Username TikTok')
                    ->nullable(),
                Forms\Components\TextInput::make('youtube')
                    ->label('Channel YouTube')
                    ->nullable(),
            ]);
    }

    public static function shouldRegisterNavigation(): bool
    {
        return true;
    }

    public static function canCreate(): bool
    {
        // Hanya izinkan create jika belum ada record
        return \App\Models\Kontak::count() === 0;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('alamat')->label('Alamat')
                ->wrap(),
                Tables\Columns\TextColumn::make('telepon')->label('Telepon'),
                Tables\Columns\TextColumn::make('email')->label('Email')->limit(25),
            ])
            ->filters([
                //
            ])
            ->paginated(false)
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKontaks::route('/'),
            'create' => Pages\CreateKontak::route('/create'),
            'edit' => Pages\EditKontak::route('/{record}/edit'),
        ];
    }
}
