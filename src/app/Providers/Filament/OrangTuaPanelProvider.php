<?php

namespace App\Providers\Filament;

use Filament\Panel;
use Filament\PanelProvider;
use Filament\Enums\ThemeMode;
use Filament\Support\Colors\Color;
use Illuminate\Support\Facades\Auth;
use Filament\Http\Middleware\Authenticate;

class OrangTuaPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('orang-tua')
            ->path('orang-tua') // login via /orang-tua
            ->login()
            ->authGuard('web')
            ->colors(['primary' => Color::Blue])
            ->defaultThemeMode(ThemeMode::Light)
            ->font('Inter')
            ->sidebarCollapsibleOnDesktop()
            ->resources([
                \App\Filament\Admin\Resources\AksesKunciResource::class,
                \App\Filament\Admin\Resources\RemajaAnakResource::class,
                \App\Filament\Admin\Resources\CatatanEmosiResource::class,
            ])
            ->pages([
                \App\Filament\OrangTua\Pages\Dashboard::class,
            ])
            ->homeUrl(fn () => route('filament.orang-tua.pages.dashboard'))
            ->authMiddleware([
                Authenticate::class,
            ])
            ->discoverPages(
                in: app_path('Filament/OrangTua/Pages'),
                for: 'App\\Filament\\OrangTua\\Pages'
            );
    }
        public function canAccessPanel(Request $request): bool
    {
        return auth()->check() && auth()->user()->role === 'orang_tua';
    }
}