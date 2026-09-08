<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Laporan Jukir') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <div class="flex flex-wrap gap-3 items-center justify-between">
                <div class="flex gap-2">
                    <a href="/laporan/create" class="inline-flex items-center px-4 py-2.5 bg-indigo-600 border border-transparent rounded-2xl font-bold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 shadow-md shadow-indigo-100 transition">
                        + Buat Laporan
                    </a>
                    
                    @if(auth()->user()->role === 'admin')
                        <a href="/lokasi-parkir" class="inline-flex items-center px-4 py-2.5 bg-white border border-gray-200 rounded-2xl font-bold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-50 transition">
                            Lihat Lokasi
                        </a>
                    @else
                        <a href="/warga/dashboard" class="inline-flex items-center px-4 py-2.5 bg-white border border-gray-200 rounded-2xl font-bold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-50 transition">
                            &larr; Kembali ke Dashboard
                        </a>
                    @endif
                </div>
            </div>

            <div class="bg-white p-6 sm:p-8 shadow-xl sm:rounded-3xl border border-gray-100/80 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse text-left">
                        <thead>
                            <tr class="bg-gray-50/70 text-[11px] uppercase text-gray-400 font-bold tracking-wider">
                                <th class="p-4">Lokasi</th>
                                <th class="p-4">Deskripsi Kejadian</th>
                                <th class="p-4">Status</th>
                                <th class="p-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-100">
                            @foreach($laporan as $item)
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="p-4 font-semibold text-gray-800">{{ $item->nama_lokasi }}</td>
                                <td class="p-4 text-gray-600">{{ $item->deskripsi }}</td>
                                <td class="p-4">
                                    <span class="px-3 py-1 text-[11px] font-extrabold rounded-full {{ $item->status == 'PENDING' ? 'bg-amber-50 text-amber-700 border border-amber-200' : 'bg-emerald-50 text-emerald-700 border border-emerald-200' }}">
                                        {{ strtoupper($item->status) }}
                                    </span>
                                </td>
                                <td class="p-4 text-center">
                                    @if(auth()->user()->role === 'admin')
                                        <div class="inline-flex items-center gap-3">
                                            <a href="/laporan/{{ $item->id }}/edit" class="text-xs font-bold text-indigo-600 hover:text-indigo-900 bg-indigo-50 px-3 py-1.5 rounded-xl">Update</a>
                                            <form action="/laporan/{{ $item->id }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus laporan ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-xs font-bold text-rose-600 hover:text-rose-900 bg-rose-50 px-3 py-1.5 rounded-xl">Hapus</button>
                                            </form>
                                        </div>
                                    @else
                                        <span class="text-xs text-gray-400 italic">Hanya Admin</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>