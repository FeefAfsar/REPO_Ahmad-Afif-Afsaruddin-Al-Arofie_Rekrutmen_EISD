<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Penugasan Jukir') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            @if(session('success'))
                <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl shadow-sm text-sm font-medium flex items-center gap-2">
                    ✨ {{ session('success') }}
                </div>
            @endif

            <div class="bg-white p-6 sm:p-8 shadow-xl sm:rounded-3xl border border-gray-100/80">
                <div class="mb-6 flex justify-between items-center">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900">Form Atur Penugasan</h3>
                        <p class="text-xs text-gray-500 mt-0.5">Pasangkan akun Jukir ke titik lokasi parkir dan tentukan shift kerjanya.</p>
                    </div>
                    <a href="/lokasi-parkir" class="text-xs font-bold text-indigo-600 hover:text-indigo-800">&larr; Kembali ke Lokasi</a>
                </div>

                <form action="/penugasan" method="POST" class="space-y-5">
                    @csrf
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">Pilih Jukir:</label>
                        <select name="user_id" class="w-full rounded-2xl border-gray-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                            @foreach($jukirs as $jukir)
                                <option value="{{ $jukir->id }}">{{ $jukir->name }} ({{ $jukir->email }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">Pilih Lokasi Parkir:</label>
                        <select name="lokasi_parkir_id" class="w-full rounded-2xl border-gray-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                            @foreach($lokasis as $lokasi)
                                <option value="{{ $lokasi->id }}">{{ $lokasi->nama_tempat }} - {{ $lokasi->alamat }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">Shift Tugas:</label>
                        <select name="shift" class="w-full rounded-2xl border-gray-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                            <option value="Pagi">Pagi</option>
                            <option value="Siang">Siang</option>
                            <option value="Malam">Malam</option>
                        </select>
                    </div>

                    <div class="pt-2">
                        <button type="submit" class="w-full bg-indigo-600 text-white font-bold py-3 rounded-2xl shadow-lg shadow-indigo-100 hover:bg-indigo-700 transition-all text-sm tracking-wide">
                            Tugaskan Jukir Sekarang
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>