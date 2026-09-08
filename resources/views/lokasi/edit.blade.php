<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-3xl text-slate-800 tracking-tight">
            {{ __('Edit Data Lokasi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 px-4 sm:px-0">
            
            <div class="bg-white p-8 sm:p-10 shadow-xl sm:rounded-[2.5rem] border border-slate-100">
                <div class="mb-8 border-b border-slate-100 pb-6">
                    <h3 class="text-2xl font-black text-slate-900">Perbarui Lokasi Parkir</h3>
                    <p class="text-slate-500 text-sm mt-1">Ubah detail nama tempat atau alamat lengkap untuk lokasi parkir ini.</p>
                </div>

                <!-- Sesuaikan action dengan route update kamu. Pakai method POST tapi dengan spoofing @method('PUT') -->
                <form method="POST" action="{{ url('/lokasi-parkir/'.$lokasi->id) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Input Nama Tempat -->
                    <div>
                        <label for="nama_tempat" class="block text-sm font-extrabold uppercase tracking-wider text-slate-600 mb-2">Nama Tempat</label>
                        <input type="text" id="nama_tempat" name="nama_tempat" 
                            class="w-full rounded-2xl border-slate-200 bg-slate-50/50 focus:bg-white focus:border-emerald-500 focus:ring-emerald-500 text-base py-3.5 transition" 
                            placeholder="Contoh: Gedung TULT..." 
                            value="{{ old('nama_tempat', $lokasi->nama_tempat) }}" required autofocus>
                        
                        @error('nama_tempat')
                            <p class="text-red-500 text-sm mt-2 font-bold">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Input Alamat -->
                    <div>
                        <label for="alamat" class="block text-sm font-extrabold uppercase tracking-wider text-slate-600 mb-2">Alamat Lengkap</label>
                        <textarea id="alamat" name="alamat" rows="4" 
                            class="w-full rounded-2xl border-slate-200 bg-slate-50/50 focus:bg-white focus:border-emerald-500 focus:ring-emerald-500 text-base py-3.5 transition resize-none" 
                            placeholder="Contoh: Jalan Telekomunikasi..." required>{{ old('alamat', $lokasi->alamat) }}</textarea>
                        
                        @error('alamat')
                            <p class="text-red-500 text-sm mt-2 font-bold">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="flex flex-col-reverse sm:flex-row items-center gap-4 pt-6 mt-6 border-t border-slate-100">
                        <a href="{{ url('/lokasi-parkir') }}" class="text-slate-500 hover:text-slate-900 font-bold text-base px-6 py-4 transition-colors text-center w-full sm:w-auto">
                            Batal
                        </a>

                        <button type="submit" class="bg-emerald-600 text-white font-extrabold px-8 py-4 rounded-2xl shadow-lg shadow-emerald-600/30 hover:bg-emerald-700 active:scale-[0.98] transition-all text-base tracking-wide w-full sm:w-auto sm:ml-auto">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>