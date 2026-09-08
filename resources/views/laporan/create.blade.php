<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-3xl text-slate-800 tracking-tight">
            {{ __('Kirim Laporan Pengaduan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 px-4 sm:px-0">
            
            <div class="bg-white p-8 sm:p-10 shadow-xl sm:rounded-[2.5rem] border border-slate-100 relative overflow-hidden">
                <div class="absolute -right-10 -top-10 w-40 h-40 bg-amber-500/10 rounded-full blur-3xl pointer-events-none"></div>

                <div class="mb-8 border-b border-slate-100 pb-6 relative z-10">
                    <div class="flex items-center gap-3 mb-2">
                        <span class="text-3xl">🚨</span>
                        <h3 class="text-2xl font-black text-slate-900">Form Pengaduan Warga</h3>
                    </div>
                    <p class="text-slate-500 text-sm mt-1">Laporkan indikasi jukir liar, pungutan paksa, atau pelayanan tidak ramah. Laporan Anda sangat membantu kami menjaga ketertiban.</p>
                </div>

                <!-- WAJIB ADA: enctype="multipart/form-data" agar bisa kirim file -->
                <form method="POST" action="{{ url('/laporan') }}" class="space-y-6 relative z-10" enctype="multipart/form-data">
                    @csrf

                    <!-- 1. Input Lokasi -->
                    <div>
                        <label for="nama_lokasi" class="block text-sm font-extrabold uppercase tracking-wider text-slate-600 mb-2">Lokasi Titik Kejadian</label>
                        <div class="relative">
                            <select id="nama_lokasi" name="nama_lokasi" class="w-full rounded-2xl border-slate-200 bg-slate-50/50 focus:bg-white focus:border-emerald-500 focus:ring-emerald-500 text-base py-3.5 appearance-none transition" required autofocus>
                                <option value="" disabled selected>-- Pilih Lokasi Kejadian --</option>
                                @foreach($lokasis as $lok)
                                    <option value="{{ $lok->nama_tempat }}" {{ old('nama_lokasi') == $lok->nama_tempat ? 'selected' : '' }}>
                                        {{ $lok->nama_tempat }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @error('nama_lokasi')
                            <p class="text-red-500 text-sm mt-2 font-bold">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- 2. Input Deskripsi -->
                    <div>
                        <label for="deskripsi" class="block text-sm font-extrabold uppercase tracking-wider text-slate-600 mb-2">Deskripsi Kejadian</label>
                        <textarea id="deskripsi" name="deskripsi" rows="4" class="w-full rounded-2xl border-slate-200 bg-slate-50/50 focus:bg-white focus:border-emerald-500 focus:ring-emerald-500 text-base py-3.5 transition resize-none" placeholder="Ceritakan kronologi singkat di sini..." required>{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <p class="text-red-500 text-sm mt-2 font-bold">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- 3. INPUT FOTO BUKTI -->
                    <div>
                        <label for="foto_bukti" class="block text-sm font-extrabold uppercase tracking-wider text-slate-600 mb-2">
                            Foto Bukti <span class="text-slate-400 font-medium tracking-normal">(Opsional)</span>
                        </label>
                        
                        <input type="file" id="foto_bukti" name="foto_bukti" accept="image/*"
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50/50 text-slate-500 text-sm transition cursor-pointer 
                            file:mr-4 file:py-3.5 file:px-6 file:rounded-xl file:border-0 file:text-sm file:font-bold file:bg-emerald-100 file:text-emerald-700 hover:file:bg-emerald-200 file:transition-all p-2" />
                            
                        <p class="text-xs text-slate-400 mt-2 font-medium">Unggah foto oknum/karcis agar laporan lebih kuat (Maks: 2MB, Format: JPG/PNG).</p>
                        
                        @error('foto_bukti')
                            <p class="text-red-500 text-sm mt-2 font-bold">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- 4. Peringatan Keamanan -->
                    <div class="bg-amber-50 rounded-2xl p-4 border border-amber-200 flex gap-3 mt-2">
                        <span class="text-amber-500 mt-0.5">🛡️</span>
                        <p class="text-xs text-amber-800 font-medium leading-relaxed">
                            Identitas Anda sebagai pelapor beserta foto bukti akan dirahasiakan dan hanya dapat diakses oleh Admin sistem TitipKeun.
                        </p>
                    </div>

                    <!-- 5. Tombol Aksi -->
                    <div class="flex flex-col-reverse sm:flex-row items-center gap-4 pt-6 mt-6 border-t border-slate-100">
                        <a href="{{ url('/warga/dashboard') }}" class="text-slate-500 hover:text-slate-900 font-bold text-base px-6 py-4 transition-colors text-center w-full sm:w-auto">
                            Batal
                        </a>
                        <button type="submit" class="bg-slate-900 text-emerald-400 font-extrabold px-8 py-4 rounded-2xl shadow-xl hover:bg-slate-800 active:scale-[0.98] transition-all text-base tracking-wide w-full sm:w-auto sm:ml-auto border border-emerald-500/20">
                            Kirim Laporan
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>