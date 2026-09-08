<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight">
            {{ __('Jadwal & Lokasi Penugasan Saya') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <div class="bg-white p-6 sm:p-8 shadow-xl sm:rounded-3xl border border-gray-100/80">
                <div class="mb-6">
                    <h3 class="text-lg font-bold text-gray-900">Halo, {{ auth()->user()->name }}.</h3>
                    <p class="text-xs text-gray-500 mt-0.5">Berikut adalah daftar titik tempat parkir resmi yang menjadi tanggung jawab tugasmu:</p>
                </div>

                <div class="overflow-x-auto rounded-2xl border border-gray-100">
                    <table class="w-full border-collapse text-left">
                        <thead>
                            <tr class="bg-gray-50/70 text-[11px] uppercase text-gray-400 font-bold tracking-wider">
                                <th class="p-4">Nama Tempat</th>
                                <th class="p-4">Alamat</th>
                                <th class="p-4 text-center">Shift Tugas</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-100">
                            @forelse($penugasannya as $lokasi)
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="p-4 font-semibold text-gray-800">{{ $lokasi->nama_tempat }}</td>
                                <td class="p-4 text-gray-600 leading-relaxed">{{ $lokasi->alamat }}</td>
                                <td class="p-4 text-center">
                                    <span class="px-3 py-1 text-[11px] font-extrabold bg-indigo-50 text-indigo-700 border border-indigo-200 rounded-full">
                                        {{ $lokasi->pivot->shift ?? '-' }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="p-8 text-center text-gray-400 text-sm italic">Belum ada penugasan lokasi dari Admin.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>