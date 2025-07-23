<?php

namespace App\Filament\Admin\Resources\CatatanEmosiResource\Pages;

use App\Filament\Admin\Resources\CatatanEmosiResource;
use Filament\Actions\Action;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Support\Facades\Hash;
use App\Models\AksesKunci;

class ViewCatatanEmosi extends ViewRecord
{
    protected static string $resource = CatatanEmosiResource::class;

    public function mount($record): void
    {
        parent::mount($record);

        // Sembunyikan catatan jika belum diberikan akses
        if (auth()->user()->hasRole('orang_tua') &&
            !session('akses_catatan_' . $this->record->id)) {
            $this->record->makeHidden(['catatan']);
        }
    }

    protected function getHeaderActions(): array
    {
        if (auth()->user()->hasRole('orang_tua')) {
            return [
                Action::make('Masukkan Kunci')
                    ->form([
                        \Filament\Forms\Components\TextInput::make('kunci')
                            ->password()
                            ->required(),
                    ])
                    ->action(function (array $data) {
                        $akses = AksesKunci::where('orang_tua_id', auth()->id())
                            ->where('remajaanak_id', $this->record->remajaanak_id)
                            ->first();

                        if ($akses && Hash::check($data['kunci'], $akses->kunci_terenkripsi)) {
                            session()->put('akses_catatan_' . $this->record->id, true);
                            $this->notify('success', 'Akses Diberikan. Silakan refresh halaman.');
                        } else {
                            $this->notify('danger', 'Kunci Salah atau Tidak Ditemukan');
                        }
                    }),
            ];
        }

        return parent::getHeaderActions();
    }
}