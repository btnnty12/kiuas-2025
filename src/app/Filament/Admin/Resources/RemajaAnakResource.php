<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\RemajaAnakResource\Pages;
use App\Filament\Admin\Resources\RemajaAnakResource\RelationManagers;
use App\Models\RemajaAnak;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RemajaAnakResource extends Resource
{
    protected static ?string $model = RemajaAnak::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('orang_tua_id')
                    ->relationship('orangTua', 'nama')
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('nama')->required(),
                Forms\Components\TextInput::make('usia')->numeric()->required(),
                Forms\Components\Select::make('jenis_kelamin')
                    ->options([
                        'Laki-laki' => 'Laki-laki',
                        'Perempuan' => 'Perempuan',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('tingkat_stres')->numeric()->minValue(1)->maxValue(10),
                Forms\Components\TextInput::make('tingkat_kecemasan')->numeric()->minValue(1)->maxValue(10),
                Forms\Components\Textarea::make('catatan'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('nama')->searchable(),
                Tables\Columns\TextColumn::make('usia'),
                Tables\Columns\TextColumn::make('jenis_kelamin'),
                Tables\Columns\TextColumn::make('tingkat_stres'),
                Tables\Columns\TextColumn::make('tingkat_kecemasan'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRemajaAnak::route('/'),
            'create' => Pages\CreateRemajaAnak::route('/create'),
            'edit' => Pages\EditRemajaAnak::route('/{record}/edit'),
        ];
    }
}