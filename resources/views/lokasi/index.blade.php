<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Manajemen Lokasi Parkir (Admin Panel)
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                @if(session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                <a href="{{ route('lokasi-parkir.create') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded-md mb-4 hover:bg-blue-700">+ Tambah Lokasi</a>

                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border border-gray-300 p-2">Nama Tempat</th>
                            <th class="border border-gray-300 p-2">Alamat</th>
                            <th class="border border-gray-300 p-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($lokasis as $lok)
                        <tr>
                            <td class="border border-gray-300 p-2">{{ $lok->nama_tempat }}</td>
                            <td class="border border-gray-300 p-2">{{ $lok->alamat }}</td>
                            <td class="border border-gray-300 p-2 text-center">
                                <a href="{{ route('lokasi-parkir.edit', $lok->id) }}" class="text-blue-600 hover:underline mr-2">Edit</a>
                                <form action="{{ route('lokasi-parkir.destroy', $lok->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="border border-gray-300 p-4 text-center text-gray-500">Belum ada data lokasi parkir.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>