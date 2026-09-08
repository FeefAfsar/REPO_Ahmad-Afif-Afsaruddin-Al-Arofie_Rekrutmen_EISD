<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Warga - Status Bebas Parkir') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            @if(session('success'))
                <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl shadow-sm text-sm font-medium flex items-center gap-2">
                    ✨ {{ session('success') }}
                </div>
            @endif

            <!-- KARTU DIGITAL RETRIBUSI -->
            <div class="bg-gradient-to-br {{ $user->status_retribusi ? 'from-emerald-600 via-teal-700 to-slate-900' : 'from-slate-700 to-slate-900' }} rounded-3xl shadow-2xl p-8 text-white relative overflow-hidden transition-all duration-500 border border-white/10">
                <div class="absolute -right-10 -bottom-10 w-56 h-56 bg-white/5 rounded-full blur-2xl pointer-events-none"></div>
                
                <div class="flex justify-between items-start mb-8 relative z-10">
                    <div>
                        <span class="px-3 py-1 bg-white/10 backdrop-blur-md rounded-full text-[10px] font-bold uppercase tracking-widest text-teal-200 border border-white/10">
                            TitipKeun Official Card
                        </span>
                        <h3 class="text-3xl font-extrabold mt-3 tracking-tight">{{ $user->name }}</h3>
                    </div>
                    <span class="px-4 py-1.5 text-xs font-bold rounded-full uppercase tracking-wider shadow-sm {{ $user->status_retribusi ? 'bg-emerald-400 text-emerald-950 ring-4 ring-emerald-400/20' : 'bg-amber-400 text-amber-950' }}">
                        {{ $user->status_retribusi ? 'AKTIF (Bebas Parkir)' : 'BELUM AKTIF' }}
                    </span>
                </div>

                <div class="border-t border-white/15 pt-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 relative z-10">
                    <div>
                        <p class="text-xs text-slate-300 font-medium">ID / Email Terdaftar</p>
                        <p class="text-sm font-mono tracking-wide mt-0.5 text-white/90">{{ $user->email }}</p>
                    </div>

                    @if(!$user->status_retribusi)
                        <form action="/warga/aktivasi" method="POST">
                            @csrf
                            <button type="submit" class="bg-white text-slate-900 font-bold px-6 py-3 rounded-2xl shadow-lg hover:bg-slate-100 transition-all transform active:scale-95 text-sm tracking-wide">
                                Aktifkan Retribusi Sekarang
                            </button>
                        </form>
                    @else
                        <div class="bg-white/10 px-4 py-2.5 rounded-2xl text-xs backdrop-blur-md border border-white/10 text-emerald-100 font-medium">
                            🛡️ Tunjukkan kartu digital ini kepada Jukir di lokasi parkir.
                        </div>
                    @endif
                </div>
            </div>

            <!-- RIWAYAT LAPORAN -->
            <div class="bg-white p-6 sm:p-8 shadow-xl sm:rounded-3xl border border-gray-100/80">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900">Riwayat Laporan & Aduan</h3>
                        <p class="text-xs text-gray-500 mt-0.5">Daftar laporan kendala atau jukir liar yang pernah kamu kirimkan.</p>
                    </div>
                    <a href="/laporan/create" class="bg-indigo-600 text-white px-4 py-2.5 rounded-2xl text-xs font-bold shadow-md shadow-indigo-100 hover:bg-indigo-700 transition-all">+ Buat Laporan</a>
                </div>

                <div class="overflow-x-auto rounded-2xl border border-gray-100">
                    <table class="w-full border-collapse text-left">
                        <thead>
                            <tr class="bg-gray-50/70 text-[11px] uppercase text-gray-400 font-bold tracking-wider">
                                <th class="p-4">Lokasi</th>
                                <th class="p-4">Deskripsi Kejadian</th>
                                <th class="p-4 text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-100">
                            @forelse($laporanSaya as $lap)
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="p-4 font-semibold text-gray-800">{{ $lap->nama_lokasi }}</td>
                                <td class="p-4 text-gray-600 leading-relaxed">{{ $lap->deskripsi }}</td>
                                <td class="p-4 text-center">
                                    <span class="px-3 py-1 text-[11px] font-extrabold rounded-full {{ $lap->status == 'PENDING' ? 'bg-amber-50 text-amber-700 border border-amber-200' : 'bg-emerald-50 text-emerald-700 border border-emerald-200' }}">
                                        {{ strtoupper($lap->status) }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="p-8 text-center text-gray-400 text-sm italic">Belum ada riwayat laporan yang dikirim.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>