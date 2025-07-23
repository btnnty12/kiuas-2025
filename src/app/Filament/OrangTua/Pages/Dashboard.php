<?php

namespace App\Filament\OrangTua\Pages;

use App\Models\AksesKunci;
use Filament\Pages\Page;

class Dashboard extends Page
{
    protected static ?string $navigationLabel = 'Beranda';
    protected static string $view = 'filament.orang-tua.pages.dashboard';

    public $dataAnak;

    public function mount()
    {
        $this->dataAnak = AksesKunci::with('remajaAnak')
            ->where('orang_tua_id', auth()->id())
            ->get();
    }
}