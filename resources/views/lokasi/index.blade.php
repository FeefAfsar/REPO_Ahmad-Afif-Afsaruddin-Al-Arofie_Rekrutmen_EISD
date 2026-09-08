<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Lokasi Parkir - TitipKeun</title>
</head>
<body>
    <div style="padding: 20px; font-family: sans-serif;">
        <h2>Daftar Lokasi Parkir TitipKeun</h2>
        
        <!-- Tombol Tambah Data -->
        <a href="/lokasi-parkir/create" style="display: inline-block; margin-bottom: 15px; padding: 8px 12px; background-color: blue; color: white; text-decoration: none; border-radius: 4px;">+ Tambah Lokasi</a>

        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>Nama Tempat</th>
                    <th>Alamat</th>
                    <th>Aksi</th> <!-- Kolom Baru -->
                </tr>
            </thead>
            <tbody>
                @foreach($lokasi as $item)
                <tr>
                    <td>{{ $item->nama_tempat }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>
                        <!-- Form khusus untuk Delete -->
                        <a href="/lokasi-parkir/{{ $item->id }}/edit" style="color: blue; text-decoration: none; margin-right: 10px;">Edit</a>
                        <form action="/lokasi-parkir/{{ $item->id }}" method="POST" onsubmit="return confirm('Yakin mau menghapus lokasi ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="color: red; cursor: pointer;">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>