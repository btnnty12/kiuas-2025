<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\CatatanEmosiResource\Pages;
use App\Models\CatatanEmosi;
use App\Models\RemajaAnak;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CatatanEmosiResource extends Resource
{
    protected static ?string $model = CatatanEmosi::class;

    protected static ?string $navigationIcon = 'heroicon-o-face-smile';
    protected static ?string $navigationLabel = 'Catatan Emosi';
    protected static ?string $pluralModelLabel = 'Catatan Emosi';
    protected static ?string $navigationGroup = 'Pemantauan Emosi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('remajaanak_id')
                    ->label('Remaja')
                    ->relationship('remajaAnak', 'nama')
                    ->searchable()
                    ->required(),

                Forms\Components\DatePicker::make('tanggal')
                    ->label('Tanggal')
                    ->default(now())
                    ->required(),

                Forms\Components\TextInput::make('emosi')
                    ->label('Emosi')
                    ->placeholder('Contoh: marah, sedih, senang, takut')
                    ->required(),

                Forms\Components\Textarea::make('catatan')
                    ->label('Catatan')
                    ->placeholder('Catatan tambahan terkait emosi...')
                    ->rows(4)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('remajaAnak.nama')
                    ->label('Remaja')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('tanggal')
                    ->label('Tanggal')
                    ->date()
                    ->sortable(),

                Tables\Columns\TextColumn::make('emosi')
                    ->label('Emosi')
                    ->badge()
                    ->color(fn (string $state): string => match (strtolower($state)) {
                        'senang' => 'success',
                        'sedih' => 'gray',
                        'marah' => 'danger',
                        'cemas', 'takut' => 'warning',
                        default => 'primary',
                    }),

                Tables\Columns\TextColumn::make('catatan')
                    ->label('Catatan')
                    ->limit(30)
                    ->wrap(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('emosi')
                    ->label('Filter Emosi')
                    ->options([
                        'senang' => 'Senang',
                        'sedih' => 'Sedih',
                        'marah' => 'Marah',
                        'cemas' => 'Cemas',
                        'takut' => 'Takut',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label('Edit'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()->label('Hapus Terpilih'),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // jika kamu ingin menambahkan relasi ke tabel lain, tambahkan RelationManager di sini
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCatatanEmosis::route('/'),
            'create' => Pages\CreateCatatanEmosi::route('/create'),
            'edit' => Pages\EditCatatanEmosi::route('/{record}/edit'),
        ];
    }
}