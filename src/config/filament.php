<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Broadcasting
    |--------------------------------------------------------------------------
    |
    | Jika diperlukan, Anda dapat menghubungkan Filament ke server websocket
    | seperti Pusher atau server lain yang kompatibel untuk notifikasi real-time.
    |
    | Aktifkan konfigurasi Laravel Echo di bawah ini dengan menghapus komentar.
    |
    */

    'broadcasting' => [

        // 'echo' => [
        //     'broadcaster' => 'pusher',
        //     'key' => env('VITE_PUSHER_APP_KEY'),
        //     'cluster' => env('VITE_PUSHER_APP_CLUSTER'),
        //     'wsHost' => env('VITE_PUSHER_HOST'),
        //     'wsPort' => env('VITE_PUSHER_PORT'),
        //     'wssPort' => env('VITE_PUSHER_PORT'),
        //     'authEndpoint' => '/broadcasting/auth',
        //     'disableStats' => true,
        //     'encrypted' => true,
        //     'forceTLS' => true,
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Disk penyimpanan default untuk file yang digunakan Filament.
    | Gunakan nama disk yang tersedia di file `config/filesystems.php`.
    |
    */

    'default_filesystem_disk' => env('FILAMENT_FILESYSTEM_DISK', 'public'),

    /*
    |--------------------------------------------------------------------------
    | Assets Path
    |--------------------------------------------------------------------------
    |
    | Direktori tempat aset Filament dipublikasikan.
    | Jalur ini relatif terhadap direktori `public`.
    |
    | Jalankan perintah `php artisan filament:assets` setelah perubahan.
    |
    */

    'assets_path' => null,

    /*
    |--------------------------------------------------------------------------
    | Cache Path
    |--------------------------------------------------------------------------
    |
    | Direktori penyimpanan file cache Filament yang digunakan untuk
    | mengoptimalkan registrasi komponen.
    |
    | Jalankan `php artisan filament:cache-components` setelah perubahan.
    |
    */

    'cache_path' => base_path('bootstrap/cache/filament'),

    /*
    |--------------------------------------------------------------------------
    | Livewire Loading Delay
    |--------------------------------------------------------------------------
    |
    | Menentukan jeda sebelum indikator loading muncul.
    |
    | Opsi: 'none' = muncul langsung, 'default' = jeda 200ms (standar Livewire).
    |
    */

    'livewire_loading_delay' => 'default',

    /*
    |--------------------------------------------------------------------------
    | System Route Prefix
    |--------------------------------------------------------------------------
    |
    | Prefix rute untuk sistem internal Filament (seperti ekspor dan impor).
    |
    */

    'system_route_prefix' => 'filament',

    /*
    |--------------------------------------------------------------------------
    | Panel Providers
    |--------------------------------------------------------------------------
    |
    | Daftar class panel Filament yang digunakan oleh aplikasi.
    |
    */

    'panel-providers' => [
        App\Providers\Filament\AdminPanelProvider::class,
        App\Providers\Filament\OrangTuaPanelProvider::class,
    ],

];