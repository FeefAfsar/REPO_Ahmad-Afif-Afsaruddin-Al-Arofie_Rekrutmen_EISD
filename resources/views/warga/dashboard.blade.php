<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-3xl text-slate-800 tracking-tight">
            {{ __('Dashboard Warga') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-8 px-4 sm:px-0">
            
            @if(session('success'))
                <div class="p-5 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-2xl shadow-sm text-base font-bold flex items-center gap-3">
                    <span class="text-2xl">✨</span> {{ session('success') }}
                </div>
            @endif

            <!-- KARTU DIGITAL RETRIBUSI EKSKLUSIF -->
            <div class="relative bg-gradient-to-br {{ $user->status_retribusi ? 'from-emerald-900 via-teal-900 to-slate-900' : 'from-slate-800 to-slate-950' }} rounded-[2.5rem] shadow-2xl p-10 text-white overflow-hidden border border-white/10 transition-all duration-500">
                <div class="absolute -right-12 -bottom-12 w-64 h-64 bg-emerald-500/10 rounded-full blur-3xl pointer-events-none"></div>
                
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-10 relative z-10 gap-4">
                    <div>
                        <span class="px-4 py-1.5 bg-white/10 backdrop-blur-md rounded-full text-xs font-black uppercase tracking-widest text-emerald-300 border border-white/10">
                            TitipKeun Secure Pass
                        </span>
                        <h3 class="text-4xl font-black mt-4 tracking-tight">{{ $user->name }}</h3>
                    </div>
                    <span class="px-5 py-2 text-sm font-black rounded-full uppercase tracking-wider shadow-lg {{ $user->status_retribusi ? 'bg-emerald-400 text-emerald-950 ring-4 ring-emerald-400/20' : 'bg-amber-400 text-amber-950' }}">
                        {{ $user->status_retribusi ? 'AKTIF (Bebas Parkir)' : 'BELUM AKTIF' }}
                    </span>
                </div>

                <div class="border-t border-white/15 pt-8 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-6 relative z-10">
                    <div>
                        <p class="text-sm text-slate-400 font-bold uppercase tracking-wider">ID Pengguna / Email</p>
                        <p class="text-lg font-mono font-medium tracking-wide mt-1 text-white/90">{{ $user->email }}</p>
                    </div>

                    @if(!$user->status_retribusi)
                        <form action="/warga/aktivasi" method="POST">
                            @csrf
                            <button type="submit" class="bg-emerald-400 text-slate-950 font-black px-8 py-4 rounded-2xl shadow-xl hover:bg-emerald-300 active:scale-95 transition-all text-sm tracking-wider uppercase">
                                Aktifkan Status Retribusi
                            </button>
                        </form>
                    @else
                        <div class="bg-white/10 px-5 py-4 rounded-2xl text-base backdrop-blur-md border border-white/10 text-emerald-100 font-bold flex items-center gap-3">
                            <span class="text-xl">🛡️</span> Kartu valid, tunjukkan ke Jukir resmi.
                        </div>
                    @endif
                </div>
            </div>

            <!-- RIWAYAT LAPORAN & PENGADUAN -->
            <div class="bg-white p-8 shadow-xl sm:rounded-[2.5rem] border border-slate-100">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4">
                    <div>
                        <h3 class="text-2xl font-black text-slate-900">Riwayat Laporan</h3>
                        <p class="text-sm text-slate-500 mt-1">Daftar aduan jukir liar yang Anda laporkan.</p>
                    </div>
                    <a href="/laporan/create" class="bg-slate-900 text-emerald-400 px-6 py-3.5 rounded-2xl text-sm font-black shadow-lg shadow-slate-900/10 hover:bg-slate-800 transition-all border border-emerald-500/20">
                        + Buat Laporan Baru
                    </a>
                </div>

                <div class="overflow-x-auto rounded-2xl border border-slate-200">
                    <table class="w-full border-collapse text-left">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-200 text-xs uppercase text-slate-500 font-black tracking-widest">
                                <th class="p-5">Lokasi Kejadian</th>
                                <th class="p-5">Deskripsi</th>
                                <th class="p-5 text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-base divide-y divide-slate-100">
                            @forelse($laporanSaya as $lap)
                            <tr class="hover:bg-slate-50/50 transition-colors">
                                <td class="p-5 font-bold text-slate-800">{{ $lap->nama_lokasi }}</td>
                                <td class="p-5 text-slate-600 leading-relaxed">{{ $lap->deskripsi }}</td>
                                <td class="p-5 text-center">
                                    <span class="px-4 py-1.5 text-xs font-black rounded-full uppercase tracking-wider {{ $lap->status == 'PENDING' ? 'bg-amber-100 text-amber-800 border border-amber-200' : 'bg-emerald-100 text-emerald-800 border border-emerald-200' }}">
                                        {{ $lap->status }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="p-10 text-center text-slate-400 text-base italic font-medium">Belum ada riwayat laporan yang dikirim.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>