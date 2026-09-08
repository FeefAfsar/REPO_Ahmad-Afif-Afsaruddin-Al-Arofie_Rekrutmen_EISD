<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-3xl text-slate-800 tracking-tight">
            {{ __('Buat Penugasan Jukir') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 px-4 sm:px-0">
            
            <div class="bg-white p-8 sm:p-10 shadow-xl sm:rounded-[2.5rem] border border-slate-100">
                <div class="mb-8 border-b border-slate-100 pb-6">
                    <h3 class="text-2xl font-black text-slate-900">Form Plotting Petugas</h3>
                    <p class="text-slate-500 text-sm mt-1">Tugaskan juru parkir resmi ke titik lokasi tertentu beserta shift waktunya.</p>
                </div>

                <form method="POST" action="{{ url('/penugasan') }}" class="space-y-6">
                    @csrf

                    <!-- Pilih Jukir -->
                    <div>
                        <label for="user_id" class="block text-sm font-extrabold uppercase tracking-wider text-slate-600 mb-2">Pilih Juru Parkir</label>
                        <select id="user_id" name="user_id" class="w-full rounded-2xl border-slate-200 bg-slate-50/50 focus:bg-white focus:border-emerald-500 focus:ring-emerald-500 text-base py-3.5 transition" required>
                            <option value="" disabled selected>-- Pilih Petugas Jukir --</option>
                            @foreach($jukirs ?? [] as $jukir)
                                <option value="{{ $jukir->id }}">{{ $jukir->name }} ({{ $jukir->email }})</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Pilih Lokasi -->
                    <div>
                        <label for="lokasi_id" class="block text-sm font-extrabold uppercase tracking-wider text-slate-600 mb-2">Lokasi Penugasan</label>
                        <select id="lokasi_id" name="lokasi_id" class="w-full rounded-2xl border-slate-200 bg-slate-50/50 focus:bg-white focus:border-emerald-500 focus:ring-emerald-500 text-base py-3.5 transition" required>
                            <option value="" disabled selected>-- Pilih Lokasi Parkir --</option>
                            @foreach($lokasis ?? [] as $lok)
                                <option value="{{ $lok->id }}">{{ $lok->nama_tempat }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Pilih Shift -->
                    <div>
                        <label for="shift" class="block text-sm font-extrabold uppercase tracking-wider text-slate-600 mb-2">Shift Waktu</label>
                        <select id="shift" name="shift" class="w-full rounded-2xl border-slate-200 bg-slate-50/50 focus:bg-white focus:border-emerald-500 focus:ring-emerald-500 text-base py-3.5 transition" required>
                            <option value="Pagi">Shift Pagi (07:00 - 15:00)</option>
                            <option value="Sore">Shift Sore (15:00 - 23:00)</option>
                            <option value="Malam">Shift Malam (23:00 - 07:00)</option>
                        </select>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="flex flex-col-reverse sm:flex-row items-center gap-4 pt-6 mt-6 border-t border-slate-100">
                        <a href="{{ url('/penugasan') }}" class="text-slate-500 hover:text-slate-900 font-bold text-base px-6 py-4 transition-colors text-center w-full sm:w-auto">
                            Batal
                        </a>
                        <button type="submit" class="bg-emerald-600 text-white font-extrabold px-8 py-4 rounded-2xl shadow-lg shadow-emerald-600/30 hover:bg-emerald-700 active:scale-[0.98] transition-all text-base tracking-wide w-full sm:w-auto sm:ml-auto">
                            Simpan Penugasan
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>