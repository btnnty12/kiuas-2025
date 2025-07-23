<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\AksesKunciResource\Pages;
use App\Filament\Admin\Resources\AksesKunciResource\RelationManagers;
use App\Models\AksesKunci;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class AksesKunciResource extends Resource
{
    protected static ?string $model = AksesKunci::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('orang_tua_id')
                    ->relationship('orangTua', 'nama')
                    ->required(),
                Forms\Components\Select::make('remajaanak_id')
                    ->relationship('remajaAnak', 'nama')
                    ->required(),
                Forms\Components\TextInput::make('kunci_terenkripsi')
                    ->default(fn () => Str::random(32))
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('orangTua.nama')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('remajaAnak.nama')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('kunci_terenkripsi')->label('Kunci Akses'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListAksesKuncis::route('/'),
            'create' => Pages\CreateAksesKunci::route('/create'),
            'edit' => Pages\EditAksesKunci::route('/{record}/edit'),
        ];
    }
}
