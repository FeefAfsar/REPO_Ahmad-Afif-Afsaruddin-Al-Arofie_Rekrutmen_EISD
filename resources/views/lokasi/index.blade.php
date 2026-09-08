<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-3xl text-slate-800 tracking-tight">
            {{ __('Data Lokasi Parkir') }}
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
                    <h3 class="text-2xl font-black text-slate-900">Daftar Titik Parkir Resmi</h3>
                    <p class="text-slate-500 text-sm mt-1">Kelola dan pantau seluruh lokasi parkir yang terdaftar dalam sistem TitipKeun.</p>
                </div>
                
                <!-- Sesuaikan href dengan route create lokasi kamu -->
                <a href="{{ url('/lokasi-parkir/create') }}" class="bg-emerald-600 text-white font-extrabold px-6 py-4 rounded-2xl shadow-lg shadow-emerald-600/30 hover:bg-emerald-700 active:scale-95 transition-all text-sm tracking-wide">
                    + Tambah Lokasi Baru
                </a>
            </div>

            <!-- TABLE SECTION -->
            <div class="bg-white shadow-xl sm:rounded-[2.5rem] border border-slate-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-200 text-xs uppercase text-slate-500 font-black tracking-widest">
                                <th class="p-6">Nama Tempat</th>
                                <th class="p-6">Alamat Lengkap</th>
                                <th class="p-6 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-base divide-y divide-slate-100">
                            
                            @forelse($lokasis as $lokasi)
                            <tr class="hover:bg-slate-50/50 transition-colors">
                                <td class="p-6 font-bold text-slate-800">{{ $lokasi->nama_tempat }}</td>
                                <td class="p-6 text-slate-600">{{ $lokasi->alamat }}</td>
                                <td class="p-6 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <!-- Tombol Edit -->
                                        <a href="/lokasi-parkir/{{ $lokasi->id }}/edit" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold rounded-xl text-sm transition-all border border-slate-200">
                                            Edit
                                        </a>
                                        
                                        <!-- Tombol Hapus (dibungkus form agar aman) -->
                                        <form action="/lokasi-parkir/{{ $lokasi->id }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus lokasi ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-4 py-2 bg-red-50 hover:bg-red-100 text-red-600 font-bold rounded-xl text-sm transition-all border border-red-100">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="p-12 text-center text-slate-400 text-base italic font-medium">
                                    <div class="text-4xl mb-3">📍</div>
                                    Belum ada data lokasi parkir yang ditambahkan.
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