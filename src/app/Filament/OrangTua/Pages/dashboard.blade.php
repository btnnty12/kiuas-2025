<x-filament::page>
    <div class="space-y-4">
        <h2 class="text-xl font-bold">Selamat datang, {{ auth()->user()->name }}</h2>

        <h3 class="text-lg font-semibold">Daftar Anak Terhubung:</h3>

        @forelse ($dataAnak as $item)
            <div class="p-4 bg-white rounded-lg shadow">
                <p><strong>Nama Anak:</strong> {{ $item->remajaAnak->name ?? 'Tidak Diketahui' }}</p>
                <p><strong>ID Anak:</strong> {{ $item->remajaanak_id }}</p>
                <p><strong>Status Akses:</strong> Kunci Diperlukan</p>
                <a href="{{ route('filament.orang-tua.resources.catatan-emosis.view', $item->remajaanak_id) }}"
                   class="text-blue-600 hover:underline">Lihat Catatan Emosi</a>
            </div>
        @empty
            <p>Tidak ada anak yang terhubung dengan akun Anda.</p>
        @endforelse
    </div>
</x-filament::page>