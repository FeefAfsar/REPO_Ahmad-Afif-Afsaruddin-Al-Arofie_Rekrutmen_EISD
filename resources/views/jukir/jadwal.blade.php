<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-3xl text-slate-800 tracking-tight">
            {{ __('Jadwal Penugasan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-8 px-4 sm:px-0">
            
            <div class="bg-white p-8 shadow-xl sm:rounded-[2.5rem] border border-slate-100">
                <div class="mb-8 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                    <div>
                        <h3 class="text-3xl font-black text-slate-900">Halo, {{ auth()->user()->name }}.</h3>
                        <p class="text-base text-slate-500 mt-2">Berikut adalah titik parkir resmi di bawah tanggung jawab Anda.</p>
                    </div>
                    <span class="px-4 py-2 bg-emerald-100 border border-emerald-200 text-emerald-800 rounded-full text-sm font-black uppercase tracking-wider">
                        Petugas Jukir Resmi
                    </span>
                </div>

                <div class="overflow-x-auto rounded-2xl border border-slate-200">
                    <table class="w-full border-collapse text-left">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-200 text-xs uppercase text-slate-500 font-black tracking-widest">
                                <th class="p-5">Nama Tempat</th>
                                <th class="p-5">Alamat Lokasi</th>
                                <th class="p-5 text-center">Shift Tugas</th>
                            </tr>
                        </thead>
                        <tbody class="text-base divide-y divide-slate-100">
                            @forelse($penugasans as $tugas)
                                <tr class="border-b border-slate-100 hover:bg-slate-50/50 transition">
                                    <td class="p-6 font-black text-slate-800">{{ $tugas->lokasi->nama_tempat ?? 'Lokasi Dihapus' }}</td>
                                    <td class="p-6 text-slate-600 font-medium">{{ $tugas->lokasi->alamat ?? '-' }}</td>
                                    <td class="p-6 text-center">
                                        <span class="px-4 py-1.5 bg-slate-900 text-emerald-400 rounded-full text-xs font-black tracking-wider uppercase shadow-sm">
                                            {{ $tugas->shift }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="p-12 text-center text-slate-400 italic font-medium">
                                        Belum ada penugasan lokasi yang diberikan oleh Admin.
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