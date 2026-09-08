<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-3xl text-slate-800 tracking-tight">
            {{ __('Panel Kendali Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 px-4 sm:px-0 space-y-8">

            <!-- STATISTIK SINGKAT -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-gradient-to-br from-emerald-600 to-emerald-800 rounded-3xl p-6 shadow-xl text-white">
                    <p class="text-sm font-bold uppercase tracking-wider text-emerald-200">Total Warga Aktif</p>
                    <h3 class="text-5xl font-black mt-2">{{ $totalWarga ?? 0 }}</h3>
                </div>
                
                <div class="bg-gradient-to-br from-slate-700 to-slate-900 rounded-3xl p-6 shadow-xl text-white">
                    <p class="text-sm font-bold uppercase tracking-wider text-slate-400">Juru Parkir Resmi</p>
                    <h3 class="text-5xl font-black mt-2 text-emerald-400">{{ $totalJukir ?? 0 }}</h3>
                </div>
                
                <div class="bg-gradient-to-br from-amber-500 to-orange-600 rounded-3xl p-6 shadow-xl text-white">
                    <p class="text-sm font-bold uppercase tracking-wider text-amber-200">Laporan Masuk</p>
                    <h3 class="text-5xl font-black mt-2">{{ $totalLaporan ?? 0 }}</h3>
                </div>
            </div>

            <!-- MENU KELOLA UTAMA -->
            <div class="bg-white p-8 shadow-xl sm:rounded-[2.5rem] border border-slate-100">
                <h3 class="text-2xl font-black text-slate-900 mb-6">Manajemen Sistem TitipKeun</h3>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <a href="/lokasi-parkir" class="block p-6 bg-slate-50 rounded-3xl border border-slate-200 hover:border-emerald-500 hover:bg-emerald-50 transition-all group">
                        <div class="text-4xl mb-4 group-hover:scale-110 transition-transform">📍</div>
                        <h4 class="text-xl font-black text-slate-800">Data Lokasi</h4>
                        <p class="text-sm text-slate-500 mt-2">Kelola daftar titik lokasi parkir resmi di wilayah Anda.</p>
                    </a>

                    <a href="/penugasan" class="block p-6 bg-slate-50 rounded-3xl border border-slate-200 hover:border-emerald-500 hover:bg-emerald-50 transition-all group">
                        <div class="text-4xl mb-4 group-hover:scale-110 transition-transform">📋</div>
                        <h4 class="text-xl font-black text-slate-800">Penugasan Jukir</h4>
                        <p class="text-sm text-slate-500 mt-2">Atur shift dan plotting petugas jukir ke lokasi.</p>
                    </a>

                    <a href="/laporan" class="block p-6 bg-slate-50 rounded-3xl border border-slate-200 hover:border-emerald-500 hover:bg-emerald-50 transition-all group">
                        <div class="text-4xl mb-4 group-hover:scale-110 transition-transform">🚨</div>
                        <h4 class="text-xl font-black text-slate-800">Tinjau Laporan</h4>
                        <p class="text-sm text-slate-500 mt-2">Evaluasi aduan warga terkait indikasi jukir liar.</p>
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>