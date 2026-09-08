<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-3xl text-slate-800 tracking-tight">
            {{ __('Manajemen Penugasan Jukir') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8 px-4 sm:px-0">
            
            @if(session('success'))
                <div class="p-5 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-2xl shadow-sm text-base font-bold flex items-center gap-3">
                    <span class="text-2xl">✨</span> {{ session('success') }}
                </div>
            @endif

            <!-- HEADER SECTION -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 bg-white p-6 sm:p-8 rounded-[2rem] shadow-xl border border-slate-100">
                <div>
                    <h3 class="text-2xl font-black text-slate-900">Daftar Plotting Petugas</h3>
                    <p class="text-slate-500 text-sm mt-1">Atur dan pantau jadwal shift juru parkir resmi di berbagai lokasi.</p>
                </div>
                
                <a href="{{ url('/penugasan/create') }}" class="bg-slate-900 text-emerald-400 font-extrabold px-6 py-4 rounded-2xl shadow-lg shadow-slate-900/20 hover:bg-slate-800 active:scale-95 transition-all text-sm tracking-wide border border-emerald-500/20">
                    + Buat Penugasan Baru
                </a>
            </div>

            <!-- TABLE SECTION -->
            <div class="bg-white shadow-xl sm:rounded-[2.5rem] border border-slate-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-200 text-xs uppercase text-slate-500 font-black tracking-widest">
                                <th class="p-6">Nama Juru Parkir</th>
                                <th class="p-6">Lokasi Penugasan</th>
                                <th class="p-6 text-center">Shift Waktu</th>
                                <th class="p-6 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-base divide-y divide-slate-100">
                            
                            {{-- Ganti $penugasans dengan variabel yang dikirim dari controller kamu --}}
                            @forelse($penugasans ?? [] as $tugas)
                            <tr class="hover:bg-slate-50/50 transition-colors">
                                <td class="p-6 font-bold text-slate-800">{{ $tugas->user->name ?? 'Jukir' }}</td>
                                <td class="p-6 text-slate-600">{{ $tugas->lokasi->nama_tempat ?? 'Lokasi' }}</td>
                                <td class="p-6 text-center">
                                    <span class="px-4 py-1.5 bg-slate-900 text-emerald-400 rounded-full text-xs font-black shadow-sm">
                                        {{ $tugas->shift ?? 'Pagi' }}
                                    </span>
                                </td>
                                <td class="p-6 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="/penugasan/{{ $tugas->id }}/edit" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold rounded-xl text-sm transition-all border border-slate-200">
                                            Ubah
                                        </a>
                                        
                                        <form action="{{ url('/penugasan/' . $tugas->id) }}" method="POST" onsubmit="return confirm('Yakin ingin mencabut penugasan ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 font-bold text-xs bg-red-50 hover:bg-red-100 px-3 py-1.5 rounded-xl transition">
                                                Cabut
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="p-12 text-center text-slate-400 text-base italic font-medium">
                                    <div class="text-4xl mb-3">📋</div>
                                    Belum ada data penugasan jukir saat ini.
                                </td>
                            </tr>
                            @endforelse
                            
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>