<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-3xl text-slate-800 tracking-tight">
            {{ __('Verifikasi Laporan Warga') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 px-4 sm:px-0">
            
            <div class="bg-white p-8 sm:p-10 shadow-xl sm:rounded-[2.5rem] border border-slate-100">
                <div class="mb-8 border-b border-slate-100 pb-6">
                    <div class="flex items-center gap-3 mb-2">
                        <span class="text-3xl">📋</span>
                        <h3 class="text-2xl font-black text-slate-900">Update Status Laporan</h3>
                    </div>
                    <p class="text-slate-500 text-sm mt-1">Tinjau detail aduan warga dan perbarui status penindakannya di sistem.</p>
                </div>

                <!-- Rangkuman Informasi Laporan -->
                <div class="mb-8 p-6 bg-slate-50 rounded-3xl border border-slate-200 shadow-sm">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <p class="text-xs font-extrabold text-slate-500 uppercase tracking-wider">Lokasi Kejadian</p>
                            <p class="text-lg font-black text-slate-800 mt-1">{{ $laporan->nama_lokasi ?? 'Lokasi tidak diketahui' }}</p>
                        </div>
                        
                        <div class="sm:col-span-2 mt-2 border-t border-slate-200 pt-4">
                            <p class="text-xs font-extrabold text-slate-500 uppercase tracking-wider mb-2">Deskripsi Aduan</p>
                            <p class="text-base text-slate-700 leading-relaxed">{{ $laporan->deskripsi ?? 'Detail laporan tidak dilampirkan oleh pelapor.' }}</p>
                        </div>

                        <!-- Menampilkan Foto Bukti jika ada -->
                        @if(isset($laporan->foto_bukti) && $laporan->foto_bukti)
                        <div class="sm:col-span-2 mt-2 border-t border-slate-200 pt-4">
                            <p class="text-xs font-extrabold text-slate-500 uppercase tracking-wider mb-3">Foto Bukti Lampiran</p>
                            <img src="{{ asset('storage/' . $laporan->foto_bukti) }}" alt="Foto Bukti Laporan" class="rounded-2xl max-h-64 object-cover border border-slate-200 shadow-sm">
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Form Update Status -->
                <form method="POST" action="{{ url('/laporan/'.$laporan->id) }}" class="space-y-6">
                    @csrf
                    @method('PUT') <!-- Wajib untuk proses Update -->

                    <div>
                        <label for="status" class="block text-sm font-extrabold uppercase tracking-wider text-slate-600 mb-2">Status Penanganan</label>
                        <div class="relative">
                            <select id="status" name="status" class="w-full rounded-2xl border-slate-200 bg-slate-50/50 focus:bg-white focus:border-emerald-500 focus:ring-emerald-500 text-base py-3.5 appearance-none transition font-bold text-slate-700" required>
                                <option value="PENDING" {{ (old('status', $laporan->status ?? '')) == 'PENDING' ? 'selected' : '' }}>Menunggu Tinjauan (PENDING)</option>
                                <option value="DIPROSES" {{ (old('status', $laporan->status ?? '')) == 'DIPROSES' ? 'selected' : '' }}>Sedang Ditindak (DIPROSES)</option>
                                <option value="SELESAI" {{ (old('status', $laporan->status ?? '')) == 'SELESAI' ? 'selected' : '' }}>Masalah Terselesaikan (SELESAI)</option>
                                <option value="DITOLAK" {{ (old('status', $laporan->status ?? '')) == 'DITOLAK' ? 'selected' : '' }}>Laporan Tidak Valid (DITOLAK)</option>
                            </select>
                        </div>
                        @error('status')
                            <p class="text-red-500 text-sm mt-2 font-bold">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="flex flex-col-reverse sm:flex-row items-center gap-4 pt-6 mt-6 border-t border-slate-100">
                        <a href="{{ url('/laporan') }}" class="text-slate-500 hover:text-slate-900 font-bold text-base px-6 py-4 transition-colors text-center w-full sm:w-auto">
                            Batal
                        </a>
                        <button type="submit" class="bg-emerald-600 text-white font-extrabold px-8 py-4 rounded-2xl shadow-xl hover:bg-emerald-700 active:scale-[0.98] transition-all text-base tracking-wide w-full sm:w-auto sm:ml-auto">
                            Simpan Status Baru
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>