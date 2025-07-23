<x-filament::page>
    <div class="space-y-4">
        <h2 class="text-2xl font-bold">Selamat datang, {{ auth()->user()->name }}</h2>

        <div class="p-4 bg-white rounded shadow">
            <h3 class="text-lg font-semibold mb-2">Daftar Anak Anda</h3>
            <table class="w-full text-sm text-left text-gray-600">
                <thead class="text-xs uppercase bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-4 py-2">Nama Anak</th>
                        <th class="px-4 py-2">Lihat Catatan Emosi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (\App\Models\AksesKunci::where('orang_tua_id', auth()->id())->with('remajaAnak')->get() as $akses)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $akses->remajaAnak->nama }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('filament.orang-tua.resources.catatan-emosis.index') }}"
                                   class="text-primary-600 hover:underline">
                                    Lihat Catatan
                                </a>
                            </td>
                        </tr>
                    @endforeach

                    @if ($akses->isEmpty())
                        <tr>
                            <td colspan="2" class="px-4 py-2 text-gray-500 italic text-center">
                                Tidak ada data anak yang terhubung.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-filament::page>