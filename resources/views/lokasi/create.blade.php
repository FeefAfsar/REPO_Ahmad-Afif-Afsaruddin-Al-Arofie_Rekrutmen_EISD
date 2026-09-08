<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-3xl text-slate-800 tracking-tight">
            {{ __('Tambah Lokasi Parkir') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 px-4 sm:px-0">
            
            <div class="bg-white p-8 sm:p-10 shadow-xl sm:rounded-[2.5rem] border border-slate-100 relative overflow-hidden">
                <div class="absolute -right-10 -top-10 w-40 h-40 bg-emerald-500/10 rounded-full blur-3xl pointer-events-none"></div>

                <div class="mb-8 border-b border-slate-100 pb-6 relative z-10">
                    <div class="flex items-center gap-3 mb-2">
                        <span class="text-3xl">📍</span>
                        <h3 class="text-2xl font-black text-slate-900">Form Lokasi Parkir Baru</h3>
                    </div>
                    <p class="text-slate-500 text-sm mt-1">Daftarkan titik wilayah atau area parkir resmi baru ke dalam sistem TitipKeun.</p>
                </div>

                <form method="POST" action="{{ url('/lokasi-parkir') }}" class="space-y-6 relative z-10">
                    @csrf

                    <!-- 1. Input Nama Tempat / Lokasi -->
                    <div>
                        <label for="nama_tempat" class="block text-sm font-extrabold uppercase tracking-wider text-slate-600 mb-2">Nama Tempat / Area Parkir</label>
                        <input type="text" id="nama_tempat" name="nama_tempat" value="{{ old('nama_tempat') }}" 
                            class="w-full rounded-2xl border-slate-200 bg-slate-50/50 focus:bg-white focus:border-emerald-500 focus:ring-emerald-500 text-base py-3.5 px-4 transition" 
                            placeholder="Contoh: Ketoprak Denok / Minimarket Buahbatu" required autofocus />
                        @error('nama_tempat')
                            <p class="text-red-500 text-sm mt-2 font-bold">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- 2. Input Alamat Lengkap -->
                    <div>
                        <label for="alamat" class="block text-sm font-extrabold uppercase tracking-wider text-slate-600 mb-2">Alamat Lengkap / Keterangan</label>
                        <textarea id="alamat" name="alamat" rows="3" 
                            class="w-full rounded-2xl border-slate-200 bg-slate-50/50 focus:bg-white focus:border-emerald-500 focus:ring-emerald-500 text-base py-3.5 px-4 transition resize-none" 
                            placeholder="Contoh: Jl. Telekomunikasi No. 1, Sukapura..." required>{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <p class="text-red-500 text-sm mt-2 font-bold">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- 3. Tombol Aksi -->
                    <div class="flex flex-col-reverse sm:flex-row items-center gap-4 pt-6 mt-6 border-t border-slate-100">
                        <a href="{{ url('/lokasi-parkir') }}" class="text-slate-500 hover:text-slate-900 font-bold text-base px-6 py-4 transition-colors text-center w-full sm:w-auto">
                            Batal
                        </a>
                        <button type="submit" class="bg-slate-900 text-emerald-400 font-extrabold px-8 py-4 rounded-2xl shadow-xl hover:bg-slate-800 active:scale-[0.98] transition-all text-base tracking-wide w-full sm:w-auto sm:ml-auto border border-emerald-500/20">
                            Simpan Lokasi Baru
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>